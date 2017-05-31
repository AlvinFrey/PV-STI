<?php

namespace Controllers;

use Core\View;
use Core\Controller;

class Historic extends Controller{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $data['title'] = "Historique";

        $data['javascript'] = array('AjaxControllers/Historic/historic', 'SweetAlert/sweetalert.min');

        View::renderTemplate('header', $data);
        View::render('historic/index', $data);
        View::renderTemplate('footer', $data);

    }

    public function searchSend(){
        
        $dataBDD = new \Models\PVData();

        if(isset($_POST["day"]) && isset($_POST["month"]) && isset($_POST["year"]) && isset($_POST["type"])){
            
            $day = htmlspecialchars(filter_input(INPUT_POST, 'day', FILTER_SANITIZE_NUMBER_INT));
            $month =  htmlspecialchars(filter_input(INPUT_POST, 'month', FILTER_SANITIZE_NUMBER_INT));
            $year =  htmlspecialchars(filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT));
            $type = htmlspecialchars(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING));
            $date = $year . "-" . $month . "-" . $day;
            
            $data["response"] = $dataBDD->getDataByTypeAndDate($type, $date, "");
            echo json_encode($data["response"]);
        
        }else if(isset($_POST["month"]) && isset($_POST["year"]) && isset($_POST["type"])){
            
            $month =  htmlspecialchars(filter_input(INPUT_POST, 'month', FILTER_SANITIZE_NUMBER_INT));
            $year =  htmlspecialchars(filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT));
            $type = htmlspecialchars(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING));
            
            $data["response"] = $dataBDD->getAllByTypeAndMonth($type, $month, $year, "text");
            echo json_encode($data["response"]);
        
        }else if(isset($_POST["year"]) && isset($_POST["type"])){
            
            $year =  htmlspecialchars(filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT));
            $type = htmlspecialchars(filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING));
            
            $data["response"] = $dataBDD->getAllByTypeAndYear($type, $year, "text");
            echo json_encode($data["response"]);
        
        }
    }

}
