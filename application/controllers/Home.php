<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		header('Access-Control-Allow-Origin:*');
		$this->load->model("api_model","",TRUE);
		$this->load->helper('url');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');

		$this->load->view('home_view');
	}

	public function single(){
		if(isset($_GET['addr'])){
			$get = $_GET['addr'];
			$str = str_replace('台','臺',$get);
			$country = "臺灣";
			$result = $this->api_model->get_CountryArea();
			$areaId = false;

			foreach ($result as $row) {
				if(strpos($str,$row->city.$row->area)!==false){
					$areaId = $row->id;
					break;
				}
			}
			
			if($areaId){
				//跟areaData方法取資料
				$a = $this->Home_areaData($areaId);
				
				//年齡資料
				$Data = $this->api_model->get_otherAreaData($areaId);



				//區域人口數
				$total =$a[0]['man']+$a[0]['woman'];

				//犯罪人口數
				$crime_cnt = $a[0]['crimeData'];

				//生活公式
				$x = $crime_cnt/$total; //x = 犯罪數量/人口總數
				$x = number_format($x,4);

				//犯罪最大值
				$crime_max = $this->api_model->get_crimeMax($country);

				//犯罪最小值
				$crime_min = $this->api_model->get_crimeMin($country);

				//交通車禍發生次數
				$traffic_cnt = $a[0]['trafficData'];

				//交通公式
				$y = $traffic_cnt/$total; // y = 車禍數量/人口總數
				$y = number_format($y,4);

				//交通車禍最大值
				$traffic_max = $this->api_model->get_trafficMax($country);

				//交通車禍最小值
				$traffic_min = $this->api_model->get_trafficMin($country);


				$returnArray = array(
					[
						'lifeindex' => number_format(100-((($x-$crime_min)/($crime_max-$crime_min))*100),0), // (0.1-(3368/386144))*1000 
						'accident' => number_format(100-((($y-$traffic_min)/($traffic_max-$traffic_min))*100),0),//(0.1-(1398/386144)+(12/386144*10))*1000
						'estate' => 
						[
							$Data[1],
							$Data[2],
							$Data[3],
							$Data[4],
							$Data[5]
						],
						'age' => $Data[0],
						'areaid' => $areaId,
					]
				);

				
				$returnArray2 = array(
					[
						'crimeData' => $a[0]['crimeData'],
						'policeData' => $a[0]['policeData'],
						'trafficData' => $a[0]['trafficData'],
						'0to14' => $a[0]['0to14'],
						'15to64' => $a[0]['15to64'],
						'65up' => $a[0]['65up'],
						'unknow_age' => $a[0]['unknow_age']
					]
				);

				$array['data'] = array_merge($returnArray,$returnArray2);
				$this->load->view('home_view',$array);
			}else{
				echo "444";
			}
		}else{
			echo "444";
		}
		
	}


	public function Home_areaData($areaId=null){
		// $areaId= "13";
		if(isset($_GET['areaId']) && $_GET['areaId']){
			$returnArray = $this->api_model->get_AreaData($_GET['areaId']);
			echo json_encode($returnArray);
		}else if($areaId){
			$returnArray = $this->api_model->get_AreaData($areaId);
			return $returnArray;
		}else{
			echo "請使用正確API方式";
		}
	}

	
}
