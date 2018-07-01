<?php

    class DB_Functions {
        private $db;
        //put your code here
        // constructor
        function __construct() {
            include_once './db_connect.php';
            // connecting to database
            $this->db = new DB_Connect();
            $this->db->connect();
        }
        // destructor
        function __destruct() {

        }
        /**
         * Getting all users
         */
        public function getAllUsers() {
            $result = mysqli_query("select * FROM app_user_table");
            return $result;
        }
    }
?>