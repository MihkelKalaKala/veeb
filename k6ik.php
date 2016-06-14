<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<title>Kõik sissekanded</title>
</head>
<body>	
		<p><a href="http://robert.vkhk.ee/~mihkel.kala/enda/form.html">Täida uus vorm</a></p>
        <?php
			require "api.php";
				$salvestatud = korraga();
				$kkoos = '<table>';
				foreach ($salvestatud as $yksik) {
					$kkoos .= '
					<tr>
						<td>' . $yksik["isik"] . '</td>
						<td><img src="andmebaas/' . $yksik["isik"] . '/pilt.jpg" height="50" width="50"></td>
						<td>' . $yksik["enimi"] . '</td>
						<td>' . $yksik["pnimi"] . '</td>
						<td>
							<a href="yksik.php?isik=' . $yksik["isik"] . '">Vaata</a>
							<a href="muuda.php?isik=' . $yksik["isik"] . '">Muuda</a>
							<a href="kustuta.php?isik=' . $yksik["isik"] . '">Kustuta</a>
						</td>
					</tr>';
				}
				$kkoos .= '</table>';
				print $kkoos;
		?>
</body>
</html> 
