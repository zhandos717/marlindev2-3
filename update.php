<?php
    include 'functions.php';
    $db = include 'database/start.php';
    $post = $db->update('posts',$_POST,$_GET['id']);
    header('Location: index.php');