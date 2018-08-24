<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Theme Region">
	<meta name="description" content="">

	<title></title>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url('kit/css/bootstrap.min.css')?>" >
	<link rel="stylesheet" href="<?php echo base_url('kit/css/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('kit/css/icofont.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('kit/css/owl.carousel.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('kit/css/slidr.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('kit/css/main.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('kit/css/responsive.css')?>">

	<!-- font -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Template Developed By ThemeRegion -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script> -->
  <style>
	  .map {
	  	width: 100%;
	  	height: 720px;
	  }
	  .fa-close{
	  	font-size:24px;
	  	position: absolute;
	  	top: 5px;
	  	right: 15px;
		border-radius: 5px;
	  	border:0px;
	  }
	  .divborder{
	  	min-height: 0px;
	  	border-radius: 5px;
	  	border-style:solid;
	  	border-width: 3px;
	  	overflow: hidden;
	  	margin-top: 5px;
	  	text-align: center;
	  }
	  canvas{
		margin-top: 30px;
		margin-bottom: 30px;
	  }
	</style>

</head>
<body>
	<!-- world-gmap -->
	<section id="main" class="clearfix home-two">
		<!-- gmap -->
		<div id="map" class="map"></div>

		<div class="container">
			<div class="row">
				<!-- banner -->
				<div class="col-sm-12">
					<div class="banner">
						<!-- banner-form -->
						<div class="banner-form banner-form-full">
							<form onsubmit="return false;">
								<!-- category-change -->
								<div class="dropdown category-dropdown">
									<a data-toggle="dropdown" href="#"><span class="change-text">Select Country</span> <i class="fa fa-angle-down"></i></a>
									<ul class="dropdown-menu category-change">
										<li><a id="taiwan" value="taiwan" class="dropdown-item" href="#">Taiwan</a></li>
										<li><a id="japan" value="japan" class="dropdown-item" href="#">Japan Tokyo</a></li>
										<li><a id="korea" value="korea" class="dropdown-item" href="#">Korea Seoul</a></li>
									</ul>
								</div><!-- category-change -->

								<input id="address" type="text" class="form-control" placeholder="Type Your key word">

								<button class="form-control" onclick="search()">Search</button>
							</form>
						</div><!-- banner-form -->
					</div>
				</div><!-- banner -->
			</div><!-- row -->

		</div><!-- container -->
		
	</section><!-- world-gmap -->

	<!--數據顯示-->
	<div id="data" class="" style=" min-height:0px; padding: 10px; overflow:hidden;">
		<!-- <div id="DataChild" class="col-lg-3 col-md-4 col-sm-6">
			<div style="height: 680px; background: #FDE4E4; border-radius: 5px;margin: 5px 0px 5px 0px;">
				<button class="fa fa-close "></button>
			</div>
		</div>
		<div id="DataChild" class="col-lg-3 col-md-4 col-sm-6">
			<div style="height: 680px; background: #DDDFFD; border-radius: 5px;margin: 5px 0px 5px 0px;" >
				<button class="fa fa-close "></button>
			</div>
		</div>
		<div id="DataChild" class="col-lg-3 col-md-4 col-sm-6">
			<div style="height: 680px; background: #DDFDDE; border-radius: 5px;margin: 5px 0px 5px 0px;" >
				<button class="fa fa-close "></button>
			</div>
		</div>
		-->
	</div>

	<!-- footer -->
	<footer id="footer" class="clearfix">
		<div class="footer-bottom clearfix text-center">
			<div class="container">
				<p>Copyright &copy; 2016. Developed by <a href="http://www.bootstrapmb.com/">ThemeRegion</a></p>
			</div>
		</div><!-- footer-bottom -->
	</footer><!-- footer -->


	<script src="<?php echo base_url('kit/js/jquery.min.js')?>"></script>
	<script src="<?php echo base_url('kit/js/jquery.tinyMap_edit.js')?>"></script>
	<script src="<?php echo base_url('kit/js/Chart.bundle.min.js')?>"></script>
	<script src="<?php echo base_url('kit/js/modernizr.min.js')?>"></script>
	<script src="<?php echo base_url('kit/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('kit/js/owl.carousel.min.js')?>"></script>
	<script src="<?php echo base_url('kit/js/smoothscroll.min.js')?>"></script>
	<script src="<?php echo base_url('kit/js/scrollup.min.js')?>"></script>
	<script src="<?php echo base_url('kit/js/price-range.js')?>"></script>
	<script src="<?php echo base_url('kit/js/custom.js')?>"></script>
	<!-- Map -->
	<script>
		var country='';
		var address,language,context,tcontext='台灣';
		var lat=0,lng=0;
		var foodScore=0,healthScore=0,vitalScore=0,lifeScore=0,trafficScore=0;
		var estate,estate2013,estate2014,estate2015,estate2016,estate2017,age;
		var judge=true;


		$.fn.tinyMapConfigure({
			'key': 'AIzaSyA5-u0mPsieWiTBHOmwsJW4sXy0HAyHwCw',
			// 載入的函式庫名稱，預設 null
			'libraries': 'places',
			'language':'zh-TW'
		});
		$('#map').tinyMap({
			'center': '東海',
			'zoom'  : 5,
			'markerFitBounds':true
		});
		$("#taiwan").click(function(){
			country='Taiwan';
			language='zh-TW';
			context='臺灣';
			console.log(country,language,context);
			$("#map").tinyMap('panTo',country);
			$("#map").tinyMap('modify',{zoom:8});
		})
		$("#japan").click(function(){
			country='Japan Tokyo';
			language='ja-JP';
			context='日本';
			console.log(country,language,context);
			$("#map").tinyMap('panTo',country);
			$("#map").tinyMap('modify',{zoom:10});
		})
		$("#korea").click(function(){
			country='Korea Seoul';
			language='ko';
			context='대한민국';
			console.log(country,language,context);
			$("#map").tinyMap('panTo',country);
			$("#map").tinyMap('modify',{zoom:10});
		})
		$(document).ready(function(){
			<?php 
				if(isset($country) && isset($addr)){
					if($country=='zh-TW'){
						echo "$('#taiwan').click();";
					}else if($country=='ja-JP'){
						echo "$('#japan').click();";
					}else if($country=='ko'){
						echo "$('#korea').click();";
					}
					echo "$('#address').val('".$addr."');";
					echo "setTimeout('search()',500);";
				}
			?>
		})
		
		function search(){
			console.log(country);
			if(country!=''){
				if(mark<3){
					$.ajax({
						url:'<?php echo base_url('api/getSearchJson')?>',
						type:"POST",
						data:{searchText:$("#address").val(),
							  country:language},
						dataType:"json",
						success:function(data){
							var intact_addr=data['results'][0]['formatted_address'];
							lat=data['results'][0]['geometry']['location']['lat'];
							lng=data['results'][0]['geometry']['location']['lng'];
							console.log(intact_addr,lat,lng,context);
							if(intact_addr.indexOf(context) > -1 || intact_addr.indexOf(tcontext) > -1){
			    				var LaL=lat+','+lng;
				    			if(compare(LaL)==true){
			    					getdata(intact_addr,lat,lng);
				    			}else{
				    				alert("Already have the same mark!");
				    			}
				    		}else{
				    			alert("This search location is not in "+country+"!");
				    		}
						}

					});

					// $("#map").tinyMap('query',$("#address").val(),function(addr){
					// 	lat=addr.geometry.location.lat(); // Latitude
					// 	lng=addr.geometry.location.lng(); // Longitude
					// 	console.log(lat,lng);
					// 	console.log(addr.formatted_address);
					// 	var intact_addr=(addr.formatted_address);				
					// 	if((addr.formatted_address).indexOf('台灣') > -1){
					// 		var LaL=lat+','+lng;
					// 		if(compare(LaL)==true){
					// 			getdata(intact_addr,lat,lng);
					// 		}else{
					// 			alert("Already have the same mark!");
					// 		}
					// 	}else{
					// 	alert("This search location is not in Taiwan!");
					// 	}
					// })
					function getdata(str,lat,lng){
						console.log(str,lat,lng);
						// if(context=='台灣'){
						// 	context='臺灣';
						// }
						$.ajax({
							url: "<?php echo base_url('api/addrSearch') ?>",
							type: "POST",
							data: {addr: str , country:context=="대한민국"?"韓國":context},
							dataType: "json",
							success: function (data) {
								if(data != 444){
									//接值
									console.log("test");
									console.log(data[0]);
									lifeScore=data[0]['lifeindex'];
								    trafficScore=data[0]['accident'];
						            estate=data[0]['estate'];
						            estate2013=estate[0].split(',');
						            estate2014=estate[1].split(',');
						            estate2015=estate[2].split(',');
						            estate2016=estate[3].split(',');
						            estate2017=estate[4].split(',');
						            age=data[0]['age'].split(',');
						            //前往標記
						            latlng[mark]=lat+','+lng;
				    				$("#map").tinyMap('panTo',[lat,lng]);
				    				$("#map").tinyMap('modify',{zoom:12});
				    				panToMarker(lat,lng);
						        }else{
						        	console.log("test");
				    				alert("Can't find data for this location.");
				    			}
					        }
					    })
					}
					function compare(LaL){//判斷是否有相同的點
						var check=true;
						for(var i=0;i<mark;i++){
							if(LaL == latlng[i]){
								check=false;
							}
						}
						return check;
					}
					function panToMarker(sLet,sLng){
						var searchNum=0;
						console.log("標點方法執行");
						$("#map").tinyMap('modify',{
							'marker' :[{
								'id':markID[0],
								'addr':[lat,lng],
								'text':'<strong>'+'label'+markID[0]+'</strong>',
								'icon':{
									url : "<?php echo base_url('kit/images/MARKER/')?>"+markerColor[ColorChange()]+'.png',
									scaledSize: [35, 50]
								},
								'animation':'DROP',
								'event':{
									'created':function(){
										if(searchNum == 1){
											console.log("已標點,newData");
											//localSearch(sLet,sLng);
											foodFunction(sLet,sLng);
										}else{
											searchNum++;
										}
									}
								}
							}]
						})
					}
				}else{
					alert('已達比對數上限(3筆)，請先關閉多於資料。')
				}
			}else{
				alert("Please choose the country first!");
			}
		}
		function clearLabel(num){
			$("#map").tinyMap('clear',{
				'marker':[parseInt(num)]
			});
			console.log('刪除成功'+num);
			lat=0,lng=0; 
		}
		//探索
		// function localSearch(sLet,sLng){
		// }
		//飲食
		var food=['restaurant'];
		function foodFunction(sLet,sLng){
			foodScore=0;
			healthScore=0;
			vitalScore=0;
			$("#map").tinyMap('modify',{
				places: {
				    // 搜尋地點（預設為目前地圖的中心位置）
				    location:[sLet,sLng],
				    // 資料半徑範圍（單位：公尺）
				    radius: '1000',
				    // 搜尋關鍵字（必要）
				    keyword: '',
				    // 讀取完成後的 Callback 事件
				    type:food[0],
				    callback: function () {//指數計算
		        		foodScore=(this.length);
		        		healthFunction1(sLet,sLng);
				    }
				}
			});
		}
		//醫療資訊
		var health=['hospital','doctor','dentist'];
		function healthFunction1(sLet,sLng){
			$("#map").tinyMap('modify',{
				places: {
				    // 搜尋地點（預設為目前地圖的中心位置）
				    location:[sLet,sLng],
				    // 資料半徑範圍（單位：公尺）
				    radius: '750',
				    // 搜尋關鍵字（必要）
				    keyword: '',
				    // 讀取完成後的 Callback 事件
				    type:health[0],
				    callback: function () {//指數計算
		        		healthScore=(this.length)*2;
	        			healthFunction2(sLet,sLng);
	        			console.log(this);
				    }
				}
			});	
		}
		function healthFunction2(sLet,sLng){
			$("#map").tinyMap('modify',{
				places: {
				    // 搜尋地點（預設為目前地圖的中心位置）
				    location:[sLet,sLng],
				    // 資料半徑範圍（單位：公尺）
				    radius: '750',
				    // 搜尋關鍵字（必要）
				    keyword: '',
				    // 讀取完成後的 Callback 事件
				    type:health[1],
				    callback: function () {//指數計算
		        		healthScore+=this.length;
		        		healthFunction3(sLet,sLng);
		        		console.log(this);
				    }
				}
			});
		}
		function healthFunction3(sLet,sLng){
			$("#map").tinyMap('modify',{
				places: {
				    // 搜尋地點（預設為目前地圖的中心位置）
				    location:[sLet,sLng],
				    // 資料半徑範圍（單位：公尺）
				    radius: '750',
				    // 搜尋關鍵字（必要）
				    keyword: '',
				    // 讀取完成後的 Callback 事件
				    type:health[2],
				    callback: function () {//指數計算
		        		healthScore+=this.length;
		        		setTimeout('vitalFunction1('+sLet+','+sLng+')',100);
		        		console.log(this);
				    }
				}
			});
		}
		function vitalFunction1(sLet,sLng){
			//生活機能
			var vital=['shopping_mall','park','department_store','convenience_store','clothing_store'];
			$("#map").tinyMap('modify',{
				places: {
				    // 搜尋地點（預設為目前地圖的中心位置）
				    location:[sLet,sLng],
				    // 資料半徑範圍（單位：公尺）
				    radius: '1000',
				    // 搜尋關鍵字（必要）
				    keyword: '',
				    // 讀取完成後的 Callback 事件
				    type:vital[0],
				    callback: function () {//指數計算
		        		vitalScore+=this.length;
		        		//vitalFunction2();
		        		setTimeout('vitalFunction2('+sLet+','+sLng+')',100);
		        		console.log(this);
				    }
				}
			});
		}
		function vitalFunction2(sLet,sLng){
			//生活機能
			var vital=['shopping_mall','park','department_store','convenience_store','clothing_store'];
			$("#map").tinyMap('modify',{
				places: {
				    // 搜尋地點（預設為目前地圖的中心位置）
				    location:[sLet,sLng],
				    // 資料半徑範圍（單位：公尺）
				    radius: '1000',
				    // 搜尋關鍵字（必要）
				    keyword: '',
				    // 讀取完成後的 Callback 事件
				    type:vital[1],
				    callback: function () {//指數計算
		        		vitalScore+=this.length;
		        		//vitalFunction3();
		        		setTimeout('vitalFunction3('+sLet+','+sLng+')',100);
		        		console.log(this);
				    }
				}
			});
		}
		function vitalFunction3(sLet,sLng){
			//生活機能
			var vital=['shopping_mall','park','department_store','convenience_store','clothing_store'];
			$("#map").tinyMap('modify',{
				places: {
				    // 搜尋地點（預設為目前地圖的中心位置）
				    location:[sLet,sLng],
				    // 資料半徑範圍（單位：公尺）
				    radius: '1000',
				    // 搜尋關鍵字（必要）
				    keyword: '',
				    // 讀取完成後的 Callback 事件
				    type:vital[2],
				    callback: function () {//指數計算
		        		vitalScore+=this.length;
		        		//vitalFunction4();
		        		setTimeout('vitalFunction4('+sLet+','+sLng+')',100);
		        		console.log(this);
				    }
				}
			});
		}
		function vitalFunction4(sLet,sLng){
			//生活機能
			var vital=['shopping_mall','park','department_store','convenience_store','clothing_store'];
			$("#map").tinyMap('modify',{
				places: {
				    // 搜尋地點（預設為目前地圖的中心位置）
				    location:[sLet,sLng],
				    // 資料半徑範圍（單位：公尺）
				    radius: '1000',
				    // 搜尋關鍵字（必要）
				    keyword: '',
				    // 讀取完成後的 Callback 事件
				    type:vital[3],
				    callback: function () {//指數計算
		        		vitalScore+=this.length;
		        		//vitalFunction5();
		        		setTimeout('vitalFunction5('+sLet+','+sLng+')',100);
		        		console.log(this);
				    }
				}
			});
		}
		function vitalFunction5(sLet,sLng){
			//生活機能
			var vital=['shopping_mall','park','department_store','convenience_store','clothing_store'];
			$("#map").tinyMap('modify',{
				places: {
				    // 搜尋地點（預設為目前地圖的中心位置）
				    location:[sLet,sLng],
				    // 資料半徑範圍（單位：公尺）
				    radius: '1000',
				    // 搜尋關鍵字（必要）
				    keyword: '',
				    // 讀取完成後的 Callback 事件
				    type:vital[4],
				    callback: function () {//指數計算
		        		vitalScore+=this.length;
		        		console.log(this);
		        		index_calculation();
				    }
				}
			});
		}
		function index_calculation(){
			//指數計算
			console.log(foodScore,healthScore,vitalScore);
			foodScore=foodScore*5;
	        healthScore=(Math.sqrt(healthScore*3.5))*10;
	        if(healthScore>100){
	        	healthScore=100;
	        }
	        vitalScore=(Math.sqrt(vitalScore))*10;
	        console.log(foodScore,healthScore,vitalScore);
	        newData();
		}
	</script>
	<!-- 功能運作 -->
	<script>
		var mark=0;
		var markID=[0,1,2,0];
		var bgColor=['#F5A9A2','#DCBEF8','#B2F2F7',''];
		var markerColor=['red','purple','blue',''];
		var latlng=['','','',''];
		var chartID=0;
		function markIDLeft(){
			markID[3]=markID[0];
			for(var i=0;i<3;i++){
				markID[i]=markID[i+1];
			}
		}

		function ColorChange(){
			if(mark==0){
				return 0;
			}else{
				var arr=['','','',''];
				for(var i=0;i<mark;i++){
					for(var j=0;j<3;j++){
						if(($("div[data-num='"+i+"']").attr('style')).substr(13,7) == bgColor[j]){
							arr[i]=bgColor[j];
							break;
						}
					}
				}
				for(var i=0;i<3;i++){
					if(bgColor[i]!=arr[0] && bgColor[i]!=arr[1] && bgColor[i]!=arr[2] && bgColor[i]!=arr[3]){
						return i;
					}
				}
			}
		}

		function markIDright(){
			for(var i=3;i>0;i--){
				markID[i]=markID[i-1];
			}
			markID[0]=markID[3];
			markID[3]=markID[2];
		}

		function numChange(num){
			var number=parseInt(num);
			for(var i=1; i<=(mark-number); i++){
				if($("button[data-num='"+(number+i)+"']").length==1){
					$("button[data-num='"+(number+i)+"']").attr("data-num",(number+i-1));
					$("div[data-num='"+(number+i)+"']").attr("data-num",(number+i-1));
				}else{
					break;
				}
			}
		}

		function arrlatlng(num){
			var num=parseInt(num);
			for(var i=num;i<mark;i++){
				latlng[i]=latlng[i+1];
			}
				//console.log(latlng);
		}

		function DataSize(){
			mark=$("#data").children().length;
			console.log("mark="+mark);
			if(mark==1){
				$(".dataChild").attr('class','dataChild col-sm-12');
				$("div[id='chart']").attr('class','col-sm-12 col-md-6 col-lg-4');
			}else if(mark==2){
				$(".dataChild").attr('class','dataChild col-sm-12 col-md-6');
				$("div[id='chart']").attr('class','col-sm-12');
			}else if(mark==3){
				$(".dataChild").attr('class','dataChild col-lg-4 col-md-6 col-sm-12');
				$("div[id='chart']").attr('class','col-sm-12');
			}
		}
			


		//關閉此物件
		function closeDiv(object){
			$(object).parent().parent().remove();
			DataSize();
			markIDright();
			clearLabel(object.dataset.num);
			numChange(object.dataset.num);
			arrlatlng(object.dataset.num);
		}

		//創建新Data物件
		function newData(){
			$("#data").append('<div class="dataChild "> <div class="divborder" data-num="'+markID[0]+'" style="border-color:'+bgColor[ColorChange()]+';" > <button data-num="'+markID[0]+'" class="fa fa-close" style="background: -webkit-radial-gradient(circle,white,'+bgColor[ColorChange()]+'); color:'+markerColor[ColorChange()]+'" onclick="closeDiv(this)"> </button><h2>'+$("#address").val()+'</h2> </div></div>');
			chartID++;
			radar(markID[0]);
			doughnut(markID[0]);
			line(markID[0]);
			DataSize();
			markIDLeft();
		}
	</script>
	<!-- 繪圖 -->
	<script>
		function radar(num){
			$("div[data-num="+num+"]").append("<div id='chart' class='col-sm-12 col-md-6 col-lg-4'> <canvas class='col-sm-12' id=radar"+chartID+"></canvas> </div>");
			//定義變數
			var chartRadarDOM;
			var chartRadarData;
			var chartRadarOptions;
			//載入雷達圖
			Chart.defaults.global.legend.display = false;
			Chart.defaults.global.defaultFontColor = 'rgba(0,0,74,1)';
			chartRadarDOM = $("#radar"+chartID);
			chartRadarOptions = {
				scale: {
					ticks:{
						fontFamily:'微軟正黑體',
						fontSize: 10,
						beginAtZero: true,
						maxTicksLimit: 7,
						min:0,
						max:100
					},
					pointLabels: {
						fontSize: 12,
						color: '#0044BB'
					},
					gridLines: {
						color: '#009FCC'
					}
				},
				title:{
					display:true,
					text:'Location analyze',
					fontFamily:'微軟正黑體',
					fontSize:25
				}
			};

			//製作數值(照labels順序)
			var graphData =new Array();
			graphData.push(lifeScore);
			graphData.push(vitalScore);
			graphData.push(healthScore);
			graphData.push(foodScore);
			graphData.push(trafficScore);

			//CreateData
			chartRadarData = {
				labels: ['Life safety','Vital function', 'Healthcare', 'Food', 'Traffic safety'],
				datasets: [{
					label: "機能指數",
					backgroundColor: 'rgba(54, 162, 235, 0.2)',
					borderColor: 'rgba(54, 162, 235, 1)',
					//點背景顏色
					pointBackgroundColor: "rgba(63,63,74,0.3)",
					//點被選取時背景顏色
					pointHoverBackgroundColor: "rgba(0,0,0,0.5)",
					//點大小
					pointRadius: 3,
					data: graphData
				}]
			};
				
			//Draw
			var chartRadar = new Chart(chartRadarDOM, {
				type: 'radar',
				data: chartRadarData,
				options: chartRadarOptions
			});
		}
		function doughnut(num){
			$("div[data-num="+num+"]").append("<div id='chart' class='col-lg-4 col-md-6 col-sm-12'> <canvas id=doughnut"+chartID+"></canvas> </div>");
			var ctx=$("#doughnut"+chartID);
			var doughnutChart = new Chart(ctx,{
				type: 'doughnut',
				data: {
					labels : ['0~14','15~64','65↑','others'],
					datasets : [{
						backgroundColor : ['#9191FF','#FF8585','#6CFF92','#FFB047'],
						data : age
					}]
				},
				options:{
					title:{
						display:true,
						text:'Population age ratio',
						fontFamily:'微軟正黑體',
						fontSize:25
					},
					legend:{
						display:true,
						position:'top',
						labels:{
							fontColor:'black' ,
							fontSize:15
						},
					},
					animation:{
						duration:5000
					}
				}
			});
		}
		function line(num){
			$("div[data-num="+num+"]").append("<div id='chart' class='col-lg-4 col-md-6 col-sm-12'> <canvas id=line"+chartID+"></canvas> </div>");
			var ctx=$("#line"+chartID);
			var doughnutChart = new Chart(ctx,{
				type: 'line',
				data: {
					labels:['1~3','4~6','7~9','10~12'],
					datasets:[{
						fill:false,
						label:'2013',
						borderColor : '#FF4848',
						pointBackgroundColor : '#FF0000',
						data : estate2013
					},{
						fill:false,
						label:'2014',
						borderColor : '#FFB047',
						pointBackgroundColor : '#FF9600',
						data : estate2014
					},{
						fill:false,
						label:'2015',
						borderColor : '#5BFF38',
						pointBackgroundColor : '#4AFF00',
						data : estate2015
					},{
						fill:false,
						label:'2016',
						borderColor : '#6878FF',
						pointBackgroundColor : '#0017FF',
						data : estate2016
					},{
						fill:false,
						label:'2017',
						borderColor : '#C759FD',
						pointBackgroundColor : '#D200FF',
						data : estate2017
					}]
				},
				options:{
					title:{
						fontFamily:'微軟正黑體',
						display:true,
						text:'House price',
						fontSize:25
					},
					legend:{
						display:true,
						position:'top',
						labels:{
							fontColor:'black' ,
							fontSize:15
						},
					}
				}
			});
		}
	</script>
</body>

</html>