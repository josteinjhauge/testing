<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentSaldiTest extends PHPUnit\Framework\TestCase {
    
    public function testSaldiKonti() {
        // arrange
        $personnummer = "12345678911";
        $bank = new Bank(new BankDBStub());
        // act
        $saldi = $bank->hentSaldi($personnummer);
        // assert
        $this->assertEquals(1000,$saldi[0]);
        $this->assertEquals(100,$saldi[1]);
        $this->assertEquals(200,$saldi[2]);
    }
    
}