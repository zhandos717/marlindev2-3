<?php
include 'Connection.php';
include 'QueryBuilder.php';
$config = include 'config.php';

return new QueryBuilder(Connection::make($config['database']));