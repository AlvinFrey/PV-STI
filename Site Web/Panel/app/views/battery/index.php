
<h4>Batteries : </h4>

<br/>

 <ul class="collection">
      <li class="collection-item">Tension actuelle des batteries : <b><?php echo $data['lastBatteryVoltage'][0]['value'] . "V"; ?></b></li>
      <li class="collection-item">Pourcentage actuel des batteries : <b><?php echo $data['lastBatteryPercentage']; ?></b></li>
 </ul>

<br/>

<div id="chartsContainer" style="width: 100%; height: 370px;"></div>
