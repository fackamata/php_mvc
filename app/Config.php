<?php
    namespace App;

    class Config{

        const DB_DSN = "mysql:host=localhost;dbname=DB";

        const DB_USER = "webflix2";

        const DB_PASS = "12345678";

        private static $database;

        public static function getDb(){
            if (self::$database===null) {
                self::$database = new Database(self::DB_DSN,self::DB_USER,self::DB_PASS); 
            }
        return self::$database;
        }
    }