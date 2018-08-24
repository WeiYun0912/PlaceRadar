"use strict";
/* global document */
jQuery(document).ready(function () {
    /***
     Adding Google Map.
     ***/

    /* Calling goMap() function, initializing map and adding markers. */
    jQuery('#road_map').goMap({
        maptype: 'ROADMAP',
        latitude: 51.450711,
        longitude: 0.2760004,
        zoom: 13,
        scaleControl: true,
        scrollwheel: false,
//        group: 'category',
        markers: [
//            Markers for Doctor Search
            {latitude: 51.5131094, longitude: -0.176425, icon: 'images/map/1.png', html: {
                    content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
                }},
            {latitude: 51.511218, longitude: -0.147124, icon: 'images/map/2.png', html: {
                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
                }},
            {latitude: 51.515918, longitude: -0.219050, icon: 'images/map/3.png', html: {
                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
                }},
            {latitude: 51.4941563, longitude: -0.1710176, icon: 'images/map/4.png', html: {
                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
                }},
            {latitude: 51.5238585, longitude: -0.0950225, icon: 'images/map/5.png', html: {
                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
                }},
            {latitude: 51.4965787, longitude: -0.1169972, icon: 'images/map/6.png', html: {
                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
                }},
			{latitude: 51.5096738, longitude: -0.2753873, icon: 'images/map/6.png', html: {
                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
                }},
            {latitude: 51.4965787, longitude: -0.199223, icon: 'images/map/7.png', html: {
                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
                }},
            {latitude: 51.4925041, longitude: -0.2363018, icon: 'images/map/8.png', html: {
                     content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
                }},
            {latitude: 51.5202758, longitude: -0.118047, icon: 'images/map/1.png', html: {
                 content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
            }},
			{latitude: 51.5249492, longitude: -0.2450565, icon: 'images/map/1.png', html: {
                 content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
            }},
			{latitude: 51.532054, longitude: -0.1639875, icon: 'images/map/8.png', html: {
                 content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
            }},
			{latitude: 51.5082309, longitude: -0.076872, icon: 'images/map/3.png', html: {
                 content: '<h5>ThemeRegion Ads Portal.</h5>Lorem ipsum dolor sit amet,<br/> consectetur adipisicing elit sed <br /><a href="#">Visit Store</a>'
            }}
            
        ]

    });
    
   
   
});