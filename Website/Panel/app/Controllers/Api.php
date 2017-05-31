<?php

namespace Controllers;

use Core\View;
use Core\Controller;

use Helpers\Session;

class Api extends Controller{

    public function __construct(){

        parent::__construct();

    }

    public function dataParser(){
        
        date_default_timezone_set('Europe/Paris');

        $currentUrl = explode("?", $_SERVER['REQUEST_URI']);
        $params = preg_replace("/json=/ ", "", $currentUrl[1]);
        $params = preg_replace("/%22/", '"', $params);

        $dataJson = json_decode($params, true);

        if($dataJson["autre"]["authentification"]=="AUTHKEY" && $_SERVER["REMOTE_ADDR"]=="127.0.0.1"){

            $pvData = new \Models\PVData();

            $postData = array(
                'id' => "",
                'type' => "tensionBatterie",
                'value' => $dataJson["batterie"]["tension"],
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
            );

            $pvData->sendData($postData);
            
            $postData = array(
                'id' => "",
                'type' => "courantBatterie",
                'value' => $dataJson["batterie"]["courant"],
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
            );

            $pvData->sendData($postData);

            $postData = array(
                'id' => "",
                'type' => "tensionPanneau",
                'value' => $dataJson["panneau"]["tension"],
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
            );

            $pvData->sendData($postData);

            $postData = array(
                'id' => "",
                'type' => "courantPanneau",
                'value' => $dataJson["panneau"]["courant"],
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
            );

            $pvData->sendData($postData);

            $postData = array(
                'id' => "",
                'type' => "puissancePanneau",
                'value' => $dataJson["panneau"]["puissance"],
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
            );

            $pvData->sendData($postData);

            $postData = array(
                'id' => "",
                'type' => "teleinfoBase",
                'value' => $dataJson["teleInfo"]["BASE"],
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
            );

            $pvData->sendData($postData);

            $postData = array(
                'id' => "",
                'type' => "teleinfoPAPP",
                'value' => $dataJson["teleInfo"]["PAPP"],
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
            );

            $pvData->sendData($postData);

            $postData = array(
                'id' => "",
                'type' => "teleinfoIINST",
                'value' => $dataJson["teleInfo"]["IINST"],
                'date' => date("Y-m-d"),
                'time' => date("H:i:s"),
            );

            $pvData->sendData($postData);

        }

    }

}

