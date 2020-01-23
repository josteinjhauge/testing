<?php
include_once '../Model/domeneModell.php';

include_once '../BLL/adminLogikk.php';
function testSlettKunde_OK(){
    // arrange
        $admin = new Admin(new AdminDBStub());
        $personnummer = "12345678910";
        // act
        $OK = $admin->slettKunde($personnummer);
        //assert
        $this->assertEquals("OK",$OK);
}
function testSlettKunde_Feil(){
        // arrange
        $admin = new Admin(new AdminDBStub());
        $personnummer = "12345678911";
        // act
        $Feil = $admin->slettKunde($personnummer);
        //assert
        $this->assertEquals("Feil",$Feil);
}

