# PlaceRadar
亞洲跨國黑客松 文件
===

### 一、 欲解決的問題與需求、解決方式說明
不論是學生或是社會人士，都會有購屋與租屋的需求。在選擇房屋方
面房價、周邊機能、交通，以及居住安全等等，都是考量購買或承租的關鍵因素。

### 二、 預計使用那些國家的開放資料集與其他資料名稱
+ 【台】 
  -  鄉鎮戶數及人口數(9701)
	-  犯罪資料
	-  即時交通事故資料
	-  各縣(市)警察局暨所屬分駐(派出)所地址資料
	-  不動產成交案件實際資訊 OpenData
    
+ 【日】 
  -  警視庁の統計（平成 28 年）
	-  区市町村の町丁別、罪種別及び手口別認知数
	-  交通人身事故発生状況(平成 30 年 6 月末)
	-  発生状況・統計
	-  地価公示・地価調査・取引価格情報

+ 【韓】 
  -  National Police _ National Police Officer Address
	-  [Statistics of crime] The crime place of origin (local)
	-  [Statistics of crime] The crime generation site (by place)
	-  성 및 연령별 인구와 인구밀도
	-  교통사고 상세통계
	-  지자체 종합통계
### 三、 請簡述作品核心技術與創意之處
 本團隊將利用台日韓三國之 OpenData 進行分析，搭建 WEB 使用平
台，提供使用者查詢以及比較等服務；開發網頁瀏覽器外掛，幫助使用者
在第三方租屋、購物平台，可以快速的透過本作品之分析結果了解當地狀
況，不需額外開啟搜索改善使用體驗；在資料呈現方面，並非把所有資訊
呈現給使用者，而是使用「人口」與「資源」數量的多寡進行指數設計，
提供使用者一目瞭然的資訊。

### 資料集(台灣、日本、韓國)

