## Overview
This project is a website that utilizes the [FastRoute](https://github.com/nikic/FastRoute) library for routing, as well as the [php-i18n](https://github.com/Philipp15b/php-i18n) library for internationalization. 
It is designed to provide a simple yet efficient routing mechanism and language support for web applications.

## Features
- Lightweight and fast routing system.
- Built-in internationalization support using php-i18n.
- Easy integration with PHP applications.
- Organized file structure for maintainability.

## Requirements
- PHP 8.0 or higher
- [Composer](https://getcomposer.org/)

## Installation
1. **Clone the repository:**
   git clone https://github.com/Social-Media-Star-OÜ/hae.git
2. **Change to the project directory:**
   cd hae
3. **Install dependencies using Composer:**
   cd lib
   composer install

## Usage
**index.php:** 
The entry point of the application. It sets up the routing and handles incoming requests.
**composer.json:** 
Contains the project dependencies. The primary dependencies are nikic/fast-route for routing and Philipp15b/php-i18n for internationalization.
**class_i18.php:** 
A class file that likely provides additional internationalization functionality.

## To run the application, you can use a PHP built-in server for development:
**php -S localhost:8000**
Then, open your web browser and navigate to http://localhost:8000 to view the application.
