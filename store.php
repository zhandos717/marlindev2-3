<?php
    include 'functions.php';
    $db = include 'database/start.php';

    $db->create('posts',$_POST);

    header('Location: index.php');