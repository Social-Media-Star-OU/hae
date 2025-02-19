/**
 * @file
 * Drupal Bootstrap object.
 */

/**
 * All Drupal Bootstrap JavaScript APIs are contained in this namespace.
 *
 * @param {underscore} _
 * @param {jQuery} $
 * @param {Drupal} Drupal
 * @param {drupalSettings} drupalSettings
 */
(function (_, $, Drupal, drupalSettings) {
    'use strict';
  
    /**
     * @typedef Drupal.bootstrap
     */
    var Bootstrap = {
      processedOnce: {},
      settings: drupalSettings.bootstrap || {}
    };
  
    /**
     * Wraps Drupal.checkPlain() to ensure value passed isn't empty.
     *
     * Encodes special characters in a plain-text string for display as HTML.
     *
     * @param {string} str
     *   The string to be encoded.
     *
     * @return {string}
     *   The encoded string.
     *
     * @ingroup sanitization
     */
    Bootstrap.checkPlain = function (str) {
      return str && Drupal.checkPlain(str) || '';
    };
  
    /**
     * Creates a jQuery plugin.
     *
     * @param {String} id
     *   A jQuery plugin identifier located in $.fn.
     * @param {Function} plugin
     *   A constructor function used to initialize the for the jQuery plugin.
     * @param {Boolean} [noConflict]
     *   Flag indicating whether or not to create a ".noConflict()" helper method
     *   for the plugin.
     */
    Bootstrap.createPlugin = function (id, plugin, noConflict) {
      // Immediately return if plugin doesn't exist.
      if ($.fn[id] !== void 0) {
        return this.fatal('Specified jQuery plugin identifier already exists: @id. Use Drupal.bootstrap.replacePlugin() instead.', {'@id': id});
      }
  
      // Immediately return if plugin isn't a function.
      if (typeof plugin !== 'function') {
        return this.fatal('You must provide a constructor function to create a jQuery plugin "@id": @plugin', {'@id': id, '@plugin':  plugin});
      }
  
      // Add a ".noConflict()" helper method.
      this.pluginNoConflict(id, plugin, noConflict);
  
      $.fn[id] = plugin;
    };
  
    /**
     * Diff object properties.
     *
     * @param {...Object} objects
     *   Two or more objects. The first object will be used to return properties
     *   values.
     *
     * @return {Object}
     *   Returns the properties of the first passed object that are not present
     *   in all other passed objects.
     */
    Bootstrap.diffObjects = function (objects) {
      var args = Array.prototype.slice.call(arguments);
      return _.pick(args[0], _.difference.apply(_, _.map(args, function (obj) {
        return Object.keys(obj);
      })));
    };
  
    /**
     * Map of supported events by regular expression.
     *
     * @type {Object<Event|MouseEvent|KeyboardEvent|TouchEvent,RegExp>}
     */
    Bootstrap.eventMap = {
      Event: /^(?:load|unload|abort|error|select|change|submit|reset|focus|blur|resize|scroll)$/,
      MouseEvent: /^(?:click|dblclick|mouse(?:down|enter|leave|up|over|move|out))$/,
      KeyboardEvent: /^(?:key(?:down|press|up))$/,
      TouchEvent: /^(?:touch(?:start|end|move|cancel))$/
    };
  
    /**
     * Extends a jQuery Plugin.
     *
     * @param {String} id
     *   A jQuery plugin identifier located in $.fn.
     * @param {Function} callback
     *   A constructor function used to initialize the for the jQuery plugin.
     *
     * @return {Function|Boolean}
     *   The jQuery plugin constructor or FALSE if the plugin does not exist.
     */
    Bootstrap.extendPlugin = function (id, callback) {
      // Immediately return if plugin doesn't exist.
      if (typeof $.fn[id] !== 'function') {
        return this.fatal('Specified jQuery plugin identifier does not exist: @id', {'@id':  id});
      }
  
      // Immediately return if callback isn't a function.
      if (typeof callback !== 'function') {
        return this.fatal('You must provide a callback function to extend the jQuery plugin "@id": @callback', {'@id': id, '@callback':  callback});
      }
  
      // Determine existing plugin constructor.
      var constructor = $.fn[id] && $.fn[id].Constructor || $.fn[id];
      var plugin = callback.apply(constructor, [this.settings]);
      if (!$.isPlainObject(plugin)) {
        return this.fatal('Returned value from callback is not a plain object that can be used to extend the jQuery plugin "@id": @obj', {'@obj':  plugin});
      }
  
      this.wrapPluginConstructor(constructor, plugin, true);
  
      return $.fn[id];
    };
  
    Bootstrap.superWrapper = function (parent, fn) {
      return function () {
        var previousSuper = this.super;
        this.super = parent;
        var ret = fn.apply(this, arguments);
        if (previousSuper) {
          this.super = previousSuper;
        }
        else {
          delete this.super;
        }
        return ret;
      };
    };
  
    /**
     * Provide a helper method for displaying when something is went wrong.
     *
     * @param {String} message
     *   The message to display.
     * @param {Object} [args]
     *   An arguments to use in message.
     *
     * @return {Boolean}
     *   Always returns FALSE.
     */
    Bootstrap.fatal = function (message, args) {
      if (this.settings.dev && console.warn) {
        for (var name in args) {
          if (args.hasOwnProperty(name) && typeof args[name] === 'object') {
            args[name] = JSON.stringify(args[name]);
          }
        }
        Drupal.throwError(new Error(Drupal.formatString(message, args)));
      }
      return false;
    };
  
    /**
     * Intersects object properties.
     *
     * @param {...Object} objects
     *   Two or more objects. The first object will be used to return properties
     *   values.
     *
     * @return {Object}
     *   Returns the properties of first passed object that intersects with all
     *   other passed objects.
     */
    Bootstrap.intersectObjects = function (objects) {
      var args = Array.prototype.slice.call(arguments);
      return _.pick(args[0], _.intersection.apply(_, _.map(args, function (obj) {
        return Object.keys(obj);
      })));
    };
  
    /**
     * Normalizes an object's values.
     *
     * @param {Object} obj
     *   The object to normalize.
     *
     * @return {Object}
     *   The normalized object.
     */
    Bootstrap.normalizeObject = function (obj) {
      if (!$.isPlainObject(obj)) {
        return obj;
      }
  
      for (var k in obj) {
        if (typeof obj[k] === 'string') {
          if (obj[k] === 'true') {
            obj[k] = true;
          }
          else if (obj[k] === 'false') {
            obj[k] = false;
          }
          else if (obj[k].match(/^[\d-.]$/)) {
            obj[k] = parseFloat(obj[k]);
          }
        }
        else if ($.isPlainObject(obj[k])) {
          obj[k] = Bootstrap.normalizeObject(obj[k]);
        }
      }
  
      return obj;
    };
  
    /**
     * An object based once plugin (similar to jquery.once, but without the DOM).
     *
     * @param {String} id
     *   A unique identifier.
     * @param {Function} callback
     *   The callback to invoke if the identifier has not yet been seen.
     *
     * @return {Bootstrap}
     */
    Bootstrap.once = function (id, callback) {
      // Immediately return if identifier has already been processed.
      if (this.processedOnce[id]) {
        return this;
      }
      callback.call(this, this.settings);
      this.processedOnce[id] = true;
      return this;
    };
  
    /**
     * Provide jQuery UI like ability to get/set options for Bootstrap plugins.
     *
     * @param {string|object} key
     *   A string value of the option to set, can be dot like to a nested key.
     *   An object of key/value pairs.
     * @param {*} [value]
     *   (optional) A value to set for key.
     *
     * @returns {*}
     *   - Returns nothing if key is an object or both key and value parameters
     *   were provided to set an option.
     *   - Returns the a value for a specific setting if key was provided.
     *   - Returns an object of key/value pairs of all the options if no key or
     *   value parameter was provided.
     *
     * @see https://github.com/jquery/jquery-ui/blob/master/ui/widget.js
     */
    Bootstrap.option = function (key, value) {
      var options = $.isPlainObject(key) ? $.extend({}, key) : {};
  
      // Get all options (clone so it doesn't reference the internal object).
      if (arguments.length === 0) {
        return $.extend({}, this.options);
      }
  
      // Get/set single option.
      if (typeof key === "string") {
        // Handle nested keys in dot notation.
        // e.g., "foo.bar" => { foo: { bar: true } }
        var parts = key.split('.');
        key = parts.shift();
        var obj = options;
        if (parts.length) {
          for (var i = 0; i < parts.length - 1; i++) {
            obj[parts[i]] = obj[parts[i]] || {};
            obj = obj[parts[i]];
          }
          key = parts.pop();
        }
  
        // Get.
        if (arguments.length === 1) {
          return obj[key] === void 0 ? null : obj[key];
        }
  
        // Set.
        obj[key] = value;
      }
  
      // Set multiple options.
      $.extend(true, this.options, options);
    };
  
    /**
     * Adds a ".noConflict()" helper method if needed.
     *
     * @param {String} id
     *   A jQuery plugin identifier located in $.fn.
     * @param {Function} plugin
     * @param {Function} plugin
     *   A constructor function used to initialize the for the jQuery plugin.
     * @param {Boolean} [noConflict]
     *   Flag indicating whether or not to create a ".noConflict()" helper method
     *   for the plugin.
     */
    Bootstrap.pluginNoConflict = function (id, plugin, noConflict) {
      if (plugin.noConflict === void 0 && (noConflict === void 0 || noConflict)) {
        var old = $.fn[id];
        plugin.noConflict = function () {
          $.fn[id] = old;
          return this;
        };
      }
    };
  
    /**
     * Creates a handler that relays to another event name.
     *
     * @param {HTMLElement|jQuery} target
     *   A target element.
     * @param {String} name
     *   The name of the event to trigger.
     * @param {Boolean} [stopPropagation=true]
     *   Flag indicating whether to stop the propagation of the event, defaults
     *   to true.
     *
     * @return {Function}
     *   An even handler callback function.
     */
    Bootstrap.relayEvent = function (target, name, stopPropagation) {
      return function (e) {
        if (stopPropagation === void 0 || stopPropagation) {
          e.stopPropagation();
        }
        var $target = $(target);
        var parts = name.split('.').filter(Boolean);
        var type = parts.shift();
        e.target = $target[0];
        e.currentTarget = $target[0];
        e.namespace = parts.join('.');
        e.type = type;
        $target.trigger(e);
      };
    };
  
    /**
     * Replaces a Bootstrap jQuery plugin definition.
     *
     * @param {String} id
     *   A jQuery plugin identifier located in $.fn.
     * @param {Function} callback
     *   A callback function that is immediately invoked and must return a
     *   function that will be used as the plugin constructor.
     * @param {Boolean} [noConflict]
     *   Flag indicating whether or not to create a ".noConflict()" helper method
     *   for the plugin.
     */
    Bootstrap.replacePlugin = function (id, callback, noConflict) {
      // Immediately return if plugin doesn't exist.
      if (typeof $.fn[id] !== 'function') {
        return this.fatal('Specified jQuery plugin identifier does not exist: @id', {'@id':  id});
      }
  
      // Immediately return if callback isn't a function.
      if (typeof callback !== 'function') {
        return this.fatal('You must provide a valid callback function to replace a jQuery plugin: @callback', {'@callback': callback});
      }
  
      // Determine existing plugin constructor.
      var constructor = $.fn[id] && $.fn[id].Constructor || $.fn[id];
      var plugin = callback.apply(constructor, [this.settings]);
  
      // Immediately return if plugin isn't a function.
      if (typeof plugin !== 'function') {
        return this.fatal('Returned value from callback is not a usable function to replace a jQuery plugin "@id": @plugin', {'@id': id, '@plugin': plugin});
      }
  
      this.wrapPluginConstructor(constructor, plugin);
  
      // Add a ".noConflict()" helper method.
      this.pluginNoConflict(id, plugin, noConflict);
  
      $.fn[id] = plugin;
    };
  
    /**
     * Simulates a native event on an element in the browser.
     *
     * Note: This is a fairly complete modern implementation. If things aren't
     * working quite the way you intend (in older browsers), you may wish to use
     * the jQuery.simulate plugin. If it's available, this method will defer to
     * that plugin.
     *
     * @see https://github.com/jquery/jquery-simulate
     *
     * @param {HTMLElement|jQuery} element
     *   A DOM element to dispatch event on. Note: this may be a jQuery object,
     *   however be aware that this will trigger the same event for each element
     *   inside the jQuery collection; use with caution.
     * @param {String|String[]} type
     *   The type(s) of event to simulate.
     * @param {Object} [options]
     *   An object of options to pass to the event constructor. Typically, if
     *   an event is being proxied, you should just pass the original event
     *   object here. This allows, if the browser supports it, to be a truly
     *   simulated event.
     *
     * @return {Boolean}
     *   The return value is false if event is cancelable and at least one of the
     *   event handlers which handled this event called Event.preventDefault().
     *   Otherwise it returns true.
     */
    Bootstrap.simulate = function (element, type, options) {
      // Handle jQuery object wrappers so it triggers on each element.
      var ret = true;
      if (element instanceof $) {
        element.each(function () {
          if (!Bootstrap.simulate(this, type, options)) {
            ret = false;
          }
        });
        return ret;
      }
  
      if (!(element instanceof HTMLElement)) {
        this.fatal('Passed element must be an instance of HTMLElement, got "@type" instead.', {
          '@type': typeof element,
        });
      }
  
      // Defer to the jQuery.simulate plugin, if it's available.
      if (typeof $.simulate === 'function') {
        new $.simulate(element, type, options);
        return true;
      }
  
      var event;
      var ctor;
      var types = [].concat(type);
      for (var i = 0, l = types.length; i < l; i++) {
        type = types[i];
        for (var name in this.eventMap) {
          if (this.eventMap[name].test(type)) {
            ctor = name;
            break;
          }
        }
        if (!ctor) {
          throw new SyntaxError('Only rudimentary HTMLEvents, KeyboardEvents and MouseEvents are supported: ' + type);
        }
        var opts = {bubbles: true, cancelable: true};
        if (ctor === 'KeyboardEvent' || ctor === 'MouseEvent') {
          $.extend(opts, {ctrlKey: !1, altKey: !1, shiftKey: !1, metaKey: !1});
        }
        if (ctor === 'MouseEvent') {
          $.extend(opts, {button: 0, pointerX: 0, pointerY: 0, view: window});
        }
        if (options) {
          $.extend(opts, options);
        }
        if (typeof window[ctor] === 'function') {
          event = new window[ctor](type, opts);
          if (!element.dispatchEvent(event)) {
            ret = false;
          }
        }
        else if (document.createEvent) {
          event = document.createEvent(ctor);
          event.initEvent(type, opts.bubbles, opts.cancelable);
          if (!element.dispatchEvent(event)) {
            ret = false;
          }
        }
        else if (typeof element.fireEvent === 'function') {
          event = $.extend(document.createEventObject(), opts);
          if (!element.fireEvent('on' + type, event)) {
            ret = false;
          }
        }
        else if (typeof element[type]) {
          element[type]();
        }
      }
      return ret;
    };
  
    /**
     * Strips HTML and returns just text.
     *
     * @param {String|Element|jQuery} html
     *   A string of HTML content, an Element DOM object or a jQuery object.
     *
     * @return {String}
     *   The text without HTML tags.
     *
     * @todo Replace with http://locutus.io/php/strings/strip_tags/
     */
    Bootstrap.stripHtml = function (html) {
      if (html instanceof $) {
        html = html.html();
      }
      else if (html instanceof Element) {
        html = html.innerHTML;
      }
      var tmp = document.createElement('DIV');
      tmp.innerHTML = html;
      return (tmp.textContent || tmp.innerText || '').replace(/^[\s\n\t]*|[\s\n\t]*$/, '');
    };
  
    /**
     * Provide a helper method for displaying when something is unsupported.
     *
     * @param {String} type
     *   The type of unsupported object, e.g. method or option.
     * @param {String} name
     *   The name of the unsupported object.
     * @param {*} [value]
     *   The value of the unsupported object.
     */
    Bootstrap.unsupported = function (type, name, value) {
      Bootstrap.warn('Unsupported by Drupal Bootstrap: (@type) @name -> @value', {
        '@type': type,
        '@name': name,
        '@value': typeof value === 'object' ? JSON.stringify(value) : value
      });
    };
  
    /**
     * Provide a helper method to display a warning.
     *
     * @param {String} message
     *   The message to display.
     * @param {Object} [args]
     *   Arguments to use as replacements in Drupal.formatString.
     */
    Bootstrap.warn = function (message, args) {
      if (this.settings.dev && console.warn) {
        console.warn(Drupal.formatString(message, args));
      }
    };
  
    /**
     * Wraps a plugin with common functionality.
     *
     * @param {Function} constructor
     *   A plugin constructor being wrapped.
     * @param {Object|Function} plugin
     *   The plugin being wrapped.
     * @param {Boolean} [extend = false]
     *   Whether to add super extensibility.
     */
    Bootstrap.wrapPluginConstructor = function (constructor, plugin, extend) {
      var proto = constructor.prototype;
  
      // Add a jQuery UI like option getter/setter method.
      var option = this.option;
      if (proto.option === void(0)) {
        proto.option = function () {
          return option.apply(this, arguments);
        };
      }
  
      if (extend) {
        // Handle prototype properties separately.
        if (plugin.prototype !== void 0) {
          for (var key in plugin.prototype) {
            if (!plugin.prototype.hasOwnProperty(key)) continue;
            var value = plugin.prototype[key];
            if (typeof value === 'function') {
              proto[key] = this.superWrapper(proto[key] || function () {}, value);
            }
            else {
              proto[key] = $.isPlainObject(value) ? $.extend(true, {}, proto[key], value) : value;
            }
          }
        }
        delete plugin.prototype;
  
        // Handle static properties.
        for (key in plugin) {
          if (!plugin.hasOwnProperty(key)) continue;
          value = plugin[key];
          if (typeof value === 'function') {
            constructor[key] = this.superWrapper(constructor[key] || function () {}, value);
          }
          else {
            constructor[key] = $.isPlainObject(value) ? $.extend(true, {}, constructor[key], value) : value;
          }
        }
      }
    };
  
    // Add Bootstrap to the global Drupal object.
    Drupal.bootstrap = Drupal.bootstrap || Bootstrap;
  
  })(window._, window.jQuery, window.Drupal, window.drupalSettings);
  ;
  (function ($, _) {
  
    /**
     * @class Attributes
     *
     * Modifies attributes.
     *
     * @param {Object|Attributes} attributes
     *   An object to initialize attributes with.
     */
    var Attributes = function (attributes) {
      this.data = {};
      this.data['class'] = [];
      this.merge(attributes);
    };
  
    /**
     * Renders the attributes object as a string to inject into an HTML element.
     *
     * @return {String}
     *   A rendered string suitable for inclusion in HTML markup.
     */
    Attributes.prototype.toString = function () {
      var output = '';
      var name, value;
      var checkPlain = function (str) {
        return str && str.toString().replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;') || '';
      };
      var data = this.getData();
      for (name in data) {
        if (!data.hasOwnProperty(name)) continue;
        value = data[name];
        if (_.isFunction(value)) value = value();
        if (_.isObject(value)) value = _.values(value);
        if (_.isArray(value)) value = value.join(' ');
        output += ' ' + checkPlain(name) + '="' + checkPlain(value) + '"';
      }
      return output;
    };
  
    /**
     * Renders the Attributes object as a plain object.
     *
     * @return {Object}
     *   A plain object suitable for inclusion in DOM elements.
     */
    Attributes.prototype.toPlainObject = function () {
      var object = {};
      var name, value;
      var data = this.getData();
      for (name in data) {
        if (!data.hasOwnProperty(name)) continue;
        value = data[name];
        if (_.isFunction(value)) value = value();
        if (_.isObject(value)) value = _.values(value);
        if (_.isArray(value)) value = value.join(' ');
        object[name] = value;
      }
      return object;
    };
  
    /**
     * Add class(es) to the array.
     *
     * @param {string|Array} value
     *   An individual class or an array of classes to add.
     *
     * @return {Attributes}
     *
     * @chainable
     */
    Attributes.prototype.addClass = function (value) {
      var args = Array.prototype.slice.call(arguments);
      this.data['class'] = this.sanitizeClasses(this.data['class'].concat(args));
      return this;
    };
  
    /**
     * Returns whether the requested attribute exists.
     *
     * @param {string} name
     *   An attribute name to check.
     *
     * @return {boolean}
     *   TRUE or FALSE
     */
    Attributes.prototype.exists = function (name) {
      return this.data[name] !== void(0) && this.data[name] !== null;
    };
  
    /**
     * Retrieve a specific attribute from the array.
     *
     * @param {string} name
     *   The specific attribute to retrieve.
     * @param {*} defaultValue
     *   (optional) The default value to set if the attribute does not exist.
     *
     * @return {*}
     *   A specific attribute value, passed by reference.
     */
    Attributes.prototype.get = function (name, defaultValue) {
      if (!this.exists(name)) this.data[name] = defaultValue;
      return this.data[name];
    };
  
    /**
     * Retrieves a cloned copy of the internal attributes data object.
     *
     * @return {Object}
     */
    Attributes.prototype.getData = function () {
      return _.extend({}, this.data);
    };
  
    /**
     * Retrieves classes from the array.
     *
     * @return {Array}
     *   The classes array.
     */
    Attributes.prototype.getClasses = function () {
      return this.get('class', []);
    };
  
    /**
     * Indicates whether a class is present in the array.
     *
     * @param {string|Array} className
     *   The class(es) to search for.
     *
     * @return {boolean}
     *   TRUE or FALSE
     */
    Attributes.prototype.hasClass = function (className) {
      className = this.sanitizeClasses(Array.prototype.slice.call(arguments));
      var classes = this.getClasses();
      for (var i = 0, l = className.length; i < l; i++) {
        // If one of the classes fails, immediately return false.
        if (_.indexOf(classes, className[i]) === -1) {
          return false;
        }
      }
      return true;
    };
  
    /**
     * Merges multiple values into the array.
     *
     * @param {Attributes|Node|jQuery|Object} object
     *   An Attributes object with existing data, a Node DOM element, a jQuery
     *   instance or a plain object where the key is the attribute name and the
     *   value is the attribute value.
     * @param {boolean} [recursive]
     *   Flag determining whether or not to recursively merge key/value pairs.
     *
     * @return {Attributes}
     *
     * @chainable
     */
    Attributes.prototype.merge = function (object, recursive) {
      // Immediately return if there is nothing to merge.
      if (!object) {
        return this;
      }
  
      // Get attributes from a jQuery element.
      if (object instanceof $) {
        object = object[0];
      }
  
      // Get attributes from a DOM element.
      if (object instanceof Node) {
        object = Array.prototype.slice.call(object.attributes).reduce(function (attributes, attribute) {
          attributes[attribute.name] = attribute.value;
          return attributes;
        }, {});
      }
      // Get attributes from an Attributes instance.
      else if (object instanceof Attributes) {
        object = object.getData();
      }
      // Otherwise, clone the object.
      else {
        object = _.extend({}, object);
      }
  
      // By this point, there should be a valid plain object.
      if (!$.isPlainObject(object)) {
        setTimeout(function () {
          throw new Error('Passed object is not supported: ' + object);
        });
        return this;
      }
  
      // Handle classes separately.
      if (object && object['class'] !== void 0) {
        this.addClass(object['class']);
        delete object['class'];
      }
  
      if (recursive === void 0 || recursive) {
        this.data = $.extend(true, {}, this.data, object);
      }
      else {
        this.data = $.extend({}, this.data, object);
      }
  
      return this;
    };
  
    /**
     * Removes an attribute from the array.
     *
     * @param {string} name
     *   The name of the attribute to remove.
     *
     * @return {Attributes}
     *
     * @chainable
     */
    Attributes.prototype.remove = function (name) {
      if (this.exists(name)) delete this.data[name];
      return this;
    };
  
    /**
     * Removes a class from the attributes array.
     *
     * @param {...string|Array} className
     *   An individual class or an array of classes to remove.
     *
     * @return {Attributes}
     *
     * @chainable
     */
    Attributes.prototype.removeClass = function (className) {
      var remove = this.sanitizeClasses(Array.prototype.slice.apply(arguments));
      this.data['class'] = _.without(this.getClasses(), remove);
      return this;
    };
  
    /**
     * Replaces a class in the attributes array.
     *
     * @param {string} oldValue
     *   The old class to remove.
     * @param {string} newValue
     *   The new class. It will not be added if the old class does not exist.
     *
     * @return {Attributes}
     *
     * @chainable
     */
    Attributes.prototype.replaceClass = function (oldValue, newValue) {
      var classes = this.getClasses();
      var i = _.indexOf(this.sanitizeClasses(oldValue), classes);
      if (i >= 0) {
        classes[i] = newValue;
        this.set('class', classes);
      }
      return this;
    };
  
    /**
     * Ensures classes are flattened into a single is an array and sanitized.
     *
     * @param {...String|Array} classes
     *   The class or classes to sanitize.
     *
     * @return {Array}
     *   A sanitized array of classes.
     */
    Attributes.prototype.sanitizeClasses = function (classes) {
      return _.chain(Array.prototype.slice.call(arguments))
        // Flatten in case there's a mix of strings and arrays.
        .flatten()
  
        // Split classes that may have been added with a space as a separator.
        .map(function (string) {
          return string.split(' ');
        })
  
        // Flatten again since it was just split into arrays.
        .flatten()
  
        // Filter out empty items.
        .filter()
  
        // Clean the class to ensure it's a valid class name.
        .map(function (value) {
          return Attributes.cleanClass(value);
        })
  
        // Ensure classes are unique.
        .uniq()
  
        // Retrieve the final value.
        .value();
    };
  
    /**
     * Sets an attribute on the array.
     *
     * @param {string} name
     *   The name of the attribute to set.
     * @param {*} value
     *   The value of the attribute to set.
     *
     * @return {Attributes}
     *
     * @chainable
     */
    Attributes.prototype.set = function (name, value) {
      var obj = $.isPlainObject(name) ? name : {};
      if (typeof name === 'string') {
        obj[name] = value;
      }
      return this.merge(obj);
    };
  
    /**
     * Prepares a string for use as a CSS identifier (element, class, or ID name).
     *
     * Note: this is essentially a direct copy from
     * \Drupal\Component\Utility\Html::cleanCssIdentifier
     *
     * @param {string} identifier
     *   The identifier to clean.
     * @param {Object} [filter]
     *   An object of string replacements to use on the identifier.
     *
     * @return {string}
     *   The cleaned identifier.
     */
    Attributes.cleanClass = function (identifier, filter) {
      filter = filter || {
        ' ': '-',
        '_': '-',
        '/': '-',
        '[': '-',
        ']': ''
      };
  
      identifier = identifier.toLowerCase();
  
      if (filter['__'] === void 0) {
        identifier = identifier.replace('__', '#DOUBLE_UNDERSCORE#');
      }
  
      identifier = identifier.replace(Object.keys(filter), Object.keys(filter).map(function(key) { return filter[key]; }));
  
      if (filter['__'] === void 0) {
        identifier = identifier.replace('#DOUBLE_UNDERSCORE#', '__');
      }
  
      identifier = identifier.replace(/[^\u002D\u0030-\u0039\u0041-\u005A\u005F\u0061-\u007A\u00A1-\uFFFF]/g, '');
      identifier = identifier.replace(['/^[0-9]/', '/^(-[0-9])|^(--)/'], ['_', '__']);
  
      return identifier;
    };
  
    /**
     * Creates an Attributes instance.
     *
     * @param {object|Attributes} [attributes]
     *   An object to initialize attributes with.
     *
     * @return {Attributes}
     *   An Attributes instance.
     *
     * @constructor
     */
    Attributes.create = function (attributes) {
      return new Attributes(attributes);
    };
  
    window.Attributes = Attributes;
  
  })(window.jQuery, window._);
  ;
  /**
   * @file
   * Theme hooks for the Drupal Bootstrap base theme.
   */
  (function ($, Drupal, Bootstrap, Attributes) {
  
    /**
     * Fallback for theming an icon if the Icon API module is not installed.
     */
    if (!Drupal.icon) Drupal.icon = { bundles: {} };
    if (!Drupal.theme.icon || Drupal.theme.prototype.icon) {
      $.extend(Drupal.theme, /** @lends Drupal.theme */ {
        /**
         * Renders an icon.
         *
         * @param {string} bundle
         *   The bundle which the icon belongs to.
         * @param {string} icon
         *   The name of the icon to render.
         * @param {object|Attributes} [attributes]
         *   An object of attributes to also apply to the icon.
         *
         * @returns {string}
         */
        icon: function (bundle, icon, attributes) {
          if (!Drupal.icon.bundles[bundle]) return '';
          attributes = Attributes.create(attributes).addClass('icon').set('aria-hidden', 'true');
          icon = Drupal.icon.bundles[bundle](icon, attributes);
          return '<span' + attributes + '></span>';
        }
      });
    }
  
    /**
     * Callback for modifying an icon in the "bootstrap" icon bundle.
     *
     * @param {string} icon
     *   The icon being rendered.
     * @param {Attributes} attributes
     *   Attributes object for the icon.
     */
    Drupal.icon.bundles.bootstrap = function (icon, attributes) {
      attributes.addClass(['glyphicon', 'glyphicon-' + icon]);
    };
  
    /**
     * Add necessary theming hooks.
     */
    $.extend(Drupal.theme, /** @lends Drupal.theme */ {
  
      /**
       * Renders a Bootstrap AJAX glyphicon throbber.
       *
       * @returns {string}
       */
      ajaxThrobber: function () {
        return Drupal.theme('bootstrapIcon', 'refresh', {'class': ['ajax-throbber', 'glyphicon-spin'] });
      },
  
      /**
       * Renders a button element.
       *
       * @param {object|Attributes} attributes
       *   An object of attributes to apply to the button. If it contains one of:
       *   - value: The label of the button.
       *   - context: The context type of Bootstrap button, can be one of:
       *     - default
       *     - primary
       *     - success
       *     - info
       *     - warning
       *     - danger
       *     - link
       *
       * @returns {string}
       */
      button: function (attributes) {
        attributes = Attributes.create(attributes).addClass('btn');
        var context = attributes.get('context', 'default');
        var label = attributes.get('value', '');
        attributes.remove('context').remove('value');
        if (!attributes.hasClass(['btn-default', 'btn-primary', 'btn-success', 'btn-info', 'btn-warning', 'btn-danger', 'btn-link'])) {
          attributes.addClass('btn-' + Bootstrap.checkPlain(context));
        }
  
        // Attempt to, intelligently, provide a default button "type".
        if (!attributes.exists('type')) {
          attributes.set('type', attributes.hasClass('form-submit') ? 'submit' : 'button');
        }
  
        return '<button' + attributes + '>' + label + '</button>';
      },
  
      /**
       * Alias for "button" theme hook.
       *
       * @param {object|Attributes} attributes
       *   An object of attributes to apply to the button.
       *
       * @see Drupal.theme.button()
       *
       * @returns {string}
       */
      btn: function (attributes) {
        return Drupal.theme('button', attributes);
      },
  
      /**
       * Renders a button block element.
       *
       * @param {object|Attributes} attributes
       *   An object of attributes to apply to the button.
       *
       * @see Drupal.theme.button()
       *
       * @returns {string}
       */
      'btn-block': function (attributes) {
        return Drupal.theme('button', Attributes.create(attributes).addClass('btn-block'));
      },
  
      /**
       * Renders a large button element.
       *
       * @param {object|Attributes} attributes
       *   An object of attributes to apply to the button.
       *
       * @see Drupal.theme.button()
       *
       * @returns {string}
       */
      'btn-lg': function (attributes) {
        return Drupal.theme('button', Attributes.create(attributes).addClass('btn-lg'));
      },
  
      /**
       * Renders a small button element.
       *
       * @param {object|Attributes} attributes
       *   An object of attributes to apply to the button.
       *
       * @see Drupal.theme.button()
       *
       * @returns {string}
       */
      'btn-sm': function (attributes) {
        return Drupal.theme('button', Attributes.create(attributes).addClass('btn-sm'));
      },
  
      /**
       * Renders an extra small button element.
       *
       * @param {object|Attributes} attributes
       *   An object of attributes to apply to the button.
       *
       * @see Drupal.theme.button()
       *
       * @returns {string}
       */
      'btn-xs': function (attributes) {
        return Drupal.theme('button', Attributes.create(attributes).addClass('btn-xs'));
      },
  
      /**
       * Renders a glyphicon.
       *
       * @param {string} name
       *   The name of the glyphicon.
       * @param {object|Attributes} [attributes]
       *   An object of attributes to apply to the icon.
       *
       * @returns {string}
       */
      bootstrapIcon: function (name, attributes) {
        return Drupal.theme('icon', 'bootstrap', name, attributes);
      }
  
    });
  
  })(window.jQuery, window.Drupal, window.Drupal.bootstrap, window.Attributes);
  ;
  (function ($, Drupal) {
      
      // next page popup alter
      var nextpage = $('.views-field-field-next-page span').text();
      
      if(nextpage == 'Managing HAE' || nextpage == 'HAE behandeln' || nextpage == 'Prise en charge de lâ€™AOH' || nextpage == 'Manejo del AEH' || nextpage == 'ÐšÐ¾Ð½Ñ‚Ñ€Ð¾Ð»ÑŒ ÐÐÐž' || nextpage == 'Administrando o AEH' || nextpage == 'ç®¡ç† HAE')
       {$('.views-field-field-next-page ').addClass('open-managing-hae-popup')}
  
      if(nextpage == 'Identifying HAE' || nextpage == 'Das hereditÃ¤re AngioÃ¶dem (HAE) diagnostizieren' || nextpage == 'IdentificaciÃ³n del AEH' || nextpage == 'identification de lâ€™AOH' || nextpage == 'Identificando o AEH' || nextpage == 'ÐžÐ¿Ñ€ÐµÐ´ÐµÐ»ÐµÐ½Ð¸Ðµ ÐÐÐž' || nextpage == 'è­˜åˆ¥ HAE')
       {$('.views-field-field-next-page ').addClass('open-identifying-hae-popup')}
  
      // resource page copy text
      $('button.copyButton').click(function(){
          $(this).siblings('input.link-to-copy').select();  
          document.execCommand("copy");
          $(this).children("span").text("Copied to Clipboard").delay(1500).fadeOut();
      });
  
      $(".copyButton").mouseover(function(){
          $(this).children(".myTooltip").show();
      });
  
      $(".copyButton").mouseout(function(){
          $(this).children("span").text("Copy to Clipboard");
          $(this).children(".myTooltip").hide();
      });
   
  // cookies block js
  
  $('.cookie-close-btn').click(function(){
    const d = new Date();
    d.setDate(d.getDate() + 1);
    var expireDate = d ? d.toGMTString() : "";
    document.cookie = "cookienotification=1;path=/;expires="+expireDate;
    
    if(getCookie('cookienotification') == 1){
      $('.cookies-block').hide('slow');
    }
  });
  
  var getCookie = (name) => {
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let c = cookies[i].trim().split('=');
        if (c[0] === name) {
            return c[1];
        }
    }
    return "";
  }
  
  if(getCookie('cookienotification') == 1){
    $('.cookies-block').addClass('hidden');
  }else{
    if($('.cookies-block').hasClass('hidden')){
      $('.cookies-block').removeClass('hidden');
    }
  }
  
  })(jQuery, Drupal);;
  (function ($, Drupal) {
     // Keele valiku nupu klõpsamise sündmus
$('.knowhae-english-lang').click(function() {
  if ($('.knowhae-languageswitcher-menu').hasClass('hidden')) {
      $('.knowhae-languageswitcher-menu').removeClass('hidden');
  } else {
      $('.knowhae-languageswitcher-menu').addClass('hidden');
  }
});

$('.knowhae-languageswitcher-menu').addClass('hidden');
$('.knowhae-languageswitcher-menu > section.language-switcher-language-url > ul.links > li.is-active').addClass('hidden');

// Keele valiku salvestamine ja lehe värskendamine
  $(document).on('click', ".knowhae-languageswitcher-menu > section.language-switcher-language-url > ul.links > li", function() {
  var $sl = $(this).html(); // Eeldame, et igal keelel on data-lang atribuut
  if ($sl == 'Russian') {
      setLanguage('ru');
  } else if ($sl == "Eesti") {
      setLanguage('et');
  }
});

function setLanguage(lang) {
  var expireDate = new Date();
  expireDate.setTime(expireDate.getTime() + (365*24*60*60*1000)); // Küpsis kehtib 1 aasta
  document.cookie = "lang=" + lang + ";expires=" + expireDate.toUTCString() + ";path=/";
  location.reload();
}

function getLanguage() {
  var name = "lang=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
          c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
      }
  }
  return "";
}

