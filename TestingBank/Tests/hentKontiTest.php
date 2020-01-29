<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentKontiTest extends PHPUnit\Framework\TestCase {
    
    public function testHentKonti_Ingen() {
        // arrange
        $personnummer = "000000000000";
        $bank = new Bank(new BankDBStub());
        // act
        $konti = $bank->hentKonti($personnummer);
        // assert
        $tomtArray = [];
        $this->assertEquals($tomtArray, $konti);
    }
    
    public function testHentKonti_En() {
        // arrange
        $personnummer = "11111111111";
        $bank = new Bank(new BankDBStub());
        // act
        $konti = $bank->hentKonti($personnummer);
        // assert
        $this->assertEquals("12121212121",$konti[0]);
    }
    
    public function testHentKonti_Flere() {
        // arrange
        $personnummer = "33333333333"; 
        $bank = new Bank(new BankDBStub());
        // act
        $konti = $bank->hentKonti($personnummer);
        // assert
        $this->assertEquals("13131313131",$konti[0]);
        $this->assertEquals("14141414141",$konti[1]);
        $this->assertEquals("15151515151",$konti[2]);
    }
    
    public function testHentKonti_Feil() {
        // arrange
        $personnummer = "55555555555";
        $bank = new Bank(new BankDBStub());
        // act
        $konti = $bank->hentKonti($personnummer);
        // assert
        $this->assertEquals("Personnummer finnes ikke",$konti);
    } 
}