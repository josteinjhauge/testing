<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class registrerBetalingTest extends PHPUnit\Framework\TestCase {
    
    public function testregistrerBetaling_OK() {
        // arrange
        $transaksjon = new transaksjon();
        $transaksjon->fraTilKontonummer = "11111111111";
        $transaksjon->belop = 200;
        $transaksjon->dato = "2015-03-14";
        $transaksjon->melding = "dingDing";
        $transaksjon->avventer = true;
        
        $bank = new Bank(new BankDBStub());
        // act
        
        // assert
        
    }
    
    public function testregistrerBetaling_Feil() {
        // arrange
        $transaksjon = new transaksjon();
        $transaksjon->fraTilKontonummer = "11111111111";
        $transaksjon->belop = 200;
        $transaksjon->dato = "2015-03-14";
        $transaksjon->melding = "dingDing";
        $transaksjon->avventer = true;
        
        $bank = new Bank(new BankDBStub());
        // act
        
        // assert
        
    }
    
}