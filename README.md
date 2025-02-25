## Features
- Simple routing with [FastRoute](https://github.com/nikic/FastRoute)
- Basic internationalization support
- Clean and modular PHP code structure

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
**index.php:** The entry point of the application. It sets up the routing and handles incoming requests.
**composer.json:** Contains the project dependencies. The primary dependency is nikic/fast-route for routing.
**class_i18.php:** A class file (presumably for internationalization or similar functionality) used within the project.

## To run the application, you can use a PHP built-in server for development:
**php -S localhost:8000**
Then, open your web browser and navigate to http://localhost:8000 to view the application.
