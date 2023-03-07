<?php
use PHPUnit\Framework\TestCase;

class NumFinderTest extends TestCase{

    private $nf;


    public function setUp():void{
        $this->nf = new NumFinder();

    }
    
    public function testShowSmallest(){
        $this->nf->find(array(1,2,5));

        $this->assertEquals(1,$this->nf->getSmallest());
    }
    public function testShowLargest(){
        $this->nf->find(array(-1,-2,-5));

        $this->assertEquals(-1,$this->nf->getLargest());
    }
    public function testWithNotNumericValues(){
        $this->expectException(InvalidArgumentException::class);
        $this->nf->find(array("sad",'K',-5));
       
    }
   
 


}

// estados de prueba
// entradas esperadas
// resultados esperados
// fail o  no fail
// si salio error como corregirlo



?>

