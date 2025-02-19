<?php
// Turn on all error reporting
error_reporting(E_ALL);

// Display errors to the output
ini_set('display_errors', 1);

// Optionally, enable HTML-formatted errors for easier reading during development
ini_set('html_errors', 1);

require __DIR__ . '/lib/vendor/autoload.php';
require_once(__DIR__ . "/lib/class_i18.php");

use FastRoute\RouteCollector;
use FastRoute\simpleDispatcher;

$dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
    $current_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $start = '';

    $routeHandler = function ($viewFile, $vars = []) {
        return function ($vars) use ($viewFile) {
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
            $host = $_SERVER['HTTP_HOST'];
            $uri = $_SERVER['REQUEST_URI'];
            $baseUrl = $protocol . $host . $uri;

            // Default language
            $language = 'ru';
            if (isset($_COOKIE['lang'])) {
                $language = $_COOKIE['lang'];
            }

            $lang = new i18n(__DIR__ . "/lang/{$language}.json", __DIR__ . '/langcache/', $language);
            $lang->setForcedLang($language);
            $lang->init();
            $site_url = "/";
            require "views/{$viewFile}.php";
        };
    };

    $r->addRoute('GET', $start.'/', $routeHandler('index'));

    $r->addRoute('GET', $start.'/patsient/mis-on-hae/nahud-sumptomid-ja-pohjused', $routeHandler('patient_signs-symptoms-and-causes'));
    $r->addRoute('GET', $start.'/patsient/mis-on-hae/hae-diagnoosimine', $routeHandler('patient_diagnosing-hae'));
    $r->addRoute('GET', $start.'/patsient/mis-on-hae/hae-ravimine', $routeHandler('patient_treating-hae'));

    $r->addRoute('GET', $start.'/patsient/hae-ga-elamine/hae-moju', $routeHandler('patient_impact-of-hae'));
    $r->addRoute('GET', $start.'/patsient/hae-ga-elamine/hae-ja-perekond', $routeHandler('patient_hae-and-family'));
    $r->addRoute('GET', $start.'/patsient/hae-ga-elamine/hae-tugi', $routeHandler('patient_support-for-hae'));

    $r->addRoute('GET', $start.'/hcp/hae-tuvastamine/nahud-sumptomid-ja-pohjused', $routeHandler('hcp_signs-symptoms-and-causes'));
    $r->addRoute('GET', $start.'/hcp/hae-tuvastamine/hae-diagnoosimine', $routeHandler('hcp_diagnosing-hae'));
    $r->addRoute('GET', $start.'/hcp/hae-tuvastamine/hae-ravimine', $routeHandler('hcp_treating-hae'));

    $r->addRoute('GET', $start.'/hcp/hae-moju/hae-haiguskoormus', $routeHandler('hcp_burden-of-hae'));
    $r->addRoute('GET', $start.'/hcp/hae-moju/patsientidega-vestlemine', $routeHandler('hcp_talking-to-patients'));
    $r->addRoute('GET', $start.'/hcp/hae-moju/hae-ravimine', $routeHandler('hcp_managing-hae'));

    $r->addRoute('GET', $start.'/utility/legal-notice', $routeHandler('utility_legal-notice'));
    $r->addRoute('GET', $start.'/utility/site-map', $routeHandler('utility_site-map'));
    $r->addRoute('GET', $start.'/utiliit/kontaktid', $routeHandler('utility_center-contacts'));
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = rawurldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Exclude CSS files from routing logic
if (pathinfo($uri, PATHINFO_EXTENSION) === 'css') {
    return false;
}

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        require __DIR__ . "/error-pages/404.html";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        require __DIR__ . "/error-pages/405.php";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $handler($vars);
        break;
}
?>
