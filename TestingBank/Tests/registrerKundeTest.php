<?php

function testRegistrerKunde_OK(){
        // arrange
        $admin = new Admin(new AdminDBStub());
        $kunde = new kunde();
        
        $kunde->personnummer= "12345678910";
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Hansen";
        $kunde->adresse = "Osloveien 82";
        $kunde->postnr = "0270";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "HeiHei";
        // act
        $OK = $admin->registrerKunde($kunde);
        //assert
        $this->assertEquals("OK",$OK);
}
function testRegistrerKunde_OK_postAdd(){
        // arrange
        $admin = new Admin(new AdminDBStub());
        $kunde = new kunde();
        
        $kunde->personnummer= "12345678910";
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Hansen";
        $kunde->adresse = "Osloveien 82";
        $kunde->postnr = "1000";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "HeiHei";
        // act
        $OK = $admin->registrerKunde($kunde);
        //assert
        $this->assertEquals("OK",$OK);
}
function testRegistrerKunde_Feil_postnr(){
        // arrange
        $admin = new Admin(new AdminDBStub());
        $kunde = new kunde();
        
        $kunde->personnummer= "12345678910";
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Hansen";
        $kunde->adresse = "Osloveien 82";
        $kunde->postnr = "0";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "HeiHei";
        // act
        $Feil = $admin->registrerKunde($kunde);
        //assert
        $this->assertEquals("Feil",$Feil);
}
function testRegistrerKunde_Feil_personnr(){
        // arrange
        $admin = new Admin(new AdminDBStub());
        $kunde = new kunde();
        
        $kunde->personnummer= "0";
        $kunde->fornavn = "Per";
        $kunde->etternavn ="Hansen";
        $kunde->adresse = "Osloveien 82";
        $kunde->postnr = "0270";
        $kunde->poststed = "Oslo";
        $kunde->telefonnr = "12345678";
        $kunde->epost = "HeiHei";
        // act
        $Feil = $admin->registrerKunde($kunde);
        //assert
        $this->assertEquals("Feil",$Feil);
}
