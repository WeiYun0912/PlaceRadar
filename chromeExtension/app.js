var url = "http://localhost/";

//注入DIV至頁面
$("body").append('<div id="mwt_mwt_slider_scroll"></div>');
//背景地圖
$("body").append('<div id="mwt_slider_map"></div>');

$("#mwt_mwt_slider_scroll").append('<div id="mwt_slider_content"><div>');
//地址搜索攔
$("#mwt_slider_content").append('<input type="text" id="mwt_slider_search_text" class="mwt_slider_search_text" readonly="readonly" >');

//雷達圖
$("#mwt_slider_content").append('<h5 class="mwt_slider_title">Location analyze</h5>');
$("#mwt_slider_content").append('<div id="mwt_slider_radar-wrapper"></div>');
$("#mwt_slider_radar-wrapper").append('<canvas id="mwt_slider_radar"></canvas>');
//drawCharRadar();
//甜甜圈
$("#mwt_slider_content").append('<h5 class="mwt_slider_title">Population age ratio</h5>');
$("#mwt_slider_content").append('<div id="mwt_slider_doughnut-wrapper"></div>');
$("#mwt_slider_doughnut-wrapper").append('<canvas id="mwt_slider_doughnut"></canvas>');
//drawCharDoughnut();
//折線圖
$("#mwt_slider_content").append('<h5 class="mwt_slider_title">House price</h5>');
$("#mwt_slider_content").append('<div id="mwt_slider_line-wrapper"></div>');
$("#mwt_slider_line-wrapper").append('<canvas id="mwt_slider_line"></canvas>');
//drawCharLine();



//按鈕
$("#mwt_slider_content").append('<button id="mwt_slider_btn_close" class="mwt_slider_btn mwt_slider_btn-danger">close</button>　');
$("#mwt_slider_content").append('<button id="mwt_slider_btn_new" class="mwt_slider_btn mwt_slider_btn-success">more</button>');

//判斷是否開啟
var toggleBg = true;
//取得右側攔寬度(來自CSS)
var w = $("#mwt_slider_content").width();

//將右側欄位填滿整個視窗
// $('#mwt_slider_content').css('height', ($(window).height()) + 'px' );
// $(window).resize(function() {
// 	$('#mwt_slider_content').css('height', ($(window).height()) + 'px' );
// });

//打開右側攔
function openTab(){
	$("#mwt_mwt_slider_scroll").animate({ right:'0px' }, 600 ,'swing');
	toggleBg = !toggleBg ; 
}

//關閉右側攔
function closeTab(){
	$("#mwt_mwt_slider_scroll").animate( { right:'-'+w+'px' }, 600 ,'swing');
	toggleBg = !toggleBg ; 
}

$("#mwt_slider_btn_close").click(function(){
 	closeTab();
});

$("#mwt_slider_btn_new").click(function(){
 	closeTab();
 	window.open(url+'hackathon/home/single?addr='+thisAddr,'PlaceRadar','width=800,height=1400, toolbar=yes')
});



//請求地址
function addScriptTag(addr,country) {
	var getCountry="";
	if(country == "zh-TW"){
		getCountry = "臺灣";
	}else if(country == "ko"){
		getCountry = "韓國";
	}else{
		getCountry = "日本";
	}
	$.ajax({
		url: url+'hackathon/api/getSearchJson',
		type: 'POST',
		dataType: 'json',
		data: {searchText: addr,
			   country : country},
	})
	.done(function(e) {
		var addr = e['results'][0]['formatted_address'];
		var latLng = e['results'][0]['geometry']['location']['lat']+","+e['results'][0]['geometry']['location']['lng'];
		console.log(latLng);
		thisAddr = addr;
		takeAddrSearch(addr,getCountry,latLng);
		// console.log(addr);
		// console.log(latLng);
	})
	.fail(function() {
		console.log("error");
	});
}

