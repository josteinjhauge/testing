<?php
include_once '../Model/domeneModell.php';

include_once '../BLL/adminLogikk.php';

class slettKontoTest extends PHPUnit\Framework\TestCase {
function testSlettKonto_OK(){
    // arrange
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        
        $konto->personnummer = "12345678910";
        $konto->kontonummer = "12345";
        $konto->saldo= "100";
        $konto->type = "type";
        $konto->valuta = "NOK";
        $konto->transaksjoner = array(); // av transaksjon
        // act
        $OK = $admin->slettKonto($konto);
        //assert
        $this->assertEquals("OK",$OK);
}
function testSlettKonto_Feil(){
    // arrange
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        
        $konto->personnummer = "12345678910";
        $konto->kontonummer = "12346";
        $konto->saldo= "100";
        $konto->type = "type";
        $konto->valuta = "NOK";
        $konto->transaksjoner = array(); // av transaksjon
        // act
        $Feil = $admin->slettKonto($konto);
        //assert
        $this->assertEquals("Feil",$Feil);
}

}