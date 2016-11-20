<?php

namespace Controllers;

use Core\View;
use Core\Controller;

class Consumption extends Controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $data['title'] = "Consommation";

        $dataBDD = new \Models\PVData();

        $data['javascript'] = array('HighchartsJS/highcharts', 'HighchartsJS/modules/exporting', 'AjaxControllers/Consumption/index', 'SweetAlert/sweetalert.min');

        $data['lastPAPP'] = $dataBDD->getLastDataByType("teleinfoPAPP");
        $data['lastIINST'] = $dataBDD->getLastDataByType("teleinfoIINST");

        View::renderTemplate('header', $data);
        View::render('consumption/index', $data);
        View::renderTemplate('footer', $data);

    }

    public function weeklyHomeConsumption(){

        $dataBDD = new \Models\PVData();

        echo json_encode($dataBDD->getAllByDateRowAndType("1", "week", "consommationJournee"));

    }

}