var $active_lang = getLanguage();

if ($active_lang != "") {
  if($active_lang == 'ru') {
      $('.knowhae-english-lang').html('Russian');
  } else if($active_lang == 'et') {
      $('.knowhae-english-lang').html('Eesti');
  }
} else {
  $('.knowhae-english-lang').html('Eesti');
}


      $('.mobile-hamber-class').click(function(){
          $(this).toggleClass("is-active");
          $('.knowhae-nav-menus').toggleClass('is-active');
          $('.knowhae-utility-social-lang-menus').toggleClass('is-active');
          $('.region.region-navigation').toggleClass("is-active");
          $('header').toggleClass("is-active");
  });
  
  // stricky menu-------------//
  window.onscroll = function() {myFunction()};
  
  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop + 200;
  
  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
    }
    
    function footerBottomFix() {
      let cokieHeight = $(".cookie-para").innerHeight();
     $(".region-footer").css("padding-bottom", cokieHeight + 20);
      }
      footerBottomFix();
  
  })(jQuery, Drupal);
  
  // Hidden blocks
  
  function hideBurdenOfHaeBlocks() {
    if (!document.body.classList.contains('node-17')) {
      return;
    }
  
    let elHiddenInnerBlock = document.querySelector('.hide-everywhere-except-ru-kk');
    let isRU = document.body.classList.contains('node-ru');
    let isKK = document.body.classList.contains('node-kk');
  
    
    if (isRU || isKK) {
      return;
    }
  
    elHiddenInnerBlock.closest('[class="field--item"]').style.display = 'none';
  }
  
  function hideBlocks() {
    hideBurdenOfHaeBlocks();
  }
  
  function addClassOnElement(selector, className = '') {
    let elToAddClass = document.querySelector(selector);
  
    if (elToAddClass) {
      elToAddClass.removeAttribute('href');
      elToAddClass.classList.add(className);
    }
  }
  
  function initClassOnElement() {
    addClassOnElement('.node-ru.node-12 .view-next-page a[href="/ru/hcp/identifying-hae/signs-symptoms-and-causes"]', 'open-identifying-hae-popup');
    addClassOnElement('.node-kk.node-12 .view-next-page a[href="/kk/hcp/identifying-hae/signs-symptoms-and-causes"]', 'open-identifying-hae-popup');
  }
  
  
  // Exit popups
  
  function addExitPopup() {
      let isRU = document.body.classList.contains('node-ru');
      let isKK = document.body.classList.contains('node-kk');
  
      if (!isRU && !isKK) {
          return;
      }
  
      let frontTwitterIcon = document.querySelector('li.menu-icon.menu-icon-24');
      let frontFacebookIcon = document.querySelector('li.menu-icon.menu-icon-25');
      let patientTwitterIcon = document.querySelector('li.menu-icon.menu-icon-22');
      let patientFacebookIcon = document.querySelector('li.menu-icon.menu-icon-21');
      let hcpTwitterIcon = document.querySelector('li.menu-icon.menu-icon-19');
      let hcpYoutubeIcon = document.querySelector('li.menu-icon.menu-icon-20');
      let footerIcon = document.querySelector('li.menu-icon.menu-icon-2');
    let knowMore1 = document.querySelector('.node-12 .field.field--name-field-link.field--type-link.field--label-hidden.field--item');
    let knowMore2 = document.querySelector('.node-9 .field.field--name-field-link.field--type-link.field--label-hidden.field--item');
    let logoLink = document.querySelector('.region-footer #block-knowhae-footer .col-md-2');
  
  
      if (frontTwitterIcon) {
          addTwitterPopup(frontTwitterIcon);
      }
  
      if (patientTwitterIcon) {
          addTwitterPopup(patientTwitterIcon);
      }
  
      if (hcpTwitterIcon) {
          addTwitterPopup(hcpTwitterIcon);
      }
  
      if (frontFacebookIcon) {
          addFacebookPopup(frontFacebookIcon);
      }
  
      if (patientFacebookIcon) {
          addFacebookPopup(patientFacebookIcon);
      }
  
      if (hcpYoutubeIcon) {
          addYoutubePopup(hcpYoutubeIcon);
      }
  
      if (footerIcon) {
          //addPrivacyPopup(footerIcon);
      }
  
      if (knowMore1) {
          addHaeiPopup(knowMore1);
    }
    
    if (knowMore2) {
          addHaeiPopup(knowMore2);
    }
    
    if (logoLink) {
          //addTakedaPopup(logoLink);
      }
  }
  
  function changeAtoSpan(element) {
      const elToRemove = element.firstElementChild;
  
      elToRemove.remove();
      const newSpan = document.createElement('span');
  
      element.appendChild(newSpan);
  
      return newSpan;
  }
  
  function addTwitterPopup(el) {
      let newSpan = changeAtoSpan(el);
  
      newSpan.classList.add('open-twitter-popup');
  }
  
  function addFacebookPopup(el) {
      let newSpan = changeAtoSpan(el);
  
  
      newSpan.classList.add('open-facebook-popup');
  }
  
  function addYoutubePopup(el) {
      let newSpan = changeAtoSpan(el);
  
      newSpan.classList.add('open-youtube-popup');
  }
  
  
  function addPrivacyPopup(el) {
    let isRU = document.body.classList.contains('node-ru');
    let isKK = document.body.classList.contains('node-kk');
    let newSpan = changeAtoSpan(el);
  
    if (isRU) {
      newSpan.textContent = 'ÐŸÐ¾Ð»Ð¸Ñ‚Ð¸ÐºÐ° ÐºÐ¾Ð½Ñ„Ð¸Ð´ÐµÐ½Ñ†Ð¸Ð°Ð»ÑŒÐ½Ð¾ÑÑ‚Ð¸ Ð¸ Ñ„Ð°Ð¹Ð»Ð¾Ð² Cookies';
    }
    if (isKK) {
      newSpan.textContent = 'ÒšÒ±Ð¿Ð¸ÑÐ»Ñ‹Ð»Ñ‹Ò› Ð¶Ó™Ð½Ðµ Cookies Ñ„Ð°Ð¹Ð»Ð´Ð°Ñ€Ñ‹ ÑÐ°ÑÑÐ°Ñ‚Ñ‹';
    }
  }
  
  function addMatomoAnalytics() {
    const isRU = document.body.classList.contains('node-ru');
    const isKK = document.body.classList.contains('node-kk');
    const scriptMatomoAnalytics = document.createElement('script');
    const startComment = document.createComment(' Matomo Tag Manager ');
    const endComment = document.createComment(' End Matomo Tag Manager ');
  
    if (!isRU && !isKK) {
      return
    }
  
    if (isRU) {
        scriptMatomoAnalytics.textContent = `
    var _mtm = window._mtm = window._mtm || [];
    _mtm.push({ 'mtm.startTime': (new Date().getTime()), 'event': 'mtm.Start' });
    var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
    g.async = true;
    g.src = 'https://cdn.matomo.cloud/takeda.matomo.cloud/container_nF1m0Cne.js';
    s.parentNode.insertBefore(g, s);
  `;
    }
    if (isKK) {
      scriptMatomoAnalytics.textContent = `
    var _mtm = window._mtm = window._mtm || [];
    _mtm.push({ 'mtm.startTime': (new Date().getTime()), 'event': 'mtm.Start' });
    var d = document, g = d.createElement('script'), s = d.getElementsByTagName('script')[0];
    g.async = true;
    g.src = 'https://cdn.matomo.cloud/takeda.matomo.cloud/container_nGhd6u0E.js';
    s.parentNode.insertBefore(g, s);
  `;
    }
  
    document.body.appendChild(startComment);
    document.body.appendChild(scriptMatomoAnalytics);
    document.body.appendChild(endComment);
  }
  
  function addHaeiPopup(el) {
      let link = el.firstElementChild;
  
      link.removeAttribute('href');
      link.classList.add('open-haei-popup');
  }
  
  function addTakedaPopup(el) {
      let link = el.firstElementChild;
  
    link.removeAttribute('href');
    
      link.classList.add('open-takeda-popup');
   
  }
  
  
  document.addEventListener('DOMContentLoaded', () => {
    hideBlocks();
  });
  initClassOnElement();
  addExitPopup()
  addMatomoAnalytics();;
  /**
   * @file
   * Bootstrap Popovers.
   */
  
  var Drupal = Drupal || {};
  
  (function ($, Drupal, Bootstrap) {
    "use strict";
  
    var $document = $(document);
  
    /**
     * Extend the Bootstrap Popover plugin constructor class.
     */
    Bootstrap.extendPlugin('popover', function (settings) {
      return {
        DEFAULTS: {
          animation: !!settings.popover_animation,
          autoClose: !!settings.popover_auto_close,
          enabled: settings.popover_enabled,
          html: !!settings.popover_html,
          placement: settings.popover_placement,
          selector: settings.popover_selector,
          trigger: settings.popover_trigger,
          title: settings.popover_title,
          content: settings.popover_content,
          delay: parseInt(settings.popover_delay, 10),
          container: settings.popover_container
        }
      };
    });
  
    /**
     * Bootstrap Popovers.
     *
     * @todo This should really be properly delegated if selector option is set.
     */
    Drupal.behaviors.bootstrapPopovers = {
      $activePopover: null,
      attach: function (context) {
        // Immediately return if popovers are not available.
        if (!$.fn.popover || !$.fn.popover.Constructor.DEFAULTS.enabled) {
          return;
        }
  
        var _this = this;
  
        $document
          .on('show.bs.popover', '[data-toggle=popover]', function () {
            var $trigger = $(this);
            var popover = $trigger.data('bs.popover');
  
            // Only keep track of clicked triggers that we're manually handling.
            if (popover.options.originalTrigger === 'click') {
              if (_this.$activePopover && _this.getOption('autoClose') && !_this.$activePopover.is($trigger)) {
                _this.$activePopover.popover('hide');
              }
              _this.$activePopover = $trigger;
            }
          })
          // Unfortunately, :focusable is only made available when using jQuery
          // UI. While this would be the most semantic pseudo selector to use
          // here, jQuery UI may not always be loaded. Instead, just use :visible
          // here as this just needs some sort of selector here. This activates
          // delegate binding to elements in jQuery so it can work it's bubbling
          // focus magic since elements don't really propagate their focus events.
          // @see https://www.drupal.org/project/bootstrap/issues/3013236
          .on('focus.bs.popover', ':visible', function (e) {
            var $target = $(e.target);
            if (_this.$activePopover && _this.getOption('autoClose') && !_this.$activePopover.is($target) && !$target.closest('.popover.in')[0]) {
              _this.$activePopover.popover('hide');
              _this.$activePopover = null;
            }
          })
          .on('click.bs.popover', function (e) {
            var $target = $(e.target);
            if (_this.$activePopover && _this.getOption('autoClose') && !$target.is('[data-toggle=popover]') && !$target.closest('.popover.in')[0]) {
              _this.$activePopover.popover('hide');
              _this.$activePopover = null;
            }
          })
          .on('keyup.bs.popover', function (e) {
            if (_this.$activePopover && _this.getOption('autoClose') && e.which === 27) {
              _this.$activePopover.popover('hide');
              _this.$activePopover = null;
            }
          })
        ;
  
        var elements = $(context).find('[data-toggle=popover]').toArray();
        for (var i = 0; i < elements.length; i++) {
          var $element = $(elements[i]);
          var options = $.extend({}, $.fn.popover.Constructor.DEFAULTS, $element.data());
  
          // Store the original trigger.
          options.originalTrigger = options.trigger;
  
          // If the trigger is "click", then we'll handle it manually here.
          if (options.trigger === 'click') {
            options.trigger = 'manual';
          }
  
          // Retrieve content from a target element.
          var target = options.target || $element.is('a[href^="#"]') && $element.attr('href');
          var $target = $document.find(target).clone();
          if (!options.content && $target[0]) {
            $target.removeClass('visually-hidden hidden').removeAttr('aria-hidden');
            options.content = $target.wrap('<div/>').parent()[options.html ? 'html' : 'text']() || '';
          }
  
          // Initialize the popover.
          $element.popover(options);
  
          // Handle clicks manually.
          if (options.originalTrigger === 'click') {
            // To ensure the element is bound multiple times, remove any
            // previously set event handler before adding another one.
            $element
              .off('click.drupal.bootstrap.popover')
              .on('click.drupal.bootstrap.popover', function (e) {
                $(this).popover('toggle');
                e.preventDefault();
                e.stopPropagation();
              })
            ;
          }
        }
      },
      detach: function (context) {
        // Immediately return if popovers are not available.
        if (!$.fn.popover || !$.fn.popover.Constructor.DEFAULTS.enabled) {
          return;
        }
  
        // Destroy all popovers.
        $(context).find('[data-toggle="popover"]')
          .off('click.drupal.bootstrap.popover')
          .popover('destroy')
        ;
      },
      getOption: function(name, defaultValue, element) {
        var $element = element ? $(element) : this.$activePopover;
        var options = $.extend(true, {}, $.fn.popover.Constructor.DEFAULTS, ($element && $element.data('bs.popover') || {}).options);
        if (options[name] !== void 0) {
          return options[name];
        }
        return defaultValue !== void 0 ? defaultValue : void 0;
      }
    };
  
  })(window.jQuery, window.Drupal, window.Drupal.bootstrap);
  ;
  /**
   * @file
   * Bootstrap Tooltips.
   */
  
  var Drupal = Drupal || {};
  
  (function ($, Drupal, Bootstrap) {
    "use strict";
  
    /**
     * Extend the Bootstrap Tooltip plugin constructor class.
     */
    Bootstrap.extendPlugin('tooltip', function (settings) {
      return {
        DEFAULTS: {
          animation: !!settings.tooltip_animation,
          enabled: settings.tooltip_enabled,
          html: !!settings.tooltip_html,
          placement: settings.tooltip_placement,
          selector: settings.tooltip_selector,
          trigger: settings.tooltip_trigger,
          delay: parseInt(settings.tooltip_delay, 10),
          container: settings.tooltip_container
        }
      };
    });
  
    /**
     * Bootstrap Tooltips.
     *
     * @todo This should really be properly delegated if selector option is set.
     */
    Drupal.behaviors.bootstrapTooltips = {
      attach: function (context) {
        // Immediately return if tooltips are not available.
        if (!$.fn.tooltip || !$.fn.tooltip.Constructor.DEFAULTS.enabled) {
          return;
        }
  
        var elements = $(context).find('[data-toggle="tooltip"]').toArray();
        for (var i = 0; i < elements.length; i++) {
          var $element = $(elements[i]);
          var options = $.extend({}, $.fn.tooltip.Constructor.DEFAULTS, $element.data());
          $element.tooltip(options);
        }
      },
      detach: function (context) {
        // Immediately return if tooltips are not available.
        if (!$.fn.tooltip || !$.fn.tooltip.Constructor.DEFAULTS.enabled) {
          return;
        }
  
        // Destroy all tooltips.
        $(context).find('[data-toggle="tooltip"]').tooltip('destroy');
      }
    };
  
  })(window.jQuery, window.Drupal, window.Drupal.bootstrap);
  ;