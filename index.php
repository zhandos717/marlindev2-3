<?php
    include 'functions.php';
    
    $pdo =  new PDO("mysql:host=localhost;dbname=marlindev;charset=utf8", 'root', '');

    $sql = 'SELECT * FROM posts';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);


    include 'index.view.php';



