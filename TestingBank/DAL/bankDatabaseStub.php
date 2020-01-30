<?php
    include_once '../Model/domeneModell.php';
    
    class BankDBStub
    {
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
       
        function hentKonti($personnummer){
            $konti = [];
            
            if($personnummer == "000000000000"){
            }
            elseif ($personnummer == "11111111111"){
                $konti[] = "12121212121";
            }
            elseif ($personnummer == "33333333333") {
                $konti[] = "13131313131";
                $konti[] = "14141414141";
                $konti[] = "15151515151";
            }
            else {
                return "Personnummer finnes ikke";
            }
            return $konti;
        }
        
        function hentSaldi($personnummer){
            $saldi = [];
            
            if($personnummer == "000000000000"){
            }
            elseif ($personnummer == "11111111111"){
                $saldi[] = 10;
            }
            elseif ($personnummer == "33333333333") {
                $saldi[] = 100;
                $saldi[] = 200;
                $saldi[] = 300;
            }
            else {
                return "Personnummer finnes ikke";
            }
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
           if($personnummer == "1" || "2" || "4"){
                $transaksjon1 = new transaksjon();
                $transaksjon1->fraTilKontonummer = "11111111111";
                $transaksjon1->belop = 200;
                $transaksjon1->dato = "2015-03-14";
                $transaksjon1->melding = "dingDing";
                $transaksjon1->avventer = "1";
                
                $transaksjon2 = new transaksjon();
                $transaksjon2->fraTilKontonummer = "11111122222";
                $transaksjon2->belop = 212;
                $transaksjon2->dato = "2020-05-14";
                $transaksjon2->melding = "hei";
                $transaksjon2->avventer = "1";
                
                $transaksjon3 = new transaksjon();
                $transaksjon3->fraTilKontonummer = "11222222222";
                $transaksjon3->belop = 122;
                $transaksjon3->dato = "2021-12-14";
                $transaksjon3->melding = "Test";
                $transaksjon3->avventer = "1";
                
                $konto1 = new konto();
                $konto1->kontonummer = "123";
                $konto1->saldo = "100";
                $konto1->type = "type";
                $konto1->valuta = "NOK";
                $konto1->personnummer = $personnummer;
                
                $konto1->transaksjoner[] = $transaksjon1;
                $konto1->transaksjoner[] = $transaksjon2;
                $konto1->transaksjoner[] = $transaksjon3;
                
                $konto2 = new konto();
                $konto2->kontonummer = "123";
                $konto2->saldo = "100";
                $konto2->type = "type";
                $konto2->valuta = "NOK";
                $konto2->personnummer = $personnummer;
                $konto2->transaksjoner = array();
                
                $konto3 = new konto();
                $konto3->kontonummer = "123";
                $konto3->saldo = "100";
                $konto3->type = "type";
                $konto3->valuta = "NOK";
                $konto3->personnummer = $personnummer;
                $konto3->transaksjoner[] = $transaksjon1;
                
                if($personnummer == "1"){
                    //persNr 1 har alt
                    return $konto1->transaksjoner;
                }
                
                if ($personnummer =="2"){
                    //persNr 2 har konto, men ingen transaksjoner
                    return $konto2->transaksjoner;
                }
                
                if($personnummer == "4"){
                    //persNr 4 har konto og en transaksjon
                    return $konto3->transaksjoner;
                }
            }
            if($personnummer =="3"){
               return "Ingen konto";
            }
            return null;

        }
        
        function utforBetaling($TxID){
            if($TxID == "1"){
                return "OK";
            }
            else{
                return "Feil";
            }
        }
        
        function hentKundeInfo($personnummer)
        {
            $kunde = new kunde();
            
            $kunde->personnummer = "11111222222";
            $kunde->fornavn = "Roger";
            $kunde->etternavn = "Ruud";
            $kunde->adresse = "Gata 1, Brasil";
            $kunde->telefonnr = "87654321";
            $kunde->passord = "Passord123";
            $kunde->postnr = "2040";
            
            if($personnummer == "11111222222"){
                return $kunde;
            }
            else {
                return "Feil";
            }
        }
 
    }