<?php
	date_default_timezone_set('Europe/Tallinn');
	
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	
	function valmista($andmed) {
			$enimi = $andmed["enimi"];
			$pnimi = $andmed["pnimi"];
			$sugu = $andmed["sugu"];
			$tel = $andmed["tel"];
			$epost = $andmed["epost"];
			$fail = $andmed["pilt"];

			$asukoht = "./andmebaas";
			$kaustad = glob($asukoht . "/*", GLOB_ONLYDIR);
			if (count($kaustad) != 0) {
				$loendur = "";
				foreach ($kaustad as $kaust) {
					if (basename($kaust) > $loendur) {
						$loendur = basename($kaust);
					}
				}
				$isik = $loendur + 1;
			}
			else {
				$isik = 0;
			}

			$kaust = 'andmebaas/'.$isik;
			if ( !file_exists($kaust) ){
				$tee = umask(0);
				mkdir ($kaust, 0777, true);
				umask($tee);
			}

			$aeg = time();
			$aeg2 = time();

			$andmed = fopen($kaust.'/info.json','w');
			$info[] = array(
				"isik" => $isik,
				"enimi" => $enimi,
				"pnimi" => $pnimi,
				"sugu" => $sugu,
				"tel" => $tel,
				"epost" => $epost,
				"aeg" => $aeg,
				"aeg2" => $aeg2);

			move_uploaded_file($fail, $kaust.'/pilt.jpg');
			fwrite($andmed, json_encode($info));
			fclose($andmed);
		}
		
		function muuda($andmed) {
			$isik = $andmed["isik"];
			$enimi = $andmed["enimi"];
			$pnimi = $andmed["pnimi"];
			$sugu = $andmed["sugu"];
			$tel = $andmed["tel"];
			$epost = $andmed["epost"];
			$aeg = time();
			$fail = $andmed["pilt"];     
            
			$ajur = "./andmebaas/$isik/info.json";
			$tajur = file_get_contents($ajur);
			$ticktock = json_decode($tajur, true);
			$ticktock = $ticktock[0];
			$aeg2 = $ticktock["aeg2"];
			
			$asukoht = "./andmebaas/$isik";

			$andmed = fopen($asukoht.'/info.json','w');
			$info[] = array(
				"isik" => $isik,
				"enimi" => $enimi,
				"pnimi" => $pnimi,
				"sugu" => $sugu,
				"tel" => $tel,
				"epost" => $epost,
				"aeg" => $aeg,
				"aeg2" => $aeg2);

				move_uploaded_file($fail, $asukoht.'/pilt.jpg');
				fwrite($andmed, json_encode($info));
				fclose($andmed);
		}
		
		function vaata($isik) {
			$seif = "./andmebaas/$isik/info.json";
			$raha = file_get_contents($seif);
			$andmed = json_decode($raha, true);
			$andmed = $andmed[0];
			$andmed["aeg"] = strftime("%d/%m/%Y %H:%M", $andmed["aeg"]);
			$andmed["aeg2"] = strftime("%d/%m/%Y %H:%M", $andmed["aeg2"]);
			return $andmed;
		}
		
		function korraga() {
			$salvestatud = [];
			$i = 0;
    
			foreach (glob('./andmebaas/*', GLOB_ONLYDIR) as $andmebaas) {
				$isik = filter_var($andmebaas, FILTER_SANITIZE_NUMBER_INT);
				$salvestatud[$i] = vaata($isik);
				$i++;
			}
			return $salvestatud;
		}
		
		function kustuta($isik) {
			$asukoht = "./andmebaas/$isik";
			if (is_dir($asukoht)) {
				$failid = glob($asukoht . "/*");
				foreach ($failid as $fail) {
					unlink($fail);
				}
				rmdir($asukoht);
			}
		}
		
		
?>
