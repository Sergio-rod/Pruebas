<?php

namespace App\AtmTest;

use App\Atm;
use PHPUnit\Framework\TestCase;


        class AtmTest extends TestCase
        {

            private $atm;
            public function setUp():void{
                $this->atm = new Atm();
        
            }            public function testWithdraw()
            {
                
         
                $this->assertEquals("Successful withdraw", $this->atm->withdraw(4987, 200, 1000, 5000));
                $this->assertEquals("ATM Out of Money", $this->atm->withdraw(4987, 200, 800, 0));
                $this->assertEquals("Insufficient Funds in ATM", $this->atm->withdraw(4987, 200, 800, 100));
                $this->assertEquals("Amount is not multiple of 100", $this->atm->withdraw(4987, 50, 800, 5000));
                $this->assertEquals("Incorrect pin", $this->atm->withdraw(4978, 0, 800, 5000));




            }
        }
?>