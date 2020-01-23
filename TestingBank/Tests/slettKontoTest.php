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
        $konto->valuta = "Nok";
        $konto->transaksjoner = array(); // av transaksjon
        // act
        $OK = $admin->slettKonto($konto);
        //assert
        $this->assertEquals("OK",$OK);
}

}