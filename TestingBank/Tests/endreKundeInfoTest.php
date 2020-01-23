<?php

function testEndreKundeInfo_OK(){
        // arrange
        $admin = new Admin(new AdminDBStub());
        $kunde = new kunde();
        
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Hansen";
        $kunde->adresse = "Osloveien 82";
        $kunde->postnr = "0270";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "HeiHei";
        // act
        $OK = $admin->endreKundeInfo($kunde);
       // assert
        $this->assertEquals("OK",$OK); 
}
function testEndreKundeInfo_OK_postAdd(){
        // arrange
        $admin = new Admin(new AdminDBStub());
        $kunde = new kunde();
        
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Hansen";
        $kunde->adresse = "Osloveien 82";
        $kunde->postnr = "1000";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "HeiHei";
        // act
        $OK = $admin->endreKundeInfo($kunde);
        //assert
        $this->assertEquals("OK",$OK);
}
function testEndreKundeInfo_Feil(){
    // arrange
        $admin = new Admin(new AdminDBStub());
        $kunde = new kunde();
        
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Hansen";
        $kunde->adresse = "Osloveien 82";
        $kunde->postnr = "0";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "HeiHei";
        // act
        $Feil = $admin->endreKundeInfo($kunde);
        //assert
        $this->assertEquals("Feil",$Feil);
}
