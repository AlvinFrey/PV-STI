<?php

namespace Controllers;

use Core\Controller;

class Scripts extends Controller{

    public function __construct(){

        parent::__construct();

    }

    public function saveBatteryPercentage(){

        if($_SERVER["REMOTE_ADDR"]=="127.0.0.1"){

            $dataBDD = new \Models\PVData();
            $util = new \Helpers\Util();

            $batteryVoltage = $dataBDD->getLastDataByType("tensionBatterie");
            $batteryPercentage = preg_replace("/%/", "", $util->getBatteryPercentage($avgBatteryVoltage[0]["value"]));

            $postData = array(
                'id' => "",
                'type' => "pourcentageBatterie",
                'value' => $BatteryPercentage,
                'date' => date("Y-m-d"),
                'time' => date("H:i:s", strtotime('+1 hour')),
            );

            $dataBDD->sendData($postData);

        }

    }

    public function saveDailyBatteryPercentage(){

        if($_SERVER["REMOTE_ADDR"]=="127.0.0.1"){

        	$dataBDD = new \Models\PVData();
        	$util = new \Helpers\Util();

        	$avgBatteryVoltage = $dataBDD->getDailyAvgDataByType("tensionBatterie");
        	$avgDailyBatteryPercentage = preg_replace("/%/", "", $util->getBatteryPercentage($avgBatteryVoltage[0]["moyenne"]));

        	$postData = array(
                'id' => "",
                'type' => "pourcentageJournee",
                'value' => $avgDailyBatteryPercentage,
                'date' => date("Y-m-d"),
                'time' => date("H:i:s", strtotime('+1 hour')),
            );

            $dataBDD->sendData($postData);

        }

    }

    public function saveDailyConsumption(){

        if($_SERVER["REMOTE_ADDR"]=="127.0.0.1"){

        	$dataBDD = new \Models\PVData();
        	$util = new \Helpers\Util();

        	$postData = array(
                'id' => "",
                'type' => "consommationJournee",
                'value' => $util->computeDailyConsumption(date('Y-m-d')),
                'date' => date("Y-m-d"),
                'time' => date("H:i:s", strtotime('+1 hour')),
            );

            $dataBDD->sendData($postData);

        }

    }

    public function saveDailyProduction(){

        if($_SERVER["REMOTE_ADDR"]=="127.0.0.1"){

            $dataBDD = new \Models\PVData();
            $util = new \Helpers\Util();

            $sommePuissance = $dataBDD->getDailySumDataByType("puissancePanneau");

            $postData = array(
                'id' => "",
                'type' => "productionJournee",
                'value' => $sommePuissance[0]["somme"],
                'date' => date("Y-m-d"),
                'time' => date("H:i:s", strtotime('+1 hour')),
            );

            $dataBDD->sendData($postData);

        }

    }

    public function computeEfficiency(){

        /*
            -Récupérer ensoleillement
            -Faire produit en croix : 
                1.62688         RESULTAT ENSOLEILLEMENT SUR PANNEAU
                1               VALEUR ENSOLEILLEMENT
            -Faire ENSOLEILLEMENT PANNEAU DIVISÉ PAR PRODUCTION PANNEAU
        */

    }

}
