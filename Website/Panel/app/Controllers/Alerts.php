<?php

namespace Controllers;

use Core\View;
use Core\Controller;

use Helpers\Session;

class Alerts extends Controller{

    public function __construct(){

        parent::__construct();

    }

    public function problemFinder(){

        if($_SERVER['REMOTE_ADDR']=="127.0.0.1"){

            $util = new \Helpers\Util();
            $cache = new \Helpers\SimpleCache();
            $dataBDD = new \Models\PVData();

            $lastBatteryPercentage = $dataBDD->getLastDataByType("pourcentageBatterie");
            $dailyProduction = $dataBDD->getLastDataByType("productionJournee");
            $dailyConsumption = $dataBDD->getLastDataByType("consommationJournee");
            $weather = json_decode($cache->get_data('meteo', 'http://www.prevision-meteo.ch/services/json/CITY0'), TRUE);
            $dailyWeather = $weather["fcst_day_0"]["condition"];

            if($lastBatteryPercentage[0]["value"]<="25"){

                $util->sendSMSAlert("[===Alerte PV@STI===] \r\n \r\n Attention, le pourcentage de batterie est inférieur à 25% il est préférable d'éviter de trop grosses consommations et de laisser les panneaux produire.");

            }

            if($dailyConsumption>$dailyProduction){

                $util->sendSMSAlert("[===Alerte PV@STI===] \r\n \r\n Attention, vous consommez plus que ce que vous ne produisez. \r\n \r\n Il est donc préférable de baisser l'utilisation de certains appareils éléctriques car vous n'utilisez plus que les batteries.");

            }

            if($dailyWeather=="Faibles passages nuageux"){

                $util->sendSMSAlert("[===Alerte PV@STI===] \r\n \r\n Certains passages nuageux sont prévus dans la journée, cela peut impacter sur votre production photovoltaïque.");

            }else if($dailyWeather=="Faiblement nuageux"){

                $util->sendSMSAlert("[===Alerte PV@STI===] \r\n \r\n Il y a une petite couche nuageuse dans les environs, cela peut impacter sur votre production photovoltaïque. \r\n \r\n Il est donc préférable de la surveiller de près et adapter sa consommation.");

            }else if($dailyWeather=="Fortement nuageux"){

                if($lastBatteryPercentage[0]["value"]<="35"){

                     $util->sendSMSAlert("[===Alerte PV@STI===] \r\n \r\n Attention, cette journée s'annonce très nuageuse, il est conseillé de baisser votre consommation éléctrique pour ne pas tomber en panne de courant, les panneaux ne produiront presque rien aujourd'hui. \r\n \r\n De plus le pourcentage de vos batteries est très très bas il vos donc couper tout les appareils qui peuvent beaucoup consommer (ordinateur, télévision, chauffage éléctrique)");

                }else{

                    $util->sendSMSAlert("[===Alerte PV@STI===] \r\n \r\n Cette journée s'annonce très nuageuse, il est conseillé de baisser votre consommation éléctrique pour ne pas tomber en panne de courant, les panneaux ne produiront presque rien aujourd'hui.");

                }

            }

        }

    }

}

