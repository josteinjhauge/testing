<?php
    include_once '../Model/domeneModell.php';
    class BankDBStub
    {
        function hentEnKunde($personnummer)
        {
           $enKunde = new kunde();
           $enKunde->personnummer =$personnummer;
           $enKunde->navn = "Per Olsen";
           $enKunde->adresse = "Osloveien 82, 0270 Oslo";
           $enKunde->telefonnr="12345678";
           return $enKunde;
        }
        function hentAlleKunder()
        {
           $alleKunder = array();
           $kunde1 = new kunde();
           $kunde1->personnummer ="01010122344";
           $kunde1->navn = "Per Olsen";
           $kunde1->adresse = "Osloveien 82 0270 Oslo";
           $kunde1->telefonnr="12345678";
           $alleKunder[]=$kunde1;
           $kunde2 = new kunde();
           $kunde2->personnummer ="01010122344";
           $kunde2->navn = "Line Jensen";
           $kunde2->adresse = "Askerveien 100, 1379 Asker";
           $kunde2->telefonnr="92876789";
           $alleKunder[]=$kunde2;
           $kunde3 = new kunde();
           $kunde3->personnummer ="02020233455";
           $kunde3->navn = "Ole Olsen";
           $kunde3->adresse = "Bærumsveien 23, 1234 Bærum";
           $kunde3->telefonnr="99889988";
           $alleKunder[]=$kunde3;
           return $alleKunder;
        }
        function hentTransaksjoner($kontoNr,$fraDato,$tilDato)
        {
            date_default_timezone_set("Europe/Oslo");
            $fraDato = strtotime($fraDato);
            $tilDato = strtotime($tilDato);
            if($fraDato>$tilDato)
            {
                return "Fra dato må være større enn tildato";
            }
            $konto = new konto();
            $konto->personnummer="010101234567";
            $konto->kontonummer=$kontoNr;
            $konto->type="Sparekonto";
            $konto->saldo =2300.34;
            $konto->valuta="NOK";
            if($tilDato < strtotime('2015-03-26'))
            {
                return $konto;
            }
            $dato = $fraDato;
            while ($dato<=$tilDato)
            {
                switch($dato)
                {
                    case strtotime('2015-03-26') :
                        $transaksjon1 = new transaksjon();
                        $transaksjon1->dato='2015-03-26';
                        $transaksjon1->transaksjonBelop=134.4;
                        $transaksjon1->fraTilKontonummer="22342344556";
                        $transaksjon1->melding="Meny Holtet";
                        $konto->transaksjoner[]=$transaksjon1;
                        break;
                    case strtotime('2015-03-27') :
                        $transaksjon2 = new transaksjon();
                        $transaksjon2->dato='2015-03-27';
                        $transaksjon2->transaksjonBelop=-2056.45;
                        $transaksjon2->fraTilKontonummer="114342344556";
                        $transaksjon2->melding="Husleie";
                        $konto->transaksjoner[]=$transaksjon2; 
                        break;
                    case strtotime('2015-03-29') :
                        $transaksjon3 = new transaksjon();
                        $transaksjon3->dato = '2015-03-29';
                        $transaksjon3->transaksjonBelop=1454.45;
                        $transaksjon3->fraTilKontonummer="114342344511";
                        $transaksjon3->melding="Lekeland";
                        $konto->transaksjoner[]=$transaksjon3;
                        break;
                }
                $dato +=(60*60*24); // en dag i tillegg i sekunder
            }
            return $konto;
        }
        
        function sjekkLoggInn($personnummer, $passord){
     
           if($passord == "passord" && $personnummer == "12345678911"){
               return "OK";
           }
           else{
               return "Feil";
           }   
        }
       
        //hør med tor om stappe array med object av konto eller bare nummer
        //hør hva vi skal gjøre med personnummer, eller om det holder slik som nå
        //send inn 3 forskjellige personnummer og avhengig av personnummeret, så returneres 0, 1 og 3 konti'er
        function hentKonti($personnummer){
            $konti = [];
            $konti[] = "12121212121";
            $konti[] = "13131313131";
            $konti[] = "22222222222";
            
            return $konti;
        }
        
        function hentSaldi($personnummer){
            $saldi = [];
            
            $saldi[] = 1000;
            $saldi[] = 100;
            $saldi[] = 200;
            
            return $saldi;
        }
       
        function registrerBetaling($kontoNr, $transaksjon){
            if($transaksjon ==! null && $kontoNr ==! null){
                return "OK";
            }
            else{
                return "Feil";
            }   
        }
        
        function hentBetalinger($personnummer){
           
            $betalinger = [];
            $transaksjon1 = new transaksjon();
            $transaksjon1->fraTilKontonummer = "11111111111";
            $transaksjon1->belop = 200;
            $transaksjon1->dato = "2015-03-14";
            $transaksjon1->melding = "dingDing";
            $transaksjon1->avventer = "1";
            $betalinger[] = $transaksjon1;

            $transaksjon2 = new transaksjon();
            $transaksjon2->fraTilKontonummer = "11111122222";
            $transaksjon2->belop = 212;
            $transaksjon2->dato = "2020-05-14";
            $transaksjon2->melding = "hei";
            $transaksjon2->avventer = "1";
            $betalinger[] = $transaksjon2;
            
            $transaksjon3 = new transaksjon();
            $transaksjon3->fraTilKontonummer = "11222222222";
            $transaksjon3->belop = 122;
            $transaksjon3->dato = "2021-12-14";
            $transaksjon3->melding = "Test";
            $transaksjon3->avventer = "1";
            $betalinger[] = $transaksjon3;
               
            return 0;
           
        }


        /*function hentBetalinger($personnummer)
    {
        // hent alle betalinger for kontonummer som avventer betaling (lik 1)
        $sql = "Select * from Transaksjon Join Konto On "
                . "Transaksjon.Kontonummer = Konto.Kontonummer Where "
                . "Personnummer='$personnummer'"
                . "AND Avventer='1' Order By Transaksjon.Kontonummer";
        $resultat = $this->db->query($sql);
        $betalinger = array();
        while($rad = $resultat->fetch_object())
        {
            $betalinger[]=$rad;
        }
        return $betalinger;
    } */
    }