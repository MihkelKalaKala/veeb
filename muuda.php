<!DOCTYPE html>
<html lang="et">
<head>
		<meta charset="utf-8">
		<title>Muutmine</title>
</head>
<body>
		<?php
			require "api.php";
			$id = $_GET["id"];
			$andmed = display_singleitem($id);
		?>

		<form action="form.php?id=<?php print $andmed["id"]; ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Isiklik informatsioon:</legend>
                Eesnimi:<br>
				<input type="text" name="enimi" value="<?php print $andmed["enimi"]; ?>" maxlength="30" autocomplete="off" required><br>
				Perenimi:<br>
				<input type="text" name="pnimi" value="<?php print $andmed["pnimi"]; ?>" maxlength="30" autocomplete="off" required><br>
				<br>
				Sugu:<br>
				<input value="Mees" type="radio" name="sugu" <?php print ($andmed["sugu"] == "Mees" ? "checked" : "");?> >Mees<br>
                <input value="Naine" type="radio" name="sugu" <?php print ($andmed["sugu"] == "Naine" ? "checked" : "");?> >Naine<br>
				<br>
                Telefon:<br>
				<input type="number" name="tel" value="<?php print $andmed["tel"]; ?>" maxlength="20" autocomplete="off" required><br>
                E-Mail:<br>
				<input type="email" name="epost" value="<?php print $andmed["epost"]; ?>" maxlength="100" autocomplete="off" required><br>
				<br>
				<textarea rows="5" cols="50" placeholder="Märkused " maxlength="200" name="markus" required><?php print $andmed["markus"]; ?></textarea><br>
				<br>
				Pilt:<br>
                <img src="<?php print $andmed['img']; ?>" height="150" width="150"><br><br>
                <input type="file" name="img" accept="image/*"><br>
				<br>
				<br>
                <input type="submit" value="Salvesta muudatused"><br>
			</fieldset>
			<p><a href="http://robert.vkhk.ee/~mihkel.kala/enda/k6ik.php">Loobu ja mine tagasi</a></p>
                Viimati muudetud: <?php print $andmed["aeg"]; ?><br>
				Loodud: <?php print $andmed["aeg2"]; ?><br>
         </form>
</body>
</html>
