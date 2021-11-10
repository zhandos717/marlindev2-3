<?php
   
    /**
     * Description: Подключение к базе данных
     * @return  PDO 
     */
    function dbh(){
    //$dsn = "mysql:host=localhost;dbname=s747191p_dos;charset=utf8";
    $dsn = "mysql:host=localhost;dbname=marlindev;charset=utf8";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    // return new PDO($dsn, 's747191p_dos', 'RR1bk1w*', $opt);
    return new PDO($dsn, 'root', '', $opt);
    }

/**
 * Description: Запись в базу данных
 * @param string $sql
 * @param array $params
 * @return  mixed
 */
    function query(string $sql, array $params)
    {
        $pdo = dbh();
        $stmt = $pdo->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $stmt->bindValue(':' . $key, $val, $type);
            }
        }
        $stmt->execute();
        return $stmt;
    }
    /**
     * Description: Обновление данных по  айди
     * @param string $table_name
     * @param array $params
     * @return object
     */
    function update_by_id(string $table_name, array $params)
    {
        $fields = '';
        $params2 = $params;
        unset($params2['id']);
        $keys = array_keys($params2);
        $count = count($keys);
        for ($i = 0; $i < $count; ++$i) {
            $fields .= $keys[$i] . '= :' . $keys[$i];
            if ($count - 1 != $i) {
                $fields .=  ',';
            }
        }
        $sql = "UPDATE $table_name  SET $fields  WHERE id = :id ";
        $params = array_merge($params, ['id' => $params['id']]);
        return query($sql, $params);
    }



    function create(string $table_name, array $params)
    {
        $fields = '';
        $params2 = $params;
        $keys = array_keys($params2);
        $count = count($keys);
        for ($i = 0; $i < $count; ++$i) {
            $fields .=  ':' . $keys[$i];
            if ($count - 1 != $i) {
                $fields .=  ',';
            }
        }
        $comma_separated = implode(",", $keys);
        $sql = "INSERT INTO $table_name ($comma_separated) VALUES ($fields) ";
        return query($sql, $params);
    }
?>