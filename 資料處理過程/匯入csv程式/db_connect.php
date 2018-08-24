<?php
set_time_limit(0);
$link = mysqli_connect('localhost','root','','opendata');
mysqli_query($link,"SET NAMES utf8;");
mysqli_query($link,"SET CHARACTER_SET_CLIENT=utf8;");
mysqli_query($link,"SET CHARACTER_SET_RESULTS=utf8;");

if(!$link){
	die("no");
}
else{
	echo "yes1"."</br>";
}

$select = mysqli_select_db($link,"opendata");

// $sql="SELECT `id`,`city`, `area` , FROM  `country_area`";




if(!$select){
	die("no");
}else{
	echo "yes2"."</br>";
}



if(($handle = fopen("106a1.csv", "r"))!=FALSE){

	

	while(($data = fgetcsv($handle,1000,","))!=FALSE){
		// $mb1 = mb_convert_encoding($data[0],'UTF-8','BIG5');
		// $mb2 = mb_convert_encoding($data[1],'UTF-8','BIG5');

		// $mb1 =  mb_substr($data[0], 3);
		// $mb2 = mb_substr($data[0], 0,3);
				
		// echo $data[0];
		// echo $data[1];
		// echo $data[3];
		// echo $data[4];


		// mysqli_query($link,"INSERT INTO `test2` (`city`,`area`,`death`,`hurt`,`times`) 
		// 	VALUES ('$data[0]','$data[1]','$data[3]','$data[4]','1')");



		// $mb1 = mb_convert_encoding($data[0],'UTF-8','EUC_KR');	
		// $result=mysqli_query($link,"SELECT id FROM country_area WHERE city = '$data[0]' AND area = '$data[1]'");

		// for($i=1;$i<=mysqli_num_rows($result);$i++){
		// 	$rs=mysqli_fetch_row($result);
			
		// 	mysqli_query($link,"INSERT INTO `crime` (`id`,`crime_cnt`) 
		// 		VALUES ('$rs[0]','$data[2]')");

		// }

		// mysqli_query($link,"INSERT INTO `real_estate` (`id`,`area`,`year`,`season_one`,`season_two`,`season_three`,`season_four`) 
		// 	VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')");
		// mysqli_query($link,"INSERT INTO `police_station` (`id`,`multi_area`,`station_cnt`) 
		// 	VALUES ('$rs[0]','$data[2]','$data[3]')");

		// $mb1 = preg_replace('/\s(?=)/', '', $data[0]);

		// mysqli_query($link,"INSERT INTO `traffic_accident` (`id`,`accident_cnt`,`death`,`hurt`) 
		// 	VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')");

		// $mb2 = mb_convert_encoding($data[1],'UTF-8','BIG5');	



	 // mysqli_query($link,"INSERT INTO `population_density` (`area`, `density`,`t_men`,`t_women`,`0to14`,`15to64`,`65up`) 
		// 	VALUES ('$data[1]','$data[14]','$data[5]','$data[6]','$data[8]','$data[9]','$data[10]')");

		 // mysqli_query($link,"INSERT INTO `population` (`country`, `city`,`area`) 
			// VALUES ('韓國','$data[0]','$data[1]')");
		// mysqli_query($link,"INSERT INTO `test` (`test01`,`test`) 
		// 	VALUES ('$data[2]','$mb1')");
			// mysqli_query($link,"INSERT INTO `crime` (`area`,`id`,`crime_cnt`) 
			// VALUES ('$data[0]','$data[1]','$data[2]')");

			// mysqli_query($link,"INSERT INTO `real_estate` (`area`,`id`,`year`,`season_one`,`season_two`,`season_three`,`season_four`) 
			// VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')");

		// mysqli_query($link,"INSERT INTO `police_station` (`multi_area`,`id`,`station_cnt`) 
		// 	VALUES ('$data[0]','$data[2]','$data[1]')");
		 //  mysqli_query($link,"INSERT INTO `population` (`country`, `city`,`area`) 
			// VALUES ('日本','東京都','$data[0]')");

		 //  mysqli_query($link,"INSERT INTO `population` (`country`, `city`,`area`) 
			// VALUES ('台灣','$mb1','$mb2')");

		 //  mysqli_query($link,"INSERT INTO `population_density` (`area`, `density`,`t_men`,`t_women`,`0to14`,`15to64`,`65up`) 
			// VALUES ('$mb1','$data[6]','$data[4]','$data[5]','$data[1]','$data[2]','$data[3]')");


	}

	fclose($handle);
}


mysqli_close($link);

?>

