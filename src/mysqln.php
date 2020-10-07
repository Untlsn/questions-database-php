<?php


class MySqlN {

    private mysqli $connection;

    function __construct(string $server, string $user, string $password) {
        $this->connection = new mysqli($server, $user, $password);
    }

    function query(string $sqlCode) {
        if(!$query = $this->connection->query($sqlCode)) {
            throw new Exception('>ERROR Query is invalid. ERROR<');
        }else{
            $arr = [];
            while($row = $query->fetch_row()) {
                $arr[] = $row;
            }
            $query->close();
            return $arr;
        }
    }
    function queryOne(string $sqlCode) {
        return $this->query($sqlCode)[0];
    }

    function __destruct(){
        $this->connection->close();
    }


}