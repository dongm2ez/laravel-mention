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
