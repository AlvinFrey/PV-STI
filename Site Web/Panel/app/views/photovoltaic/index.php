
<h4>Production Photovoltaïque : </h4>

<br/>

 <ul class="collection">
      <li class="collection-item">Production actuelle des panneaux : <b><?php if($data["lastPhotovoltaicPower"][0]['value']==""){ echo "?"; }else{ echo $data["lastPhotovoltaicPower"][0]['value'] . "W"; } ?></b></li>
      <li class="collection-item">Irradiation Solaire : <b><?php echo $data['solarIrradiance']; ?>W/m²</b></li>
 </ul>

<br/>

<div id="chartsContainer" style="width: 100%; height: 370px;"></div>
