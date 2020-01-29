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
           if($personnummer == "123"){
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
                $konto1->transaksjoner[] = $transaksjon1;
                $konto1->transaksjoner[] = $transaksjon2;
                $konto1->transaksjoner[] = $transaksjon3;
            }
            return 0;
          
            
           
        }


       /* function hentBetalinger($personnummer)
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