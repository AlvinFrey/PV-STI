<?php

namespace Controllers;

use Core\View;
use Core\Controller;

class Photovoltaic extends Controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $data['title'] = "Photovoltaïque";

        $cache = new \Helpers\SimpleCache();
        $dataBDD = new \Models\PVData();

        date_default_timezone_set('Europe/Paris');

        $solarRadiationAPI = json_decode($cache->get_data('meteoblueSolaire', 'http://my.meteoblue.com/packages/solar-1h?apikey=APIKEY&lat=LAT&lon=LONG&asl=279&tz=Europe%2FParis&city=Ingersheim'), TRUE);
        $dateIndex = array_search(date('Y-m-d H:00'), $solarRadiationAPI["data_1h"]["time"]);

        $data['javascript'] = array('HighchartsJS/highcharts', 'HighchartsJS/modules/exporting', 'AjaxControllers/Photovoltaic/photovoltaic', 'SweetAlert/sweetalert.min');

        $data['lastPhotovoltaicPower'] = $dataBDD->getLastDataByType("puissancePanneau");
        $data['solarIrradiance'] = $solarRadiationAPI["data_1h"]["gni_instant"][$dateIndex];

        View::renderTemplate('header', $data);
        View::render('photovoltaic/index', $data);
        View::renderTemplate('footer', $data);

    }

    public function weeklyHomeConsumption(){

        $dataBDD = new \Models\PVData();

        echo json_encode($dataBDD->getAllByDateRowAndType("1", "week", "consommationJournee"));

    }

    public function weeklyPhotovoltaicProduction(){

        $dataBDD = new \Models\PVData();

        echo json_encode($dataBDD->getAllByDateRowAndType("1", "week", "productionJournee"));

    }

}
