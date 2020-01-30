<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class sjekkLoggInnTest extends PHPUnit\Framework\TestCase {
    
    public function testSjekkLoggInn_OK() {
        // arrange
        $personnummer = "12345678911";
        $passord = "Passord1!";      
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("OK",$OK);       
    }
    
    public function testSjekkLoggInn_FeilPersonnummer() {
        // arrange
        $personnummer = "10987654321";
        $passord = "Passord1!";
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil",$OK);
    }
    
    public function testSjekkLoggInn_FeilPassord() {
        // arrange
        $personnummer = "12345678911";
        $passord = "Passord2!";
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil",$OK);
    }
    
    // Under ligger tester mot regex
    public function testSjekkLoggInn_ForLangtPersonnummer() {
        // arrange
        $personnummer = "123456789112"; // her er det 12 tegn
        $passord = "Passord1!";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil i personnummer",$OK);
    }
    
    public function testSjekkLoggInn_ForKortPersonnummer() {
        // arrange
        $personnummer = "1234567891"; // her er det 10 tegn
        $passord = "Passord1!";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil i personnummer",$OK);
    }
    
    public function testSjekkLoggInn_TegnIPersonnummer() {
        // arrange
        $personnummer = "1234-567891";
        $passord = "Passord1!";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil i personnummer",$OK);
    }
    
    public function testSjekkLoggInn_BokstaverIPersonnummer() {
        // arrange
        $personnummer = "a1234567891";
        $passord = "Passord1!";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil i personnummer",$OK);
    }
    
    public function testSjekkLoggInn_ForKortPassord() {
        // arrange
        $personnummer = "12345678911";
        $passord = "Pas1!";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil i passord",$OK);
    }
    
    public function testSjekkLoggInn_ForLangtPassord() {
        // arrange
        $personnummer = "12345678911";
        $passord = "Passooooooooooooord1!";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil i passord",$OK);
    }
    
    public function testSjekkLoggInn_ManglerNummerPassord() {
        // arrange
        $personnummer = "12345678911";
        $passord = "Passord!";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil i passord",$OK);
    }
    
    public function testSjekkLoggInn_ManglerBokstavPassord() {
        // arrange
        $personnummer = "12345678911";
        $passord = "111!!!";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil i passord",$OK);
    }
    
    public function testSjekkLoggInn_ManglerStorBokstavPassord() {
        // arrange
        $personnummer = "12345678911";
        $passord = "111!!!a";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil i passord",$OK);
    }
    
    public function testSjekkLoggInn_ManglerTegnPassord() {
        // arrange
        $personnummer = "12345678911";
        $passord = "Passord1";       
        $bank = new Bank(new BankDBStub());
        // act
        $OK = $bank->sjekkLoggInn($personnummer, $passord);
        // assert
        $this->assertEquals("Feil i passord",$OK);
    }

}