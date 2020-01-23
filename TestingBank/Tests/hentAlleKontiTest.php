<?php
include_once '../Model/domeneModell.php';

include_once '../BLL/adminLogikk.php';

class hentAlleKontiTest extends PHPUnit\Framework\TestCase {
function testHentAlleKonti_OK(){
    // arrange
        $admin = new Admin(new AdminDBStub());
        // act
        $konti = $admin->hentAlleKonti();
        //assert
        $this->assertEquals("12345678910",$konti[0]->personnummer);
        $this->assertEquals("12345",$konti[0]->kontonummer);
        $this->assertEquals("4560",$konti[0]->saldo);
        $this->assertEquals("type",$konti[0]->type);
        $this->assertEquals("Euro",$konti[0]->valuta);
        $this->assertEquals(array(),$konti[0]->transaksjoner);
        
         $this->assertEquals("12345678911",$konti[1]->personnummer);
        $this->assertEquals("12346",$konti[1]->kontonummer);
        $this->assertEquals("5560",$konti[1]->saldo);
        $this->assertEquals("type",$konti[1]->type);
        $this->assertEquals("NOK",$konti[1]->valuta);
        $this->assertEquals(array(),$konti[1]->transaksjoner);
        
         $this->assertEquals("12345678912",$konti[2]->personnummer);
        $this->assertEquals("12347",$konti[2]->kontonummer);
        $this->assertEquals("6560",$konti[2]->saldo);
        $this->assertEquals("type",$konti[2]->type);
        $this->assertEquals("SEK",$konti[2]->valuta);
        $this->assertEquals(array(),$konti[2]->transaksjoner);
        
}

}