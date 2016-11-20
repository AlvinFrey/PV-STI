
<h4>Consommation : </h4>

<br/>

 <ul class="collection">
      <li class="collection-item">Puissance Instantanée : <b><?php if($data['lastPAPP'][0]['value']==""){ echo "?"; }else{ echo $data['lastPAPP'][0]['value'] . "W"; } ?></b></li>
      <li class="collection-item">Intensité Instantanée : <b><?php if($data["lastIINST"][0]['value']==""){ echo "?"; }else{ echo $data["lastIINST"][0]['value'] . "A"; } ?>/7A</b></li>
 </ul>

<br/>

<div id="chartsContainer" style="width: 100%; height: 370px;"></div>
