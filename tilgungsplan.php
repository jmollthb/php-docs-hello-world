<?php
    $kredit =$_POST [kredit];
    $kreditRest = $kredit;
    $zins =$_POST [zins];
    $annuitaet =$_POST [annuitaet];
    $laufzeit = 0;
	$zinszahlung = 0;
	$tilgung = 0;
	
	echo nl2br("Kredit: $kredit €\n");
	echo nl2br ("Zinsen: $zins %\n");
	echo nl2br ("Annuität: $annuitaet €\n");
	
	$zins = $zins / 100;
	
    while ($kreditRest > $annuitaet) {
        $laufzeit++;
        $zinszahlung = $zins * $kreditRest;
        
		if ($zinszahlung > $annuitaet) {
			echo nl2br ("Die Zinszahlung ist größer als die Annuität. Der Kredit kann mit diesen Maßstäben nicht abbezahlt werden.");
			break;
		}
        
		$tilgung = $annuitaet - $zinszahlung;
        
        
        $kreditRest = $kreditRest - $tilgung;
       
		$kreditRest = round($kreditRest, 2);
        
        if ($kreditRest > $annuitaet) {
            echo nl2br("Jahreszahlung $laufzeit: $annuitaet € Restkredit: $kreditRest €\n");
        }
        else {
            echo nl2br("Jahr $laufzeit: $kreditRest € \n");
        }
    };
    
    if ($laufzeit > 1){
    echo nl2br("Der Kredit ist nach $laufzeit Jahren abgezahlt. \n");
	}
    ?>