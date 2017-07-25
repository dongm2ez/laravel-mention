

<h1 align="center">Laravel Mention</h1>

<p align="center">:heart: This package helps you complete @ function</p>

# Requirement

- PHP >= 5.4.0

# Installation

```shell
$ composer require "dongm2ez/mention" -vvv
```

After installing the library, register the `Dongm2ez\Mention\MentionServiceProvider` in your `config/app.php` file:

  ```php
  'providers' => [
      // Other service providers...
      Dongm2ez\Mention\MentionServiceProvider::class,
  ],
  ```

As optional if you want to modify the default configuration, you can publish the configuration file:

```shell
$ php artisan vendor:publish --provider='Dongm2ez\Mention\MentionServiceProvider' --tag="config"
```

 ```php
 <?php

return [
    // They contain the model that will be mentioned
    'users' => [
        // Model that will be mentioned
        'model' => 'App\User',

        // The column that will be used to search the model
        'column' => 'name',
    ],

    // Match the front mentioned info
    'regex' => '/(\S*)\@([^\r\n\s]*)/i',

    // laravel route alias
    'route_name' => 'users.show',

    // output format "html", "Markdown"
    'format' => 'html',

];

 ```

# Usage

```php

```

# License

MIT