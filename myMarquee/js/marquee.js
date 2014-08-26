/*  JavaScript Document                                                         */

var marqueeVars = {
	screenSize : '',
	width : 0,
	mobileSize : 770,
	autoPlay : true,
	currentPanel : 1,
	totalPanels : 0,
	timePassed : 0,
	timeToChange : 60,
	inTansition : false,
	panelContent : Array
}

jQuery(document).ready(function(){

	marqueeGatherData();
	marqueeMeasureScreen();
	setDebuger();

	jQuery(window).resize(function(){
		var newHeight = jQuery(".marquee_panel img").height();
	    jQuery(".marquee_panel").height(newHeight);
	    jQuery(".marquee_stage_large").height(newHeight);
	    jQuery(".marquee_container_1").height(newHeight);
	    jQuery(".marquee").height(newHeight);

	    var newTop = (jQuery('.marquee_container_1').height() - jQuery('.marquee_container_1 .panel_caption').height() -30)/2
		jQuery('.marquee_container_1 .panel_caption').css({top: newTop});
	});


});

function marqueeAdvance(){

	// check browser width
	var browserWidth = jQuery('.marquee').width();
	var currentSize = marqueeVars.screenSize;
	if(browserWidth > marqueeVars.mobileSize){
		var newWidth = 'large';
		marqueeVars.screenSize = 'large';
	}else{
		var newWidth = 'small'
		marqueeVars.screenSize = 'small';
	}



	// detect change in screen size variable
	if(currentSize != newWidth){
		if(marqueeVars.screenSize == 'large'){
			marqueeMultiPanel();
		}else{
			marqueeMultiPanel();
		}
	}

	
	// advance the timer and large marquee
	if (marqueeVars.timePassed == marqueeVars.timeToChange){
		marqueeVars.timePassed = 0;

		if (marqueeVars.autoPlay == true){
			if(marqueeVars.currentPanel == marqueeVars.totalPanels){
				jQuery('.marquee_nav div:nth-child(1)').trigger('click');
			}else{
				jQuery('.marquee_nav div:nth-child('+(marqueeVars.currentPanel+1)+')').trigger('click');
			}
		}

	}else{
		marqueeVars.timePassed += 1;
	}
	setDebuger();
}


function marqueeMultiPanel(){

	marqueeVars.timePassed = 0;
	marqueeVars.autoPlay = true;

	// clear HTML from marquee and add stage elements
	jQuery('.marquee').html('').append('<div class="marquee_stage_large"></div>');
	jQuery('.marquee_stage_large').append('<div class="marquee_container_1"></div><div class="marquee_nav"></div>');

	// Generate navigation and links
	for(i=0; i<marqueeVars.totalPanels; i++){
		jQuery('.marquee_nav').append('<div></div>');
	}
	
	// Detect hover over marquee
	jQuery('.marquee').hover(
		function(){
			marqueeVars.autoPlay = false;
			jQuery(this).removeClass('autoplay');
		},
		function(){
			marqueeVars.autoPlay = true;
			marqueeVars.timePassed = 0;
			jQuery(this).addClass('autoplay');
		}
	);

	
	// add click events and panel transitions
	jQuery('.marquee_nav div').on('click', function(){

		var navClicked = jQuery(this).index();

		if(marqueeVars.inTansition){
			//do nothing
		}else{

			marqueeVars.currentPanel = navClicked + 1;
			marqueeVars.inTansition = true;
			
			// set the navigation state
			jQuery('.marquee_nav div').removeClass('selected');
			jQuery(this).addClass('selected');
	
			// inject panel container
			jQuery('.marquee_stage_large').append('<div class="marquee_container_2" style="opacity:0;"></div>');
			
			jQuery('.marquee_container_2').html(marqueeVars.panelContent[navClicked]).animate({opacity:1},1000,function(){
				jQuery('.marquee_container_1').remove();
				jQuery(this).addClass('marquee_container_1').removeClass('marquee_container_2');
				marqueeVars.inTansition = false;
				setDebuger();
			});

			//adjust the caption to the middle
			var newTop = (jQuery('.marquee_container_2').height() - jQuery('.marquee_container_2 .panel_caption').height() -30)/2
			jQuery('.marquee_container_2 .panel_caption').css({top: newTop});

			//add link to image and panel_caption h3
			var getLink = jQuery('.marquee_container_2 .panel_caption .panel_content').find('a:nth-child(1)').attr('href');
			jQuery('.marquee_container_2 .marquee_panel > a').attr('href',getLink);	//add link to img
			jQuery('.marquee_container_2 .panel_caption h3 a').attr('href',getLink); //add link to h3			
			if (jQuery('.marquee_container_2 .panel_caption .panel_content').find('a:nth-child(1)').hasClass("hide-mar-cap")) {
				jQuery('.marquee_container_2 .panel_caption').css("opacity", 0);
			}

		}

		setDebuger();

	});


	// initiate the first image 	
 	var initHeight = jQuery('.site-content').width()/2;
 	jQuery('.marquee_stage_large').height(initHeight);
 	jQuery('.marquee_stage_large').append('<div class="marquee_container_1"></div>');
 	jQuery('.marquee_container_1').html(marqueeVars.panelContent[0]);
 	
 	var newTop = (initHeight - jQuery('.marquee_container_1 .panel_caption').height() - 30)/2
	jQuery('.marquee_container_1 .panel_caption').css({top: newTop});

	var getLink = jQuery('.marquee_container_1 .panel_caption .panel_content').find('a:nth-child(1)').attr('href');
	jQuery('.marquee_container_1 .marquee_panel > a').attr('href',getLink);	//add link to img
	jQuery('.marquee_container_1 .panel_caption h3 a').attr('href',getLink); //add link to h3

	jQuery('.marquee_nav div:first').addClass('selected');
}



