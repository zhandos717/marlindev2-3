<?php
    include __DIR__.'/../functions.php';
    $db = include __DIR__.'/../database/start.php';

    dd($_SERVER);
    $routes = [
        '/' => 'funcrions/homepage.php'
    ];

    // $posts = $db->getAll('posts');
    // include 'index.view.php';