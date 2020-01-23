<?php
include_once '../Model/domeneModell.php';
    class AdminDBStub
    {
        function hentAlleKunder()
        {
           $alleKunder = array();
           $kunde1 = new kunde();
           $kunde1->personnummer ="01010122344";
           $kunde1->fornavn = "Per";
           $kunde1->etternavn = "Olsen";
           $kunde1->adresse = "Osloveien 82";
           $kunde1->postnr = "0270";
           $kunde1->poststed = "Oslo";
           $kunde1->telefonnr="12345678";
           $kunde1->passord = "HeiHei";
           $alleKunder[]=$kunde1;
           $kunde2 = new kunde();
           $kunde2->personnummer ="01010122344";
           $kunde2->fornavn = "Line";
           $kunde2->etternavn = "Jensen";
           $kunde2->adresse = "Askerveien 100";
           $kunde2->postnr = "1379";
           $kunde2->poststed = "Asker";
           $kunde2->telefonnr="92876789";
           $kunde2->passord = "HeiHei";
           $alleKunder[]=$kunde2;
           $kunde3 = new kunde();
           $kunde3->personnummer ="02020233455";
           $kunde3->fornavn = "Ole";
           $kunde3->etternavn = "Olsen";
           $kunde3->adresse = "Bærumsveien 23";
           $kunde3->postnr = "1234";
           $kunde3->poststed = "Bærum";
           $kunde3->telefonnr="99889988";
           $kunde3->passord = "HeiHei";
           $alleKunder[]=$kunde3;
           return $alleKunder;
        }
        
        function endreKundeInfo ($kunde) 
        {
            
            /*$allePostnr = array ();
            
            $allePostnr[]= "3430";
            $allePostnr[]= "0363";
            $allePostnr[]= "0345";
            $allePostnr[]= "0270";*/
            
            $postnrTest = "0270";
            
            if ($kunde->postnr!= $postnrTest)
            {
                //$nyttPostnr = $kunde->postnr;
                if ($kunde->postnr < 1) 
                {
                    return "Feil";
                }
            }
            return "OK";
                
        }
        
        function registrerKunde ($kunde)
        {
            $postnrTest = "0270";
            
            if ($kunde->postnr!= $postnrTest)
            {
                //$nyttPostnr = $kunde->postnr;
                if ($kunde->postnr < 1) 
                {
                    return "Feil";
                }
            }
                
                $kundeTest = new kunde ();
                $kundeTest->personnummer = $kunde->personnummer;
                
                if ($kundeTest->personnummer != "0")
                {
                    return "OK";
                }
                else 
                {
                    return "Feil";
                }
                
            }
            
            function slettKunde ($personnummer)
            {
                $personnummerSlett = "12345678910";
                
                if ($personnummer == $personnummerSlett)
                {
                    return "OK";
                }
                else
                {
                    return "Feil";
                }
            }
            
            function registrerKonto ($konto)
            {
                /*$kontoTest = new Konto ();
                $kontoTest->personnummer = "12345678910";*/
                
                if ($konto->personnummer == null)
                {
                    return "Feil";
                }
                
                $nyKonto = new konto ();
                $nyKonto->personnummer = $konto->personnummer;
                
                if ($nyKonto->personnummer != "0")
                {
                    return "OK";
                }
                else
                {
                    return "Feil";
                }
            }
            
            function endreKonto ($konto) 
            {
                if ($konto->personnummer == null)
                {
                    return "Feil";
                }
                if ($konto->kontonummer == null)
                {
                    return "Feil";
                }
                return "OK";
            }
            
            function hentAlleKonti ()
            {
                $alleKontoer = array();
                $konto1 = new konto ();
                $konto1->personnummer = "12345678910";
                $konto1->kontonummer = "12345";
                $konto1->saldo = "4560";
                $konto1->type = "type";
                $konto1->valuta = "Euro";
                $konto1->transaksjoner = array();
                $alleKontoer[] = $konto1;
                $konto2 = new konto ();
                $konto2->personnummer = "12345678911";
                $konto2->kontonummer = "12346";
                $konto2->saldo = "5560";
                $konto2->type = "type";
                $konto2->valuta = "NOK";
                $konto2->transaksjoner = array();
                $alleKontoer[] = $konto2;
                $konto3 = new konto ();
                $konto3->personnummer = "12345678912";
                $konto3->kontonummer = "12347";
                $konto3->saldo = "6560";
                $konto3->type = "type";
                $konto3->valuta = "SEK";
                $konto3->transaksjoner = array();
                $alleKontoer[] = $konto3;
                
                return $alleKontoer;
                
            }
            
            function slettKonto ($kontonummer)
            {
                 $kontonummerSlett = "12345678910";
                
                if ($kontonummer == $kontonummerSlett)
                {
                    return "OK";
                }
                else
                {
                    return "Feil";
                }
            }
        }
    