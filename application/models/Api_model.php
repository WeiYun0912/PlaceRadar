<?php 

class Api_model extends CI_Model{
	
	public function catch_api($city,$area){
		// $array = Array();

		$result = $this->db->get_where('country_area', array('city' => $city,'area' => $area));
		if ($result->num_rows() > 0){
			foreach ($result->result() as $row){
				$id = $row->id;
				return $id;
			}
		}
	}

	public function get_AreaData($areaId){
		$this->db->select("crime.crime_cnt,".
			"police_station.station_cnt,".
			"population_density.t_men,".
			"population_density.t_women,".
			"traffic_accident.accident_cnt"
			,false);
		$this->db->from("country_area");
		$this->db->where("country_area.id = ", $areaId,false);
		$this->db->join("crime","country_area.id = crime.id");
		$this->db->join("police_station","country_area.id = police_station.id");
		$this->db->join("population_density","country_area.id = population_density.id");
		$this->db->join("traffic_accident","country_area.id = traffic_accident.id");
		$result = $this->db->get()->result();

		foreach ($result as $key => $row) {
			$array[] = array
			(
				'crimeData' => $row->{"crime_cnt"},
				'policeData' => $row->{"station_cnt"},
				'trafficData' => $row->{"accident_cnt"},
				'man' => $row->{"t_men"},
				'woman' => $row->{"t_women"},
			);
		}
		return $array;
	}

	public function get_otherAreaData($areaId){
		$this->db->select("0to14,".
			"15to64,".
			"65up,".
			"unknow_age"
			,false);
		$this->db->from("population_density");
		$this->db->where("id = ", $areaId,false);
		$result = $this->db->get()->result();
		foreach ($result as $key => $row) {
			$str[0] = $row->{"0to14"}.",".$row->{"15to64"}.",".$row->{"65up"}.",".$row->{"unknow_age"};
		}

		$this->db->select("season_one,".
			"season_two,".
			"season_three,".
			"season_four"
			,false);
		$this->db->from("real_estate");
		$this->db->where("id = ", $areaId,false);
		$result = $this->db->get()->result();
		$i=1;
		foreach ($result as $key => $row) {
			$str[$i] = $row->{"season_one"}.",".$row->{"season_two"}.",".$row->{"season_three"}.",".$row->{"season_four"};
			$i++;
		}
		return $str;
	}

	public function get_crimeMax($country){
		$country = '"'.$country.'"';
		$this->db->select("max(crime_cnt/(population_density.t_men+population_density.t_women)) as total",false);

		$this->db->join("population_density","population_density.id = crime.id");
		$this->db->join("country_area","country_area.id = crime.id");
		$this->db->where("country_area.country = ",$country,false);
		$result = $this->db->get("crime");
		if($result->num_rows()==1){
			return $result->row(0)->total;
		}else{
			return false;
		}

	}

	public function get_crimeMin($country){
		$country = '"'.$country.'"';
		$this->db->select("min(crime_cnt/(population_density.t_men+population_density.t_women)) as total",false);
		$this->db->join("population_density","population_density.id = crime.id");
		$this->db->join("country_area","country_area.id = crime.id");
		$this->db->where("country_area.country = ",$country,false);
		$result = $this->db->get("crime");
		if($result->num_rows()==1){
			return $result->row(0)->total;
		}else{
			return false;
		}

	}

	public function get_trafficMax($country){
		$country = '"'.$country.'"';
		$this->db->select("max(accident_cnt/(population_density.t_men+population_density.t_women)) as total",false);
		$this->db->join("population_density","population_density.id = traffic_accident.id");
		$this->db->join("country_area","country_area.id = traffic_accident.id");
		$this->db->where("country_area.country = ",$country,false);
		$result = $this->db->get("traffic_accident");
		if($result->num_rows()==1){
			return $result->row(0)->total;
		}else{
			return false;
		}

	}

	public function get_trafficMin($country){
		$country = '"'.$country.'"';
		$this->db->select("min(accident_cnt/(population_density.t_men+population_density.t_women)) as total",false);

		$this->db->join("population_density","population_density.id = traffic_accident.id");
		$this->db->join("country_area","country_area.id = traffic_accident.id");
		$this->db->where("country_area.country = ",$country,false);
		$result = $this->db->get("traffic_accident");
		if($result->num_rows()==1){
			return $result->row(0)->total;
		}else{
			return false;
		}

	}


}

?>
