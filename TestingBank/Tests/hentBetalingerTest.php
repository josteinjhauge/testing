<?php
include_once '../Model/domeneModell.php';
//include_once '../DAL/databaseStub.php';
include_once '../BLL/bankLogikk.php';

class hentBetalingerTest extends PHPUnit\Framework\TestCase {
    
    public function testHentBetalinger() {
        // arrange
        $bank = new Bank(new BankDBStub());
        // act
        // assert
        
    }
    
}