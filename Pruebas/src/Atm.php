<?php

namespace App;

use Connection;
use Exception;

include('Connection.php');

class Atm
{
    private $conn;

    public function __construct()
    {
        try {
            $connect = new Connection();
            $this->conn = $connect->getConn();
        } catch (Exception $e) {
            echo "Error de conexion";
        }
    }


    public function loginUser($cardNum, $pin)
    {
        try {
            $query = $this->conn->prepare("SELECT * FROM client WHERE cardNum = ? AND pin = ?");
            $query->bind_param("ss", $cardNum, $pin);
            $query->execute();
            $result = $query->get_result();


            if ($result->num_rows > 0) {
                $this->Menu($result);
            } else {
                echo "Pin incorreto";
                return false;
            }
        } catch (Exception $e) {
            echo "Error, $e";
        }
    }

    public function GetJson($result)
    {
        try {
            $row = $result->fetch_assoc();
            $json = json_encode($row);
            return $json;
        } catch (Exception $e) {
            echo "No se pudo obtener el json, $e";
        }
    }

    public function GetObject($json)
    {
        try {
            $obj = json_decode($json);
            return $obj;
        } catch (Exception $e) {
            echo "No se pudo obtener el objeto PHP, $e";
        }
    }




    public function Menu($result)
    {
        $json = $this->GetJson($result);
        $obj = $this->GetObject($json);

        $name = $obj->name;

        echo "Bienvenido , $name ";
        $banner = true;

        try {
            while ($banner) {
                echo "Ingresa una opción :";
                echo "1) Retiro ";
                echo "2) Revisar balance ";
                echo "3) Depositar a otra tarjeta ";
                echo "4) Salir ";


                $option = fgets(STDIN); // lee la entrada del usuario

                // $optionInt = intval($option);
                switch ($option) {
                    case '1': //Retiro
                        $this->WithDraw($obj);

                        break;
                    case '2': //Revisar balance
                        $this->CheckBalance($obj);

                        break;
                    case '3':
                        $this->Deposit($obj);
                        break;
                    case '4':
                        $this->conn->close();
                        $banner = false;
                        break;
                }
            }
        } catch (Exception $e) {
            echo "Ingresa una opción valida, $e ";
        }
    }

    public function WithDraw($obj)
    {
        try {
            $balance = $obj->balance;
            echo "¿Cuanto deseas retirar? ";
            $amount = intval(fgets(STDIN)); // lee la entrada del usuario
            if ($amount % 100 == 0 && $amount > 0) {
                if ($amount <= $balance) {
                    $balance -= $amount;
                    echo "Has retirado, $ $amount pesos ";
                    echo "Nuevo saldo $balance ";

                    //nuevo saldo
                    $query = $this->conn->prepare("UPDATE client SET balance = ? WHERE cardNum = ?");
                    $query->bind_param("ds", $balance, $obj->cardNum);
                    $query->execute();
                } else {
                    echo "Fondos insuficientes ";
                }
            } else {
                echo "Solo puedes ingresar multiplos de 100 ";
            }
        } catch (Exception $e) {
            echo "Algo fue mal, $e";
        }
    }

    public function CheckBalance($obj)
    {
        echo "Tu saldo es de: $obj->balance";

        // if ($cardNum != null && $cardNum != 0) {
        //     $query = $this->conn->prepare("Select balance from client WHERE cardNum = ?");
        //     $query->bind_param("b", $cardNum);
        //     $query->execute();
        //     $result = $query->get_result();
        //     if ($result->num_rows > 0) {
        //         $row = $result->fetch_assoc();
        //         $balance = $row["balance"];
        //         echo "Tu saldo actual es:  $balance pesos ";
        //     } else {
        //         echo "Ocurrió un error inesperado ";
        //     }
        // }
    }

    public function Deposit($obj)
    {
        $balance = $obj->balance;
        echo "Ingresa el monto que deseas depositar ";
        $amount = intval(fgets(STDIN));
        echo "Ingresa la tarjeta a la que deseas depositar ";
        $depositCard = "987654321";


        if ($amount <= $balance && $amount > 0) { //Revisa que el monto sea adecuado
            $query = $this->conn->prepare("SELECT * FROM client WHERE cardNum = ?");
            $query->bind_param("s", $depositCard);
            $query->execute();
            $result = $query->get_result();


            //revisa si hay resultados
            if ($result->num_rows > 0) {
                try {
                    $row = $result->fetch_assoc();

                    $thirdBalance = $row["balance"];
                    $thirdBalance += $amount;

                    //si los hay interactua y añade el dinero a la cuneta del tercero

                    $balance -= $amount;
                    $query = $this->conn->prepare("UPDATE client SET balance = ? WHERE cardNum = ?");
                    $query->bind_param("ds", $thirdBalance, $depositCard);
                    $query->execute();
                    //y modifica el saldo del cliente

                    $query = $this->conn->prepare("UPDATE client SET balance = ? WHERE cardNum = ?");
                    $query->bind_param("ds", $balance, $obj->cardNum);
                    $query->execute();

                    echo "Deposito exitoso ";
                } catch (Exception $e) {
                    echo "No se pudo hacer la consulta, error $e";
                }
            } else {
                echo "No se encontró ninguna cuenta con ese número de tarjeta ";
            }
        }else{
            echo "No tienes saldo suficiente";
        }
    }
}

?>

<?php
$atm = new Atm();
$atm->loginUser("123456789", "1234");

?>
