<?php

class utforBetalingTest extends PHPUnit\Framework\TestCase {
    
    public function testUtforBetaling_OK() {
        // arrange
        $TxID = "1";
        $bank = new Bank(new BankDBStub());
        // act
        $betaling = $bank->utforBetaling($TxID);
        // assert
        $this->assertEquals("OK", $betaling);
        
    }
    public function testUtforBetaling_Feil(){
        // arrange
        $TxID = "2";
        $bank = new Bank(new BankDBStub());
        // act
        $betaling = $bank->utforBetaling($TxID);
        // assert
        $this->assertEquals("Feil", $betaling);
 
    }
    
}

