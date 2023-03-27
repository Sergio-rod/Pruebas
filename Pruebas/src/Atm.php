<?php
namespace App;
use Connection;
include('Connection.php');

class Atm {

    private $conn;

    function __construct(){
        $connect = new Connection();
        $this->conn = $connect->getConn();
    }


    function loginUser($cardNum,$pin){
        $query = $this->conn->prepare("SELECT * FROM client WHERE cardNumber = ? AND pin = ?");
        $query->bind_param("ss", $cardNum, $pin);
        $query->execute();
        $result = $query->get_result();
        

        if($result->num_rows >0 ){

            $this->Menu($result);
        }
        else{
            echo "Pin incorreto";
            return False;
        }
    }

    function Menu($result){
        $row = $result->fetch_array();
        $name = $row["name"];
        echo "Bienvenido, $name";  
        $banner = True;

        while($banner){

            echo "Ingresa una opción: 1,2,3 ";
            $option = fgets(STDIN); // lee la entrada del usuario
            $option = intval($option); // convierte la entrada en un entero

            switch ($option) {
                case 1:
                    $amount = fgets(STDIN);
                    $amount = INTVAL($amount);
                    $this->WithDraw($amount);

                    break;
                case 2:
                    break;
                case 3:
                    break;
                case 4:
                    $aux = False;
                    break;


            } 
        }
     
    }

    function WithDraw($amount){

        if($amount<="consulta a la base de datos"){
            $sql = "consulta para editar la base de datos y reducir el monto";
            echo "El retiro se hizo exitosamente";
            return $amount;
        }
        if($amount>"consulta a la base de datos"){
            echo "No tienes suficientes fondos en tu cuenta";
            return 0;
        }
        else{
            echo "Ingresa solo carácteres númericos";
            return null;
        }

    }

    function CheckBalance($cardNum){
        if ($cardNum!=null && $cardNum!= 0){
            $sqlSalt = "consulta sql";
            echo "Tu saldo es: {$sqlSalt} ";
            return $sqlSalt;
        }
        else{
            echo "Ocurrió un error inesperado";
        }

    }

    function Deposit($cardNum,$cardNumDeposit,$amount){
        if ($amount<="consulta a la base de datos"){
            


        }
    }



}
