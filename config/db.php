<?php

class Database{
    public static function connect(){
        $connectionDB = null;
        try{
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $connectionDB = new mysqli('localhost', 'root', 'mysql', 'ticket');
            $connectionDB->query("SET NAMES 'utf8'");
            $threadId = $connectionDB->thread_id;
            if (mysqli_connect_errno()) {
                printf("Falló la conexión: %s\n", mysqli_connect_error());
                exit();
            }

        } catch (mysqli_sql_exception $mysqlEX) {
            error_log($mysqlEX);
            if($connectionDB!=null){
                $connectionDB->kill($threadId);
            }
        }
        return $connectionDB;        
    }
}