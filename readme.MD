# Simple PHP Router

This is a simple router for PHP. It handles GET and POST requests.

## Installation Process

You can install this package running:
```
composer require aureliosoares/simple-router
```

Then, add this to your .htaccess file:
```
RewriteCond %{SCRIPT_FILENAME} !-f
RewriteCond %{SCRIPT_FILENAME} !-d
RewriteRule ^(.*)$ index.php?route=/$1 [L,QSA]
```

Finally, call the router in your index.php file:

```
<?php

require_once 'vendor/autoload.php';

use AurelioSoares\SimpleRouter\Router;

$router = new Router();

//Define your routes here
//Examples:
//$router->get('/home', 'HomeController', 'index');
//$router->post('/contact', 'ContactController', 'store');

$router->dispatch();
```
