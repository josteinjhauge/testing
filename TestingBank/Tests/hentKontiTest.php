<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentKontiTest extends PHPUnit\Framework\TestCase {
    
    public function testHentKonti() {
        // arrange
        $personnummer = "12345678911";
        $bank = new Bank(new BankDBStub());
        // act
        $konti = $bank->hentKonti($personnummer);
        // assert
        $this->assertEquals("12121212121",$konti[0]);
        $this->assertEquals("13131313131",$konti[1]);
        $this->assertEquals("22222222222",$konti[2]);
    }
    
}