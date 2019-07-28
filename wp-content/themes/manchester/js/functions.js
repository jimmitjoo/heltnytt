// // What is $(document).ready ? See: http://flowplayer.org/tools/documentation/basics.html#document_ready
// $(function() {
//  $(".slidetabs").tabs(".images > div", {
//    // enable "cross-fading" effect
//    effect: 'fade',
//    fadeOutSpeed: "slow",
//    // start from the beginning after the last tab
//    rotate: true
//  // use the slideshow plugin. It accepts its own configuration
//  }).slideshow({
//         autoplay: true,
//         interval: 1000,
//         clickable: false,
//         autopause: true
//     });
// });
// 
// $(function() {
//     $('.sparkbox-custom').sbCustomSelect();
// });
// 
// $(function(){
//         //Featured Offers popups
//         $("a[rel='featOffers']").colorbox(/*{transition:"fade"}*/);
// });
// 
// 
// 
// 
// //fancybox
// $("a[rel=image_gallery]").fancybox({
//        'transitionIn'    : 'none',
//        'transitionOut'   : 'none',
//        'titlePosition'   : 'over',
//        'titleFormat'   : function(title, currentArray, currentIndex, currentOpts) {
//          return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
//        }
// });
// 
// 
// // fancybox sign up 
// $("#signup").fancybox({
//  'scrolling'   : 'no',
//  'titleShow'   : false,
//  'onClosed'    : function() {
//      $("#login_error").hide();
//  }
// });
// 
// //Simple validation; submit data using Ajax and display response
// $("#signup_form").bind("submit", function() {
// 
//  if ($("#login_name").val().length < 1 || $("#login_pass").val().length < 1) {
//      $("#login_error").show();
//      $.fancybox.resize();
//      return false;
//  }
// 
//  $.fancybox.showActivity();
// 
//  $.ajax({
//    type    : "POST",
//    cache : false,
//    url   : "/data/login.php",
//    data    : $(this).serializeArray(),
//    success: function(data) {
//      $.fancybox(data);
//    }
//  });
// 
//  return false;
// });
// 
// 
// // fancybox password change 
// $("#password_change").fancybox({
//  'scrolling'   : 'no',
//  'titleShow'   : false,
//  'onClosed'    : function() {
//      $("#login_error").hide();
//  }
// });
// 
// //Simple validation; submit data using Ajax and display response
// $("#password_form").bind("submit", function() {
// 
//  if ($("#login_name").val().length < 1 || $("#login_pass").val().length < 1) {
//      $("#login_error").show();
//      $.fancybox.resize();
//      return false;
//  }
// 
//  $.fancybox.showActivity();
// 
//  $.ajax({
//    type    : "POST",
//    cache : false,
//    url   : "/data/login.php",
//    data    : $(this).serializeArray(),
//    success: function(data) {
//      $.fancybox(data);
//    }
//  });
// 
//  return false;
// });
// 
// 
// 
// // fancybox login
// $("#login").fancybox({
//  'scrolling'   : 'no',
//  'titleShow'   : false,
//  'onClosed'    : function() {
//      $("#login_error").hide();
//  }
// });
// 
// //Simple validation; submit data using Ajax and display response
// $("#login_form").bind("submit", function() {
// 
//  if ($("#login_name").val().length < 1 || $("#login_pass").val().length < 1) {
//      $("#login_error").show();
//      $.fancybox.resize();
//      return false;
//  }
// 
//  $.fancybox.showActivity();
// 
//  $.ajax({
//    type    : "POST",
//    cache : false,
//    url   : "/data/login.php",
//    data    : $(this).serializeArray(),
//    success: function(data) {
//      $.fancybox(data);
//    }
//  });
// 
//  return false;
// });
