<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Vaatamine</title>
</head>
<body>
		<p><a href="http://robert.vkhk.ee/~mihkel.kala/enda/k6ik.php">Kõik sissekanded</a></p>
		<p><a href="http://robert.vkhk.ee/~mihkel.kala/enda/form.html">Täida uus vorm</a></p>
		<?php
			require "api.php";
			$isik = $_GET["isik"];
			$andmed = vaata($isik);

			print '<img src="' . "./andmebaas/$isik/pilt.jpg" . '" height=150" width="150">'. "<br>";
			print "Eesnimi : ". $andmed["enimi"]. "<br>";
			print "Perenimi : ". $andmed["pnimi"]. "<br>";
			print "Sugu : ". $andmed["sugu"]. "<br>";
			print "Telefoni number : ". $andmed["tel"]. "<br>";
			print "E-Mail : ". $andmed["epost"]. "<br>";
			print "Viimati muudetud : ". $andmed["aeg"]. "<br>";
			print "Loodud : ". $andmed["aeg2"];
		?>
</body>
</html> 

