<?php 

class QueryBuilder{

    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function getAll($table)
    {
        $sql = "SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return  $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}