function takeAddrSearch(addr,country,latLng){
	$.ajax({
		url: url+'hackathon/api/addrSearch',
		type: 'POST',
		dataType: 'json',
		data: {addr: addr,
			   country:country},
	})
	.done(function(json) {
		console.log(json);
		drawCharLine(json[0]['estate']);
		drawCharDoughnut(json[1]);
		drawCharRadar([json[0]['lifeindex'],json[0]['accident']]);
	})
	.fail(function() {
		console.log("error");
	});
}


//$('#mwt_slider_map').hide();

//監聽事件(來自視窗腳本)
chrome.runtime.onMessage.addListener(function(message, sender, sendResponse) { 
	//sendResponse({ content: false });
	var event = message.content.split(',');
	if (toggleBg) {
		if(event[0] != "視窗腳本呼叫"){;
			$('#mwt_slider_search_text').val(event[0]);
			addScriptTag(event[0],event[1]);
		}
        openTab();
    } else {
    	if(event[0] == "視窗腳本呼叫"){
			closeTab();
		}else{
			$('#mwt_slider_search_text').val(event[0]);
			addScriptTag(event[0],event[1]);
		}
    } 
	//alert(message.content);
	//console.log(message);
    
});	


function drawCharRadar(data){
	$("#mwt_slider_radar-wrapper").html('<canvas id="mwt_slider_radar"></canvas>');
	chartRadarDOM = $('#mwt_slider_radar');

	//製作數值(照labels順序)
	var graphData =new Array();
	graphData.push(data[0]);
	graphData.push(data[1]);

	new Chart(chartRadarDOM, {
		"type": "horizontalBar",
		"data": {
			"labels": ["Life safety", "Traffic safety"],
			"datasets": [{
				"data": data,
				"fill": false,
				"backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)"],
				"borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)"],
				"borderWidth": 1
			}]
		},
		"options": {
			"scales": {
				"xAxes": [{
					"ticks": {
						"beginAtZero": true,
						"min":0,
						"max":100
					}
				}]
			},
			"legend":{
				display:false
			}
		}
	});
}

function drawCharDoughnut(data){
	var graphData =new Array();
	graphData.push(data['0to14']);
	graphData.push(data['15to64']);
	graphData.push(data['65up']);
	graphData.push(data['unknow_age']);
	var ctx=$("#mwt_slider_doughnut");
	var doughnutChart = new Chart(ctx,{
		type: 'doughnut',
		data: {
			labels : ['0~14','15~64','65↑','others'],
			datasets : [{
				backgroundColor : ['#9191FF','#FF8585','#6CFF92','#FFB047'],
				data : graphData
			}]
		},
		options:{
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

function drawCharLine(data){
	var line2013 = data[0].split(',');
	var line2014 = data[1].split(',');
	var line2015 = data[2].split(',');
	var line2016 = data[3].split(',');
	var line2017 = data[4].split(',');

	$("#mwt_slider_line-wrapper").html('<canvas id="mwt_slider_line"></canvas>');
	var ctx=$("#mwt_slider_line");
	var doughnutChart = new Chart(ctx,{
		type: 'line',
		data: {
			labels:['1~3','4~6','7~9','10~12'],
			datasets:[{
				fill:false,
				label:'2013',
				borderColor : '#FF4848',
				pointBackgroundColor : '#FF0000',
				data : line2013
			},{
				fill:false,
				label:'2014',
				borderColor : '#FFB047',
				pointBackgroundColor : '#FF9600',
				data : line2014
			},{
				fill:false,
				label:'2015',
				borderColor : '#5BFF38',
				pointBackgroundColor : '#4AFF00',
				data : line2015
			},{
				fill:false,
				label:'2016',
				borderColor : '#6878FF',
				pointBackgroundColor : '#0017FF',
				data : line2016
			},{
				fill:false,
				label:'2017',
				borderColor : '#C759FD',
				pointBackgroundColor : '#D200FF',
				data : line2017
			}]
		},
		options:{
			legend:{
				display:true,
				position:'top',
				labels:{
					fontColor:'black' ,
					fontSize:12
				},
			}
		}
	});
}



