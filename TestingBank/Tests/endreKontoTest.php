<?php
include_once '../Model/domeneModell.php';

include_once '../BLL/adminLogikk.php';
class endreKontoTest extends PHPUnit\Framework\TestCase {
function testEndreKonto_OK(){
    // arrange
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        
        $konto->personnummer = "12345678910";
        $konto->kontonummer = "12345";
        $konto->saldo= "100";
        $konto->type = "type";
        $konto->valuta = "Nok";
        $konto->transaksjoner = array(); // av transaksjon
        // act
        $OK = $admin->endreKonto($konto);
        //assert
        $this->assertEquals("OK",$OK);
}
function testEndreKonto_Feil_persNr(){
    // arrange
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        
        $konto->personnummer = null;
        $konto->kontonummer = "12345678910";
        $konto->saldo= "100";
        $konto->type = "type";
        $konto->valuta = "Nok";
        $konto->transaksjoner = array(); // av transaksjon
        // act
        $Feil = $admin->endreKonto($konto);
        //assert
        $this->assertEquals("Feil",$Feil);
}
function testEndreKonto_Feil_kontoNr(){
    // arrange
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        
        $konto->personnummer = "12345678910";
        $konto->kontonummer = null;
        $konto->saldo= "100";
        $konto->type = "type";
        $konto->valuta = "Nok";
        $konto->transaksjoner = array(); // av transaksjon
        // act
        $Feil = $admin->endreKonto($konto);
        //assert
        $this->assertEquals("Feil",$Feil);
}
}
