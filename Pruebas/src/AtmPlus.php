<?php

function retirar(){
    if($pinvalid=Valida(pin)){
        $status = validaMonto(pinvalid,monto,vebalance,dinero());
        if($status == "RETIRO"){
            retirar(pin,monto);
            return $status;
        }

    }
}

function Valida($pin){
    $passpin = 1234;
    if ($pin==$passpin){
        return True;
    }else{
        return False;
    }

}

function validaMonto($monto,$pinvalida,$balance,$dinero){
    if(!$pinvalida){
        $status = "Pin no válido";
    }
    else if(($dinero<$monto) and ($balance<$monto)){
        $status = "Fondos insuficientes";

    }else{
        $status = "Retiro";

    }
    return $status;
}



?>