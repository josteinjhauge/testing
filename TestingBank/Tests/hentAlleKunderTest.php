<?php

function testHentAlleKunder()
    {   
        // arrange
        $admin=new Admin(new AdminDBStub());
        // act
        $kunder= $admin->hentAlleKunder();
        // assert
        $this->assertEquals("Per",$kunder[0]->fornavn); 
        $this->assertEquals("Olsen",$kunder[0]->etternavn); 
        $this->assertEquals("Osloveien 82",$kunder[0]->adresse);
        $this->assertEquals("0270",$kunder[0]->postnr);
        $this->assertEquals("Oslo",$kunder[0]->poststed);
        $this->assertEquals("12345678",$kunder[0]->telefonnr); 
        $this->assertEquals("HeiHei",$kunder[0]->passord);
        
        $this->assertEquals("Line",$kunder[1]->fornavn); 
        $this->assertEquals("Jensen",$kunder[1]->etternavn); 
        $this->assertEquals("Askerveien 100",$kunder[1]->adresse);
        $this->assertEquals("1379",$kunder[1]->postnr);
        $this->assertEquals("Asker",$kunder[1]->poststed);
        $this->assertEquals("92876789",$kunder[1]->telefonnr); 
        $this->assertEquals("HeiHei",$kunder[1]->passord);
        
        $this->assertEquals("Ole",$kunder[2]->fornavn); 
        $this->assertEquals("Olsen",$kunder[2]->etternavn); 
        $this->assertEquals("Bærumsveien 23",$kunder[2]->adresse);
        $this->assertEquals("1234",$kunder[2]->postnr);
        $this->assertEquals("Bærum",$kunder[2]->poststed);
        $this->assertEquals("99889988",$kunder[2]->telefonnr); 
        $this->assertEquals("HeiHei",$kunder[2]->passord);
    }
