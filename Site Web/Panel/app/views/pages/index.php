<?php echo date('Y-m-d'); date_default_timezone_set('Europe/Paris'); ?>

<center><p>Nous sommes le <b><?php echo date('d/m/Y'); ?></b> et il est <b id="heure"></b>.</p><p>Les dernières données datent du <b><?php echo date("d/m/Y", strtotime($data["lastDate"])); ?></b> à <b><?php echo $data["lastTime"]; ?></b>.</p></center>

<?php 

	$util = new \Helpers\Util();
	use Helpers\Url;

	$vigilanceIndex = $data["vigilance"]->xpath('DV[@dep="68"]');
	$vigilanceCouleur = $vigilanceIndex[0]->attributes()->coul;

	if(isset($vigilanceIndex[0]->risque)){

		$vigilanceRisqueNum = $vigilanceIndex[0]->risque[0]->attributes()->val;

		switch ($vigilanceRisqueNum) {
			case '1':
				$vigilanceRisque = "(Vents Violents)";
				break;
			case '2':
				$vigilanceRisque = "(Pluie-Inondation)";
				break;
			case '3':
				$vigilanceRisque = "(Orages)";
				break;
			case '4':
				$vigilanceRisque = "(Inondation)";
				break;
			case '5':
				$vigilanceRisque = "(Neige-Verglas)";
				break;
			case '6':
				$vigilanceRisque = "(Canicule)";
				break;
			case '7':
				$vigilanceRisque = "(Grand-Froid)";
				break;
			case '8':
				$vigilanceRisque = "(Avalanches)";
				break;
			case '9':
				$vigilanceRisque = "(Vagues Hautes)";
				break;
			default:
				#On fait rien frère :D
				break;
		}

		switch ($vigilanceCouleur) {
			case '2':
				echo '<div class="alert alert-warning z-depth-1" role="alert" id="toknow_alert"><strong>Vigilance Jaune '.$vigilanceRisque.' : </strong> Soyez prudent, vérifiez que votre installation photovoltaïque ne court aucun risque on ne sait jamais !</div>';
				break;
			case '3':
				echo '<div class="alert alert-medium z-depth-1" role="alert" id="toknow_alert"><strong>Vigilance Orange '.$vigilanceRisque.' : </strong> Il faut être très vigilant, des phénomènes météo dangereux sont prévus vérifiez bien que l\'installation ne risque rien</div>';
				break;
			case '4':
				echo '<div class="alert alert-danger z-depth-1" role="alert" id="toknow_alert"><strong>Vigilance Rouge '.$vigilanceRisque.' : </strong> Soyez sur le qui-vive ! Des phénomènes dangereux de très forte intensité sont prévues faites bien attention à votre installation photovoltaïque</div>';
				break;
			default:
				#On ne fais rien :D
				break;
		}

	}

?>

<ul class="collection with-header">
    <li class="collection-header"><img class="collection-icon" src="https://cdn0.iconfinder.com/data/icons/kameleon-free-pack-rounded/110/Battery-Charging-64.png"</img><h4 class="collection-title">Batteries</h4></li>
    <li class="collection-item">Tension : <b><?php if($data["lastTensionBatterie"]==""){ echo "?";}else{echo $data["lastTensionBatterie"] . "V";} ?></b></li>
    <li class="collection-item">Courant : <b><?php if($data["lastCourantBatterie"]==""){ echo "?";}else{echo $data["lastCourantBatterie"] . "A";} ?></b></li>
    <li class="collection-item">Pourcentage : <b><?php if($data["lastCourantBatterie"]==""){ echo "?"; }else{ echo $util->getBatteryPercentage($data["lastTensionBatterie"]); } ?></b></li>
</ul>

<ul class="collection with-header">
    <li class="collection-header"><img class="collection-icon" src="https://cdn3.iconfinder.com/data/icons/10con/512/space_rocket_startup_boost-64.png"</img><h4 class="collection-title">Production</h4></li>
    <li class="collection-item">Tension : <b><?php if($data["lastTensionPanneau"]==""){ echo "?"; }else{ echo $data["lastTensionPanneau"] . "V"; } ?></b></li>
    <li class="collection-item">Courant : <b><?php if($data["lastCourantPanneau"]==""){ echo "?"; }else{ echo $data["lastCourantPanneau"] . "A"; } ?></b></li>
    <li class="collection-item">Puissance : <b><?php if($data["lastPuissancePanneau"]==""){ echo "?"; }else{ echo $data["lastPuissancePanneau"] . "W"; } ?></b></li>		
</ul>

<ul class="collection with-header">
    <li class="collection-header"><img class="collection-icon" src="https://cdn3.iconfinder.com/data/icons/luchesa-vol-9/128/Home-64.png"</img><h4 class="collection-title">Conso</h4></li>
    <li class="collection-item">Puissance Instantanée : <b><?php if($data["lastPAPP"]==""){ echo "?"; }else{ echo $data["lastPAPP"] . "W"; } ?></b></li>
    <li class="collection-item">Puissance consommée sur la journée : <b><?php if($util->computeDailyConsumption(date('Y-m-d'))==""){ echo "?"; }else { echo $util->computeDailyConsumption(date('Y-m-d')) . 'Wh';} ?></b></li>
    <li class="collection-item">Intensité Instantanée : <b><?php if($data["lastIINST"]==""){ echo "?"; }else{ echo $data["lastIINST"] . "A" . " / 7A"; } ?></b></li>
</ul>

<ul class="collection with-header">
    <li class="collection-header"><img class="collection-icon" src="https://cdn3.iconfinder.com/data/icons/luchesa-vol-9/128/Weather-64.png"</img><h4 class="collection-title">Soleil</h4></li>
    <li class="collection-item">Irradiation solaire : <b><?php echo $data['solarIrradiance'] . "W/m²" ?></b></li>
    <li class="collection-item">Lever du Soleil : <b><?php echo $data["sunriseHour"]; ?></b></li>
    <li class="collection-item">Coucher du Soleil : <b><?php echo $data["sunsetHour"]; ?></b></li>
    <li class="collection-item">Durée du Jour : <b><?php echo $data["dayLength"]; ?></b></li>
</ul>

<ul class="collection with-header">
    <li class="collection-header"><img class="collection-icon" src="https://cdn3.iconfinder.com/data/icons/ballicons-reloaded-free/512/icon-59-64.png"</img><h4 class="collection-title">Météo</h4></li>
    <li class="collection-item">Température : <b><?php echo $data["currentTemp"]; ?></b></li>
    <li class="collection-item">Humidité : <b><?php echo $data["currentHumidity"]; ?></b></li>
    <li class="collection-item">Conditions Actuelles : <b><?php echo $data["currentCondition"]; ?></b></li>
    <li class="collection-header"><img class="collection-icon" src="https://cdn3.iconfinder.com/data/icons/ballicons-reloaded-free/512/icon-59-64.png"</img><h4 class="collection-title">Prévisions</h4></li>
    <li class="collection-item"><?php echo $data["forecastDay1"] ?> : <b><?php echo $data["forecastDay1Condition"] ?></b></li>
    <li class="collection-item"><?php echo $data["forecastDay2"] ?> : <b><?php echo $data["forecastDay2Condition"] ?></b></li>
    <li class="collection-item"><?php echo $data["forecastDay3"] ?> : <b><?php echo $data["forecastDay3Condition"] ?></b></li>
</ul>
            