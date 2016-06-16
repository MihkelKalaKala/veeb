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
				$salvestatud = display_allitems();
				$kkoos = '<table>';
				foreach ($salvestatud as $yksik) {
					$kkoos .= '
					<tr>
						<td><img src="db/' . $yksik["id"] . '/image.jpg" height="50" width="50"></td> 
						<td>' . $yksik["enimi"] . '</td>
						<td>' . $yksik["pnimi"] . '</td>
						<td>
							<a href="yksik.php?id=' . $yksik["id"] . '">Vaata</a>
							<a href="muuda.php?id=' . $yksik["id"] . '">Muuda</a>
							<a href="kustuta.php?id=' . $yksik["id"] . '">Kustuta</a>
						</td>
					</tr>';
				}
				$kkoos .= '</table>';
				print $kkoos;
		?>
</body>
</html> 
