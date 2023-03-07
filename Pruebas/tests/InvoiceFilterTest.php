<?php
namespace App\Test;

use App\InvoiceFilter;
use Bill;
use InvoiceDao;
use PHPUnit\Framework\TestCase;

class InvoiceFilterTest extends TestCase {
    public function testFiltrarFacturas() {
        // $dao = new InvoiceDao();


        $dao = new InvoiceDao();

        $i1 = new Bill("M", 200.0);
        $i2 = new Bill("A", 300.0);
        $list = [$i1, $i2]; 

        $dao->save($i1);
        $dao->save($i2);
        // $dao = $this->getMockBuilder(InvoiceDao::class)->onlyMethods(['all'])->getMock();

        //$dao->expects($this->once())->method('all')->will($this->returnValue($list));

        $f = new InvoiceFilter($dao);
        $result = $f->filter();
        
        $this->assertEquals(1, sizeof($result));
        $this->assertEquals($i1, $result[0]);
        $dao->close();
    }  
 }
?>