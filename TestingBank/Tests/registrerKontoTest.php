<?php

function testRegistrerKonto_OK(){
        // arrange
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        
        $konto->personnummer = "12345678910";
        $konto->kontonummer = "12345";
        $konto->saldo= "100";
        $konto->type = "type";
        $konto->valuta = "Nok";
        $konto->transaksjoner = array(); // av transaksjon
        // act
        $OK = $admin->registrerKonto($konto);
        //assert
        $this->assertEquals("OK",$OK);
}
function testRegistrerKonto_Feil(){
        // arrange
        $admin = new Admin(new AdminDBStub());
        $konto = new konto();
        
        $konto->personnummer = "";
        $konto->kontonummer = "12345";
        $konto->saldo= "100";
        $konto->type = "type";
        $konto->valuta = "Nok";
        $konto->transaksjoner = array(); // av transaksjon
        // act
        $Feil = $admin->registrerKonto($konto);
        //assert
        $this->assertEquals("Feil",$Feil);
}