// function marqueeSinglePanel(){

// 	// clear HTML from marquee and add stage small
// 	jQuery('.marquee').html('').append('<div class="marquee_stage_small">'+marqueeVars.panelContent[0]+'</div>');
	
// 	var getLink = jQuery('.marquee .marquee_stage_small').find('a:nth-child(1)').attr('href');  /* grab first hyperlink url, add hyperlink to title */
// 	var getTitle = jQuery('.marquee .marquee_stage_small h3').html();
// 	var getFullImage = jQuery('.marquee .marquee_stage_small .marquee_panel').attr('data-full');
// 	jQuery('.marquee .marquee_stage_small h3').html('<a href="'+getLink+'">'+getTitle+'</a>');
// 	jQuery('.marquee .marquee_stage_small .marquee_panel').css('background-image','url('+getFullImage+')');  /* replace background-image with smalle file */
	
// 	setDebuger();
// }


function marqueeMeasureScreen(){
	// measure screen size
	if(jQuery('.marquee').width() > 770 ){
		marqueeVars.screenSize = 'large';
		marqueeMultiPanel();
	}else{
		marqueeVars.screenSize = 'small';
		marqueeMultiPanel();
	}

}

function marqueeGatherData(){
	// create and store HTML for panels
	jQuery('.marquee_data .marquee_panel').each(function(index){

		marqueeVars.totalPanels = index + 1;

		var imageFull = jQuery(this).attr('data-image-full');
		var imageLarge = jQuery(this).attr('data-image-large');
		var panelCaption = jQuery(this).find('.panel_caption').html();

		marqueeVars.panelContent[index] = '<div class="marquee_panel"><a href="#"><img src='+imageFull+'></a><div class="panel_caption">'+panelCaption+'</div></div>';
		
	});

	setInterval(marqueeAdvance, 100);	

}


function setDebuger(){
	jQuery('.screenSize').html('marqueeVars.screenSize = '+marqueeVars.screenSize);
	jQuery('.autoPlay').html('marqueeVars.autoPlay = '+marqueeVars.autoPlay);
	jQuery('.totalPanels').html('marqueeVars.totalPanels = '+marqueeVars.totalPanels);
	jQuery('.currentPanel').html('marqueeVars.currentPanel = '+marqueeVars.currentPanel);
	jQuery('.timePassed').html('marqueeVars.timePassed = '+marqueeVars.timePassed);
	jQuery('.timeToChange').html('marqueeVars.timeToChange = '+marqueeVars.timeToChange);
	jQuery('.inTansition').html('marqueeVars.inTansition = '+marqueeVars.inTansition);	
}




