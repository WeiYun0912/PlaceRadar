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
		if(isset($_GET['addr']) && isset($_GET['country'])) {
			if($_GET['country'] == "ko"){
				$data['addr'] =preg_replace('/\s(?=)/', '', $_GET['addr']);
			}else{
				$data['addr'] = str_replace('台','臺',preg_replace('/\s(?=)/', '', $_GET['addr']));
			}
			
			$data['country'] = $_GET['country'];
			//print_r($data);
			$this->load->view('home_view',$data);
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
