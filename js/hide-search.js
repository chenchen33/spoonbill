/* 
 * Toggles search on and off
 */

jQuery(document).ready(function($){
    $(".search-toggle").click(function(){
        $("#search-container").slideToggle('slow', function(){
            $('.search-toggle').toggleClass('active');
        });
        // Optional return false to avoid the page "jumping" when clicked
        return false;

    });
});



//Double search-slider: really messy
// jQuery(document).ready(function($){
    
//     $(".search-toggle").toggle(function(){
//             if($(window).width() >= 800 ){
//                 $("#search-container").css({
//                     width:"0px", display:"block"
//                 }).animate({
//                 	width:"285px"
//                 });
//                 $(".search-field").css({
//                     padding:"0em", display:"block"
//                 }).animate({
//                 	padding:"0.5em"
//                 });
//                 // Optional return false to avoid the page "jumping" when clicked
//                 return false;
//             }else{
//                 $(".search-field").css({
//                     padding:"0.5em", 
//                 });
//                 $("#search-container").css({
//                     width:"100%",
//                     display:"none",
//                 }).slideDown('slow');
//             }
//         }, function(){
//             if($(window).width() >= 800 ){
//             	$("#search-container").animate({
//                 	width:"0px"
//                 });
//                 $(".search-field").animate({
//                 	padding:"0em"
//                 });
//                 // Optional return false to avoid the page "jumping" when clicked
//                 return false;
//             }else{
//                 $("#search-container").slideUp('slow');
//             }
//     });    
// });