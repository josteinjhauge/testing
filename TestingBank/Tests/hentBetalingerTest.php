<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentBetalingerTest extends PHPUnit\Framework\TestCase {
    
    public function testHentBetalinger_OK_3Transaksjoner() {
        // arrange
        $bank = new Bank(new BankDBStub());
        $personnummer = "1";
        // act
        $transaksjoner = $bank->hentBetalinger($personnummer);
        // assert     
        $this->assertEquals("11111111111",$transaksjoner[0]->fraTilKontonummer);
        $this->assertEquals(200,$transaksjoner[0]->belop);
        $this->assertEquals("2015-03-14",$transaksjoner[0]->dato);
        $this->assertEquals("dingDing",$transaksjoner[0]->melding);
        $this->assertEquals("1",$transaksjoner[0]->avventer);
        
        $this->assertEquals("11111122222",$transaksjoner[1]->fraTilKontonummer);
        $this->assertEquals(212,$transaksjoner[1]->belop);
        $this->assertEquals("2020-05-14",$transaksjoner[1]->dato);
        $this->assertEquals("hei",$transaksjoner[1]->melding);
        $this->assertEquals("1",$transaksjoner[1]->avventer);
        
        $this->assertEquals("11222222222",$transaksjoner[2]->fraTilKontonummer);
        $this->assertEquals(122,$transaksjoner[2]->belop);
        $this->assertEquals("2021-12-14",$transaksjoner[2]->dato);
        $this->assertEquals("Test",$transaksjoner[2]->melding);
        $this->assertEquals("1",$transaksjoner[2]->avventer);
    }
    
    public function testHentBetalinger_OK_1Transaksjoner() {
        // arrange
        $bank = new Bank(new BankDBStub());
        $personnummer = "4";
        // act
        $transaksjoner = $bank->hentBetalinger($personnummer);
        // assert     
        $this->assertEquals("11111111111",$transaksjoner[0]->fraTilKontonummer);
        $this->assertEquals(200,$transaksjoner[0]->belop);
        $this->assertEquals("2015-03-14",$transaksjoner[0]->dato);
        $this->assertEquals("dingDing",$transaksjoner[0]->melding);
        $this->assertEquals("1",$transaksjoner[0]->avventer);
        
        
    }
    
    
    public function testHentBetalinger_OK_ingenTransaksjoner(){
        //arrange
        $bank = new Bank(new BankDBStub());
        $personnummer = "2";
        //act
        $transaksjoner = $bank->hentBetalinger($personnummer);
        //assert
        $tomtArray = [];
        $this->assertEquals($transaksjoner,$tomtArray);
    }
    
    public function testHentBetalinger_OK_ingenKonto(){
        //arrange
        $bank = new Bank(new BankDBStub());
        $personnummer = "3";
        //act
        $transaksjoner = $bank->hentBetalinger($personnummer);
        //assert
        $this->assertEquals("Ingen konto",$transaksjoner);
    }
    
    public function testHentBetalinger_Feil() {
        $bank = new Bank(new BankDBStub());
        $personnummer = "5";
        //act
        $transaksjoner = $bank->hentBetalinger($personnummer);
        //assert
        $this->assertEquals($transaksjoner,null);
    }
  
}