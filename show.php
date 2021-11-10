<?php
    include 'functions.php';
    $db = include 'database/start.php';
    $post = $db->getOne('posts',$_GET['id']);
    include 'show.view.php';
