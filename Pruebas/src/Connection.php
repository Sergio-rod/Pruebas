<?php

    Class Connection{
        private $user;
        private $pass;
        private $db;
        private $server;
        private $conn;
      
        function __construct(){
            $this->user='root';
            $this->pass='';
            $this->db='test';
            $this->server='localhost';
            $this->conn= new mysqli($this->server,$this->user,$this->pass,$this->db);
        }

        public function getConn(){
            return $this->conn;
        }
        public function closeConn(){
            $this->conn->close();
        }
   
    }





?>