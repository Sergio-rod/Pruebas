<?php
use App\InvoiceFilter;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

// Codigo original


// namespace App\Test;

// use App\InvoiceFilter;
// use Bill;
// use InvoiceDao;
// use PHPUnit\Framework\TestCase;

// class InvoiceFilterTest extends TestCase {
//     public function testFiltrarFacturas() {
//         // $dao = new InvoiceDao();


//         $dao = new InvoiceDao();

//         $i1 = new Bill("M", 200.0);
//         $i2 = new Bill("A", 300.0);
//         $list = [$i1, $i2]; 

//         $dao->save($i1);
//         $dao->save($i2);
//         // $dao = $this->getMockBuilder(InvoiceDao::class)->onlyMethods(['all'])->getMock();

//         //$dao->expects($this->once())->method('all')->will($this->returnValue($list));

//         $f = new InvoiceFilter($dao);
//         $result = $f->filter();
        
//         $this->assertEquals(1, sizeof($result));
//         $this->assertEquals($i1, $result[0]);
//         $dao->close();
//     }  
//  }

//termina codigo original

class InvoiceFilterTest extends TestCase{

    public function testFiltrarFacturas(){
        $i1 = new Bill("M",20.0);
        $i2 = new Bill("A",300.0);
        $list = [$i1,$i2];

        //ahcer el mockin de la clase invoceDao para el metodo all

        $dao = $this->getMockBuilder(InvoiceDao::class)
        ->onlyMethods(['all'])
        ->getMock();

        //poner la conduca que queremos del mock, hacer que se ejecute una vez el metodo all()
        // y que regrese el valor
        $dao->expects($this->once())
        ->method('all')
        ->will($this->returnValue($list));

        /*Crear ahora el objeto de la clase invoiceFilter para poder probar la funcion filter
        que ejecutara al método mockeado all de la clase mockeada InvoiceDao*/
        
        $f = new InvoiceFilter($dao);

        $result = $f->filter();

        assertEquals(1, sizeof($result));
        assertEquals($i1,$result[0]);

    }
}




?>