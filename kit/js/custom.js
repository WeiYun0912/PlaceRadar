jQuery(function ($) {

    'use strict';


    // -------------------------------------------------------------
    //  ScrollUp Minimum setup
    // -------------------------------------------------------------

    (function() {

        $.scrollUp();

    }());


    // -------------------------------------------------------------
    //  Owl Carousel
    // -------------------------------------------------------------


    (function() {

        $("#featured-slider").owlCarousel({
            items:3,
            nav:true,
            autoplay:true,
            dots:true,
			autoplayHoverPause:true,
			nav:true,
			navText: [
			  "<i class='fa fa-angle-left '></i>",
			  "<i class='fa fa-angle-right'></i>"
			],
            responsive: {
                0: {
                    items: 1,
                    slideBy:1
                },
                500: {
                    items: 2,
                    slideBy:1
                },
                991: {
                    items: 2,
                    slideBy:1
                },
                1200: {
                    items: 3,
                    slideBy:1
                },
            }            

        });

    }());


    (function() {

        $("#featured-slider-two").owlCarousel({
            items:4,
            nav:true,
            autoplay:true,
            dots:true,
			autoplayHoverPause:true,
			nav:true,
			navText: [
			  "<i class='fa fa-angle-left '></i>",
			  "<i class='fa fa-angle-right'></i>"
			],
            responsive: {
                0: {
                    items: 1,
                    slideBy:1
                },
                480: {
                    items: 2,
                    slideBy:1
                },
                991: {
                    items: 3,
                    slideBy:1
                },
                1000: {
                    items: 4,
                    slideBy:1
                },
            }            

        });
		
		

    }());

    (function() {

        $(".testimonial-carousel").owlCarousel({
            items:1,
            autoplay:true,
			autoplayHoverPause:true
        });

    }());


    // -------------------------------------------------------------
    //  Slider
    // -------------------------------------------------------------

    (function() {

        $('#price').slider();

    }());   
	
	
   
    
    // -------------------------------------------------------------
    //  language Select
    // -------------------------------------------------------------

   (function() {

        $('.language-dropdown').on('click', '.language-change a', function(ev) {
            if ("#" === $(this).attr('href')) {
                ev.preventDefault();
                var parent = $(this).parents('.language-dropdown');
                parent.find('.change-text').html($(this).html());
            }
        });

        $('.category-dropdown').on('click', '.category-change a', function(ev) {
            if ("#" === $(this).attr('href')) {
                ev.preventDefault();
                var parent = $(this).parents('.category-dropdown');
                parent.find('.change-text').html($(this).html());
            }
        });

    }());


    // -------------------------------------------------------------
    //  Tooltip
    // -------------------------------------------------------------

    (function() {

        $('[data-toggle="tooltip"]').tooltip();

    }());


    // -------------------------------------------------------------
    // Accordion
    // -------------------------------------------------------------

        (function () {  
            $('.collapse').on('show.bs.collapse', function() {
                var id = $(this).attr('id');
                $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
                $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-minus"></i>');
            });

            $('.collapse').on('hide.bs.collapse', function() {
                var id = $(this).attr('id');
                $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
                $('a[href="#' + id + '"] .panel-title span').html('<i class="fa fa-plus"></i>');
            });
        }());


    // -------------------------------------------------------------
    //  Checkbox Icon Change
    // -------------------------------------------------------------

    (function () {

        $('input[type="checkbox"]').change(function(){
            if($(this).is(':checked')){
                $(this).parent("label").addClass("checked");
            } else {
                $(this).parent("label").removeClass("checked");
            }
        });

    }()); 
	
	
	 // -------------------------------------------------------------
    //  select-category Change
    // -------------------------------------------------------------
	$('.select-category.post-option ul li a').on('click', function() {
		$('.select-category.post-option ul li.link-active').removeClass('link-active');
		$(this).closest('li').addClass('link-active');
	});

	$('.subcategory.post-option ul li a').on('click', function() {
		$('.subcategory.post-option ul li.link-active').removeClass('link-active');
		$(this).closest('li').addClass('link-active');
	});
	
    // -------------------------------------------------------------
    //   Show Mobile Number
    // -------------------------------------------------------------  

    (function () {

        $('.show-number').on('click', function() {
            $('.hide-text').fadeIn(500, function() {
              $(this).addClass('hide');
            });  
			$('.hide-number').fadeIn(500, function() {
              $(this).addClass('show');
            }); 			
        });


    }());
	
    // -------------------------------------------------------------
    //   Google Map 
    // -------------------------------------------------------------  

    //(function(){

    //    var map;

    //    map = new GMaps({
    //        el: '#gmap',
    //        lat: 48.8612228,
    //        lng: 2.313042,
    //        scrollwheel:false,
    //        zoom: 6,
    //        zoomControl : true,
    //        panControl : true,
    //        streetViewControl : true,
    //        mapTypeControl: false,
    //        overviewMapControl: true,
    //        clickable: false
    //    });

    //    var image = '';
    //    map.addMarker({
    //        lat: 48.8612228,
    //        lng: 2.313042,
    //        icon: image,
    //        animation: google.maps.Animation.DROP,
    //        verticalAlign: 'bottom',
    //        horizontalAlign: 'center',
    //        backgroundColor: '#d3cfcf',
    //    });


    //    var styles = [ 

    //    {
    //        "featureType": "road",
    //        "stylers": [
    //        { "color": "#969696" }
    //        ]
    //    },{
    //        "featureType": "water",
    //        "stylers": [
    //        { "color": "#cecece" }
    //        ]
    //    },{
    //        "featureType": "landscape",
    //        "stylers": [
    //        { "color": "#efefef" }
    //        ]
    //    },{
    //        "elementType": "labels.text.fill",
    //        "stylers": [
    //        { "color": "#555555" }
    //        ]
    //    },{
    //        "featureType": "poi",
    //        "stylers": [
    //        { "color": "#cfcfcf" }
    //        ]
    //    },{
    //        "elementType": "labels.text",
    //        "stylers": [
    //        { "saturation": 1 },
    //        { "weight": 0.1 },
    //        { "color": "#848484" }
    //        ]
    //    }

    //    ];

    //    map.addStyle({
    //        styledMapName:"Styled Map",
    //        styles: styles,
    //        mapTypeId: "map_style"  
    //    });

    //    map.setStyle("map_style");
    //}()); 


// script end
});

