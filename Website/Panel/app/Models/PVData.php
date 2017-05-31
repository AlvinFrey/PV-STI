<?php
	namespace Models;

	use Helpers\Database;

	class PVData{

		protected $db;
		public function __construct(){
			$this->db = Database::get();
		}
		
		public function sendData($postData){
			$this->db->insert("datapv", $postData);
		}

		public function getLastDataByType($type){
			return $this->db->select('SELECT `value`, `date`, `time` FROM datapv WHERE `type`="'.$type.'" ORDER BY `time` DESC LIMIT 1');
		}

		public function getDataByType($type){
			return $this->db->select('SELECT `value`, `date`, `time` FROM datapv WHERE `type`="'.$type.'" ORDER BY `time` DESC');
		}

		public function getDataByTypeAndDate($type, $date, $sort){
			return $this->db->select('SELECT `value`, `time` FROM datapv WHERE `type`="'.$type.'" AND `date`="'.$date.'" ORDER BY `time` '.$sort.'');
		}

		public function getDailyAvgDataByType($type){
			return $this->db->select('SELECT AVG(`value`) AS "moyenne" FROM datapv WHERE `type`="'.$type.'" AND `date`="'.date("Y-m-d").'"');
		}

		public function getDailySumDataByType($type){
			return $this->db->select('SELECT SUM(`value`) AS "somme" FROM datapv WHERE `type`="'.$type.'" AND `date`="'.date("Y-m-d").'"');
		}

		public function getAllByDateRowAndType($amount, $filterType, $type){
	        switch ($filterType) {
	            case 'day':
	                return $this->db->select("SELECT * FROM datapv WHERE `type`='.$type.' AND `date` BETWEEN '".date("Y-m-d",strtotime("-".$amount." day"))."' AND '".date("Y-m-d")."'");
	                break;
	            case 'week':
	                return $this->db->select("SELECT * FROM datapv WHERE `type`='".$type."' AND `date` BETWEEN '".date("Y-m-d",strtotime("-".$amount." week"))."' AND '".date("Y-m-d")."'");
	                break;
	            case 'month':
	                return $this->db->select("SELECT * FROM datapv WHERE `type`='.$type.' AND `date` BETWEEN '".date("Y-m-d",strtotime("-".$amount." month"))."' AND '".date("Y-m-d")."'");
	                break;
	            case 'year':
	                    
	                return $this->db->select("SELECT * FROM datapv WHERE `type`='.$type.' AND `date` BETWEEN '".date("Y-m-d",strtotime("-".$amount." year"))."' AND '".date("Y-m-d")."'");
	                break;
	            case 'yesterday':
	                return $this->db->select("SELECT * FROM datapv WHERE `type`='.$type.' AND `date` BETWEEN '".date("Y-m-d",strtotime("-1 day"))."' AND '".date("Y-m-d")."'");
	                break;
	        }
    	}

	    public function getAllByTypeAndMonth($type, $month, $year, $display){
	        
	        if($type!="all"){
	            if($display=="graph"){
	                return $this->db->select('SELECT `date`,AVG(`value`) as moyenne FROM datapv WHERE `type`="'.$type.'" AND MONTH(`date`)="'.$month.'" AND YEAR(`date`)="'.$year.'" GROUP BY `date`');
	            }else{
	                return $this->db->select('SELECT * FROM datapv WHERE `type`="'.$type.'" AND MONTH(`date`)="'.$month.'" AND YEAR(`date`)="'.$year.'"');
	            }
	        }else{
	            return $this->db->select('SELECT * FROM datapv WHERE MONTH(`date`)="'.$month.'" AND YEAR(`date`)="'.$year.'"');
	        }
	    }

    	public function getAllByTypeAndYear($type, $year, $display){
        	if($type!="all"){
            	if($display=="graph"){
                	return $this->db->select('SELECT `date`,AVG(`value`) as moyenne FROM datapv WHERE `type`="'.$type.'" AND YEAR(`date`)="'.$year.'" GROUP BY `date`');
            	}else{
                	return $this->db->select('SELECT * FROM datapv WHERE `type`="'.$type.'" AND YEAR(`date`)="'.$year.'"'); 
            	}
       		}else{
            	return $this->db->select('SELECT * FROM datapv WHERE YEAR(`date`)="'.$year.'"');
        	}
    	}

    }

?>