<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentKundeInfoTest extends PHPUnit\Framework\TestCase {
    
    public function testHentKundeInfo_OK() {
        // arrange
        $personnummer = "11111222222";
        $bank = new Bank(new BankDBStub());
        // act
        $kunde = $bank->hentKundeInfo($personnummer);
        // assert
        $this->assertEquals("11111222222", $kunde->personnummer);
        $this->assertEquals("Roger", $kunde->fornavn);
        $this->assertEquals("Ruud", $kunde->etternavn);
        $this->assertEquals("Gata 1, Brasil", $kunde->adresse);
        $this->assertEquals("87654321", $kunde->telefonnr);
        $this->assertEquals("Passord123", $kunde->passord);
        $this->assertEquals("2040", $kunde->postnr);
    }
    
    public function testHentKundeInfo_Feil() {
        // arrange
        $personnummer = "12121212121";
        $bank = new Bank(new BankDBStub());
        // act
        $kunde = $bank->hentKundeInfo($personnummer);
        // assert
        $this->assertEquals("Feil", $kunde);
    }
}