|編號| 主題 | 網址 |原始資料來源|
| --- | --- |--- |--- |
|1| 三國部分資料集 | [三國部分資料集](https://docs.google.com/spreadsheets/d/16t37OKHQAwh8CJ4gBMXeVVhQXtLOO6DFTDxbZbrBCHw/edit#gid=1507801228)|[資料來源](https://www.accupass.com/event/1806221006151202784160)


### 資料集網站(台灣)

|編號| 主題 | 網址 |原始資料來源|
| --- | --- |--- |--- |
|1|鄉鎮戶數及人口數|[鄉鎮戶數及人口數](https://www.ris.gov.tw/346)|[資料來源](https://www.ris.gov.tw/346)
|2|犯罪資料|[犯罪資料](https://data.gov.tw/dataset/14200 )|[資料來源](https://data.gov.tw/)
|3|即時交通事故資料|[即時交通事故資料](https://data.gov.tw/dataset/13139) |[資料來源](https://data.gov.tw/)
|4|各縣(市)警察局暨所屬分駐(派出)所地址資料| [各縣(市)警察局暨所屬分駐(派出)所地址資料](https://data.gov.tw/dataset/5958 )|[資料來源](https://data.gov.tw/)

### 資料集網站(日本)

|編號| 主題 | 網址 |原始資料來源|
| --- | --- |--- |--- |
|1| 警視庁の統計（平成28年） | [警視庁の統計（平成28年）](http://www.keishicho.metro.tokyo.jp/about_mpd/jokyo_tokei/tokei/k_tokei28.html)|[資料來源](http://www.keishicho.metro.tokyo.jp/index.html)
|2| 区市町村の町丁別、罪種別及び手口別認知数 |[区市町村の町丁別、罪種別及び手口別認知数](http://www.keishicho.metro.tokyo.jp/about_mpd/jokyo_tokei/jokyo/ninchikensu.html )|[資料來源](http://www.keishicho.metro.tokyo.jp/index.html)
|3|交通人身事故発生状況(平成30年6月末)|[交通人身事故発生状況(平成30年6月末)](http://www.keishicho.metro.tokyo.jp/about_mpd/jokyo_tokei/tokei_jokyo/traffic_accident.html )|[資料來源](http://www.keishicho.metro.tokyo.jp/index.html)
|4|発生状況・統計|[発生状況・統計](http://www.keishicho.metro.tokyo.jp/about_mpd/jokyo_tokei/index.html) |[資料來源](http://www.keishicho.metro.tokyo.jp/index.html)
|5|地価公示・地価調査・取引価格情報|[地価公示・地価調査・取引価格情報](http://www.land.mlit.go.jp/webland/)|[資料來源](http://www.land.mlit.go.jp/webland/)


### 資料集網站(韓國)

|編號| 主題 | 網址 |原始資料來源|
| --- | --- |--- |---|
|1|開放性資料1|[開放性資料1](https://www.data.go.kr/)|[資料來源](https://www.data.go.kr/)
|2|開放性資料2|[開放性資料2](http://kosis.kr/index/index.do)|[資料來源](http://kosis.kr/index/index.do)
|3|警察局相關資料(2017)|[警察局相關資料(2017)](https://www.data.go.kr/dataset/3075501/fileData.do)|[資料來源](https://www.data.go.kr/)
|4|犯罪統計(2016)|[犯罪統計(2016)](https://www.data.go.kr/dataset/3074462/fileData.do)|[資料來源](https://www.data.go.kr/)
|5|犯罪場所統計(2016)|[犯罪場所統計(2016)](https://www.data.go.kr/dataset/3074463/fileData.do)|[資料來源](https://www.data.go.kr/)
|6|交通事故分類網站|[交通事故分類網站](http://taas.koroad.or.kr/web/shp/sbm/initStatsAnals.do?menuId=WEB_KMP_STA)|[資料來源](http://taas.koroad.or.kr/)
|7|交通事故統計(2017)|[交通事故統計(2017)](https://drive.google.com/file/d/18jxqDc70sKAQxZZJeja1a5AX8IqRzsoS/view?usp=sharing)|[資料來源](http://taas.koroad.or.kr/web/shp/sbm/initStatsAnals.do?menuId=WEB_KMP_STA)
|8|人口密度(2015)|[人口密度(2015)](http://kosis.kr/statHtml/statHtml.do?orgId=110&tblId=DT_11001N_2013_A001&vw_cd=MT_OTITLE&list_id=110_11001_006_01&scrId=&seqNo=&lang_mode=ko&obj_var_id=&itm_id=&conn_path=E1#)|[資料來源](http://taas.koroad.or.kr/web/shp/sbm/initStatsAnals.do?menuId=WEB_KMP_STA)



### 資料表格式
* 國家地區 (country_area)
```php=1
  "id" => 主鍵
  "country" => 國家
  "city" => 城市
  "area" => 地區
```

* 人口密度 (population_density)
```php=1
  "id" => 主鍵
  "density" => 人口密度
  "t_men" => 男生總數
  "t_women" => 女生總數
  "0to14" => 0到14歲人口
  "15to64" =>  15到64歲人口
  "65up"  =>  65歲以上人口
  "unknow_age" => 年齡不詳
```

* 犯罪 (crime) 
```php=1
  "id" => 主鍵
  "crime_cnt" => 犯罪次數
```

* 派出所 (police_station) 
```php=1
  "id" => 主鍵
  "station_cnt" => 派出所數量
```
* 交通意外 (traffic_accident) 
```php=1
  "id" => 主鍵
  "accident_cnt" => 交通意外次數
  "death" => 死亡數
  "hurt" => 受傷數
```



* 房地產 (real_estate)
```php=1
  "id" => 主鍵
  "year" => 年份
  "season_one" => 第一季
  "season_two" => 第二季
  "season_three" => 第三季
  "season_four" => 第四季
```

### Api串接方法
```
| 接入名稱       | 傳入值        |回傳值      |需求及說明              |
| ------------- |:-------------:| ---------:|--------------------- :|
| api/addrSerach| country       |lifeindex  |lifeindex = 生活安全指數|
|               | addr          |accident   |accident = 交通事故指數 |
|               |               |estate     |estate = 近五年房價(季) |
|               |               |age        |age = 年齡             |
|               |               |areaid     |                       |
---------------------------------------------------------------------
|api/areaData   |areaid		|crimeData  |crimeData = 犯罪數量	 |
|		|		|policeData |policeData = 警局數量   |	
|		|		|trafficData|trafficData = 車禍數量  |
|		|		|man	    |man = 男生數量		 |
|		|		|woman	    |woman = 女生數量	 |
---------------------------------------------------------------------

```
