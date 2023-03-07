<?php
namespace App;

class Atm {
    
    public function withdraw($pin, $amount_entered, $amount_in_account, $amount_in_atm) {
    if ($pin != 4987) {
        return "Incorrect pin";
    }
    
    if ($amount_in_atm == 0 ) {
        return "ATM Out of Money";
    }
    
    if ($amount_in_atm < $amount_entered) {
        return "Insufficient Funds in ATM";
    }
    
    if ($amount_entered % 100 != 0) {
        return "Amount is not multiple of 100";
    }
    
    return "Successful withdraw";
}

}
?>
