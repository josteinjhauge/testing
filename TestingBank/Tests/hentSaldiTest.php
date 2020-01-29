<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentSaldiTest extends PHPUnit\Framework\TestCase {
    
    public function testHentSaldi_Ingen() {
        // arrange
        $personnummer = "000000000000";
        $bank = new Bank(new BankDBStub());
        // act
        $saldi = $bank->hentSaldi($personnummer);
        // assert
        $tomtArray = [];
        $this->assertEquals($tomtArray, $saldi);
    }
    
    public function testHentSaldi_En() {
        // arrange
        $personnummer = "11111111111";
        $bank = new Bank(new BankDBStub());
        // act
        $saldi = $bank->hentSaldi($personnummer);
        // assert
        $this->assertEquals(10,$saldi[0]);
    }
    
    public function testHentSaldi_Flere() {
        // arrange
        $personnummer = "33333333333";
        $bank = new Bank(new BankDBStub());
        // act
        $saldi = $bank->hentSaldi($personnummer);
        // assert
        $this->assertEquals(100,$saldi[0]);
        $this->assertEquals(200,$saldi[1]);
        $this->assertEquals(300,$saldi[2]);
    }
    
    public function testHentSaldi_Feil() {
        // arrange
        $personnummer = "12345678911";
        $bank = new Bank(new BankDBStub());
        // act
        $saldi = $bank->hentSaldi($personnummer);
        // assert
        $this->assertEquals("Personnummer finnes ikke",$saldi);
    }
}