<?php
    include 'functions.php';
    $db = include 'database/start.php';
    $db->delete('posts', $_GET['id']);
    header('Location: index.php');