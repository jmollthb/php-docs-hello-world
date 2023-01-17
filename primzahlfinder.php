<!DOCTYPE HTML>
<html>
    <head>
        <meta charset= utf-8>
        <title>DB2 WiSe2022/23</title>
            <style>
                body {
                    background-color: linen;
                    }

                h1 {
                    color: maroon;
                    margin-left: 40px;
                    }
            </style>
    </head>
    <body>
      <h1>PHP Abgabe</h1>
      <p>Primzahlenfinder für einen vorgegebenen Bereich</p><br>
      	<form action="primzahlenFinder.php" method="get">
			Untergrenze (inklusiv): <input type="number" name="untergrenze" min="1"><br>
			Obergrenze (exklusiv):  <input type="number" name="obergrenze" min="1"><br>
			<input type="submit">
		</form>
        <br>

    <?php
		$untergrenze =$_GET ["untergrenze"];
        $obergrenze =$_GET ["obergrenze"];
        
        //Tauscht Obergrenze und Untergrenze, wenn Untergrenze größer als Obergrenze gewählt wurde
        if ($untergrenze > $obergrenze){
            $x = $obergrenze;
            $obergrenze = $untergrenze;
            $untergrenze = $x;
        }

		echo nl2br("Untergrenze: $untergrenze \n");
        echo nl2br("Obergrenze: $obergrenze \n");
        
        /*
        Überprüft, ob Input ($zahl) eine Primzahl ist, indem es zuerst schaut, ob es sich um die Zahl 1 handelt mithilfe von Modulo.
        Wenn nicht, wird überprüft, ob der Input durch eine Zahl zwischen zwei und der Wurzel der Zahl dividierbar ohne Rest ist.
        Sofern auch dies nicht der Fall ist, dann ist die Zahl prim und es wird ein Wert von 1 ausgegeben.
        */
        function primPruefer($zahl){
    		if ($zahl == 1)
   				return 0;
    		for ($i = 2; $i <= sqrt($zahl); $i++){
        		if ($zahl % $i == 0)
            		return 0;
    		}
    		return 1;
        }
        /*
        Itteriert über die Zahlen zwischen Unter- und Obergrenze.
        Prüft hier jede Zahl mit der Funktion primPruefer und gibt basierend auf dem asugegebenen Wert
        eines von zwei möglichen Statements aus, welche aussagen, ob die Zahl prim ist (in grün), oder nicht (in rot).
        */
        for($i = $untergrenze; $i < $obergrenze; $i++){
        	$zahl = $i;
            $pruefer = primPruefer($zahl);
            if ($pruefer == 1) {
            	echo "<p> <font color=green> $i ist eine Primzahl!</p>";
            }
            else {
            	echo "<p> <font color=red> $i ist keine Primzahl!</p>";
            }
        }
        
	?>
    </body>
</html>