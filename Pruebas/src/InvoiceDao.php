<?php

use mysqli;
class InvoiceDao{
    private $user;
    private $pass;
    private $db;
    private $server;
    private $conn;

    function __construct(){
        $this->user='root';
        $this->pass='';
        $this->db='invoice';
        $this->server='localhost';
        $this->conn= new mysqli($this->server,$this->user,$this->pass,$this->db);
    }

    public function all(){
        $data = [];
        $result = $this->conn->query("SELECT * FROM invoice");
        while($row = mysqli_fetch_array($result)){
            array_push($data, new Bill($row['id'],$row['amount']));
        }
        return  $data;
    }

    public function save($invoice){
        $this->conn->query("INSERT  INTO invoice(id, amount) VALUES('{$invoice->getId()}','{$invoice->getAmount()}')");
    }

    public function close(){
        $this->conn->close();
    }

}

?>