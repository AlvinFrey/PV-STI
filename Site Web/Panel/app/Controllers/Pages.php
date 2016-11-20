<?php

namespace Controllers;

use Core\View;
use Core\Controller;

class Pages extends Controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $data['title'] = "Accueil";

        $cache = new \Helpers\SimpleCache();
        $dataBDD = new \Models\PVData();

        $sunriseSunset = json_decode($cache->get_data('soleil', 'http://api.sunrise-sunset.org/json?lat=48.0833&lng=7.3667&date=today&formatted=1'), TRUE);
        $weather = json_decode($cache->get_data('meteo', 'http://www.prevision-meteo.ch/services/json/colmar'), TRUE);
        $solarRadiationAPI = json_decode($cache->get_data('meteoblueSolaire', 'http://my.meteoblue.com/packages/solar-1h?apikey=APIKEY&lat=48.089827&lon=7.296011&asl=279&tz=Europe%2FParis&city=Ingersheim'), TRUE);
        $dateIndex = array_search(date('Y-m-d H:00', strtotime('+1 hour')), $solarRadiationAPI["data_1h"]["time"]);

        $data["vigilance"] = simplexml_load_string($cache->get_data('vigilance', 'http://vigilance.meteofrance.com/data/NXFR33_LFPW_.xml'));
        $data['javascript'] = array('AjaxControllers/Index/index');

        $data["sunriseHour"] = strtotime($sunriseSunset["results"]["sunrise"]) + 3600;
        $data["sunriseHour"] = date('G\hi\ms\s', $data["sunriseHour"]);

        $data["sunsetHour"] = strtotime($sunriseSunset["results"]["sunset"]) + 3600;
        $data["sunsetHour"] = date('G\hi\ms\s', $data["sunsetHour"]);

        $data["dayLength"] = gmdate("G\hi\ms\s", strtotime($sunriseSunset["results"]["day_length"]));

        $data["currentCondition"] = $weather["current_condition"]["condition"];
        $data["currentTemp"] = $weather["current_condition"]["tmp"] . "°C";
        $data["currentHumidity"] = $weather["current_condition"]["humidity"] . "%";

        $data["forecastDay1"] = $weather["fcst_day_1"]["day_long"];
        $data["forecastDay1Condition"] = $weather["fcst_day_1"]["condition"];

        $data["forecastDay2"] = $weather["fcst_day_2"]["day_long"];
        $data["forecastDay2Condition"] = $weather["fcst_day_2"]["condition"];

        $data["forecastDay3"] = $weather["fcst_day_3"]["day_long"];
        $data["forecastDay3Condition"] = $weather["fcst_day_3"]["condition"];

        $data["lastTensionBatterie"] = $dataBDD->getLastDataByType("tensionBatterie");
        $data["lastDate"] = $data["lastTensionBatterie"][0]["date"];
        $data["lastTime"] = $data["lastTensionBatterie"][0]["time"];
        $data["lastTensionBatterie"] = $data["lastTensionBatterie"][0]["value"];

        $data["lastCourantBatterie"] = $dataBDD->getLastDataByType("courantBatterie");
        $data["lastCourantBatterie"] = $data["lastCourantBatterie"][0]["value"];

        $data["lastTensionPanneau"] = $dataBDD->getLastDataByType("tensionPanneau");
        $data["lastTensionPanneau"] = $data["lastTensionPanneau"][0]["value"];

        $data["lastCourantPanneau"] = $dataBDD->getLastDataByType("courantPanneau");
        $data["lastCourantPanneau"] = $data["lastCourantPanneau"][0]["value"];

        $data["lastPuissancePanneau"] = $dataBDD->getLastDataByType("puissancePanneau");
        $data["lastPuissancePanneau"] = $data["lastPuissancePanneau"][0]["value"];

        $data["lastPAPP"] = $dataBDD->getLastDataByType("teleinfoPAPP");
        $data["lastPAPP"] = $data["lastPAPP"][0]["value"];

        $data["lastIINST"] = $dataBDD->getLastDataByType("teleinfoIINST");
        $data["lastIINST"] = $data["lastIINST"][0]["value"];

        $data["lastIMAX"] = $dataBDD->getLastDataByType("teleinfoIMAX");
        $data["lastIMAX"] = $data["lastIMAX"][0]["value"];

        $data['solarIrradiance'] = $solarRadiationAPI["data_1h"]["gni_instant"][$dateIndex];

        View::renderTemplate('header', $data);
        View::render('pages/index', $data);
        View::renderTemplate('footer', $data);

    }

}
