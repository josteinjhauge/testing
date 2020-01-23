<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class registrerBetalingTest extends PHPUnit\Framework\TestCase {
    
    public function testRegistrerBetaling_OK() {
        // arrange
        $transaksjon = new transaksjon();
        $transaksjon->fraTilKontonummer = "11111111111";
        $transaksjon->belop = 200;
        $transaksjon->dato = "2015-03-14";
        $transaksjon->melding = "dingDing";
        $transaksjon->avventer = "1";
        
        $kontoNr = "12121212121";
        
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->registrerBetaling($kontoNr, $transaksjon);
        // assert
        $this->assertEquals("OK",$OK);
    }
    
    public function testRegistrerBetaling_Feil() {
        // arrange
        $transaksjon = new transaksjon();
        
        $kontoNr = "";
        
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->registrerBetaling($kontoNr, $transaksjon);
        // assert
        $this->assertEquals("Feil",$OK);
    }
}