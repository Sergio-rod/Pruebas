<?php
namespace App;

class Atm {

    function loginUser($cardNum,$pin){
        if($cardNum=="aqui ba la consulta de usuario" && $pin=="aqui va la consulta de pin"){
            echo "Bienvenido {$cardNum}";
            return True;
        }
        else {
            echo "Pin incorrecto";
            return False;
        }
    }

    function Menu($banner){
        if ($banner){

            $aux = True;

            while($aux){

                echo "-----------Bienvenido-al-sistema-de-banco----------";
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
     
    }else {
        echo "Ocurrió un error";

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
