<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class sjekkLoggInnTest extends PHPUnit\Framework\TestCase {
    
    public function testSjekkLoggInn_OK() {
        // arrange
        $passord = "passord";
        $personnummer = "12345678911";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("OK",$OK);       
    }
    
    public function testSjekkLoggInn_Feil() {
        // arrange
        $passord = "passord";
        $personnummer = "12345678911";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil",$OK);
    }

}