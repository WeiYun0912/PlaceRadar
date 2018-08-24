<?php 
class Api extends CI_Controller {

	public function __construct() {
		parent::__construct();
		header('Access-Control-Allow-Origin:*');
		$this->load->model("api_model","",TRUE);
	}


	/**** 
		傳入值：$_POST['addr','country']
			
			lifeindex : 生活安全指數
			accident : 交通事故指數
			estate : 近五年房價(季)
			age : 年齡
	****/

	public function addrSearch(){
		if(isset($_GET['addr'])){
			$get = $_GET['addr'];
			$country = "臺灣";
			mb_convert_encoding($get,"UTF-8");
			$city = mb_substr($get,2,1);
			$area = false;
			//臺灣
			if(!strcmp($city,"縣") || !strcmp($city,"市")){
				$city = mb_substr($get,0,3);
				$array = ["鄉","區","鎮","市"];
				for($i=0;$i<4;$i++){
					if(strstr(mb_substr($get,3),$array[$i])){
						$area = mb_substr(mb_substr($get,3),0,strpos($get,$array[$i])-3,"utf-8");
						break;
					}
				}
				// echo $city.$area;
			//日本
			}else if(!strcmp($city,"都")){
				$city = mb_substr($get,0,3);
				$array = ["市","村","区","町","域"];
				for($i=0;$i<5;$i++){
					if(strstr($get,$array[$i])){
						$area = mb_substr($get,3,strpos($get,$array[$i])-3,"utf-8");
						break;
					}
				}
				// echo $city.$area;
			//韓國	
			}else if(!strcmp(mb_substr($get,4,1),"시")){
				$city = mb_substr($get,0,5);
				$area = mb_substr($get,5,strpos($get,"구")-5);
				// echo $city.$area;
			}
			if($area){
				// echo $city.$area;
					
				//取得ID
				$areaId = $this->api_model->catch_api($city,$area);

				//跟areaData方法取資料
				$a = $this->areaData($areaId);
				
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
					'estate' => [
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

				// echo $traffic_max.'<br>';
				// echo $traffic_min;
				// echo $x.'<br>';
				// echo $crime_max.'<br>';
				// echo $crime_min;
			
			echo json_encode($returnArray);

			}else{
				echo '地址錯誤';
			}
		}else{
			echo "請正確使用API方式";
		}
		
	}

	// *** 
	// 	傳入值：$_POST['areaid']
				
	// 		crimeData : 犯罪數量
	// 		policeData : 警局數量
	// 		trafficData : 車禍數量
	// 		man : 男人數量
	// 		woman : 女人數量
	// ***


	public function areaData($areaId=null){
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

?>