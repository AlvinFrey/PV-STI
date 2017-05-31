<?php

namespace Controllers;

use Core\View;
use Core\Controller;

class Battery extends Controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $data['title'] = "Batteries";

        $dataBDD = new \Models\PVData();
        $util = new \Helpers\Util();

        $data['javascript'] = array('HighchartsJS/highcharts', 'HighchartsJS/modules/exporting', 'AjaxControllers/Battery/battery', 'SweetAlert/sweetalert.min');

        $data['lastBatteryVoltage'] = $dataBDD->getLastDataByType("tensionBatterie");
        $data['lastBatteryPercentage'] = $util->getBatteryPercentage($data["lastBatteryVoltage"][0]["value"]);

        View::renderTemplate('header', $data);
        View::render('battery/index', $data);
        View::renderTemplate('footer', $data);

    }

    public function weeklyBatteryPercentage(){

        $dataBDD = new \Models\PVData();
        
        echo json_encode($dataBDD->getAllByDateRowAndType("1", "week", "pourcentageJournee"));

    }

}
