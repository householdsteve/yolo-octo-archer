var socialH = 60; // height of social media bar
var menuwidth = 250; // width of menu
var countdownDiv = []; // element to load contents into
var countdownContent = [];
var countdownClose = [];
var activePage = [];
var currentSelectedMenuItem = [];
var isInternetExplorer = false;
var bgImagesPreload = ['http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/waiting.jpg'];
var advise,
    spinner,
    loadHolder;

var opts = {
  lines: 13, // The number of lines to draw
  length: 0, // The length of each line
  width: 10, // The line thickness
  radius: 60, // The radius of the inner circle
  corners: 1, // Corner roundness (0..1)
  rotate: 0, // The rotation offset
  direction: 1, // 1: clockwise, -1: counterclockwise
  color: '#000', // #rgb or #rrggbb
  speed: 1, // Rounds per second
  trail: 60, // Afterglow percentage
  shadow: false, // Whether to render a shadow
  hwaccel: false, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  top: 'auto', // Top position relative to parent in px
  left: 'auto' // Left position relative to parent in px
};



// get server time
function checkInternetExplorer(){
  return isInternetExplorer;
}
function serverTime() { 
    var time = null; 
    $.ajax({url: PageAttr.baseUrl+'home/timer', 
        async: false, dataType: 'text', 
        success: function(d) { 
            time = new Date(d.timer); 
        }, error: function(http, message, exc) { 
            time = new Date(); 
    }}); 
    return time; 
}

function loadMaps(){
  var mapOptions = {
    zoom: 19,
    center: new google.maps.LatLng(41.9054485, 12.481257700000015),
    mapTypeId: google.maps.MapTypeId.SATELLITE
  }
  if($('#map-canvas').length > 0){
    
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(41.9054485,12.481257700000015),
        title:"GA Boutique"
    });
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var image = PageAttr.baseUrl+'assets/img/pin-b.png';
  var GAmarker = new google.maps.Marker({
      position: new google.maps.LatLng(41.9054485,12.481257700000015),
      map: map,
      icon: image
	});
	
	var contentString = '<div id="content" style="overflow:hidden 1important;">'+
      '<div id="siteNotice"style="overflow:hidden !important;">'+
      '</div>'+
      // '<h1 id="firstHeading" class="firstHeading">Giorgio Armani Boutique</h1>'+
      '<div id="bodyContent"style="height:57px;max-width:300px;overflow:hidden 1important;">'+ '<img src="'+PageAttr.baseUrl+'assets/img/ga-logo.png" width="247" height="37" alt="GIORGIO ARMANI">' +
      '<p>Via Condotti 77-79 • Rome</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });
	
	google.maps.event.addListener(GAmarker, 'click', function() {
	    infowindow.open(map,GAmarker);
	  });
  }
}

function loadMapMain() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAtiEkSR9a6K2Ih-avv8Meu_N8SpEgOK9g&sensor=true&callback=loadMaps";
  document.body.appendChild(script);
}

window.onload = loadMapMain;


function delegateSubActions(atag){
  var parts = atag.href.split("/");
  var compare = parts[parts.length-2]+"/"+parts[parts.length-1];
  switch(compare){
    case "events/rome":
      internalCountdown();
    break;
  }
}

function internalCountdown(){
  $(".countdown-internal").countdown({until: new Date(2013, 6 - 1, 5, 21,0,0), serverSync: serverTime, format:'dHMS'});
  $("#countdown-holder h1").fitText(0.8);
}

$(function(){
  if (!$.support.transition)
    $.fn.transition = $.fn.animate;
    
  if($('html').hasClass('lt-ie9')) isInternetExplorer = true;
  
  if(checkInternetExplorer() && !$.cookie('_saw_ie_message_')){
    advise = $("<div/>",{"class":"tellexplorer"})
    .append($("<div/>",{"class":"advice"}).html(
      "<h1>You're browser is out of date.</h1><p>Some of the functionality is incompatible with this version. We reccomend the following browsers:</p> <p><a href=\"https://www.google.com/intl/en/chrome/browser/\" target=\"_blank\"><img src=\""+PageAttr.baseUrl+"assets/img/browser-icons.jpg\"></a></p> <button class='btn'>Proceed Anyway</button>"
      ));
    advise.appendTo($('body'));
    advise.click(function(){
      $(this).remove();
    });
    
    $.cookie('_saw_ie_message_', true, { expires: 7 });
  }
    
  $(".social.content h3").fitText(1.5);
    
  $(".countdown").countdown({until: new Date(2013, 6 - 1, 5, 21,0,0), serverSync: serverTime, format:'dHM'});   
  internalCountdown();
  
      $('body').mousemove(function(event) {

          cx = Math.ceil($('body').width()  / 2);
          cy = Math.ceil($('body').height() / 2);
          dx = event.pageX - cx;
          dy = event.pageY - cy;


          x0 = Math.ceil(cx - (dx * 0.2));
          y0 = Math.ceil(cy - (dy * 0.2));
          x1 = event.pageX;
          y1 = event.pageY;
          r0 = 300;
          r1 = 10;

          sx = -dx * 0.03;
          sy = -dy * 0.03;
          b  =  (Math.abs(sx) + Math.abs(sy)) * 0.2;

          $('.door:not(.event)').css('box-shadow', "inset rgba(155,155,155,0.5) "+ sx +"px "+ sy + "px " + b+20 + "px");
          $('.door.event, .door.event .door').css('box-shadow', "inset rgba(255,0,0,1) "+ sx +"px "+ sy + "px ");

      });
      
  var WIN = $(window), WINW = WIN.width(), WINH = WIN.height(),
      DOC = $(document), DOCW = DOC.width(), DOCH = DOC.height(),
      rows = 4,
      columns = 4,
      availableHeight = WINH - socialH
      availableWidth = WINW - menuwidth;
  
  var palace = $("#palace-grid-holder"),
      sectionMain = $("section#main");
      sectionPrincipal = $("section.principal",sectionMain),
      socialMediaFeed = $("#social-media-feed");
  
   var o = availableHeight / rows;
   var amargin = (o * 0.10);
   var a = o - amargin;
   var maxwidth = Math.floor(a*3);
   
  // SET UP DIFFERENT PAGE HEIGHTS
   sectionMain.css("min-height",WINH).height(WINH);
 
   if(PageAttr.ShowBottomMenu != undefined && !PageAttr.ShowBottomMenu){
     sectionPrincipal.height(WINH).width(availableWidth);
    }else if(PageAttr.ShowBottomMenu){
     sectionPrincipal.height(availableHeight).width(availableWidth);
    }
    
  // make nav accordian  
  $('nav.main ul.subnav').each(function(i,v){
    var _s = $(this);
    _s.data('oheight',_s.height());
    if(!_s.prev().hasClass('selected'))
      _s.height(0);
  });
  
  $('nav.main ul > li').on("mouseenter",function(e){
    if($(this).has('a.selected').length == 0){
      var _c = $(this).find('ul.subnav');
      _c.transition({height:_c.data('oheight')},300);
    }
  });
  
  $('nav.main ul > li').on("mouseleave",function(e){
    if($(this).has('a.selected').length == 0){
      var _c = $(this).find('ul.subnav');
      _c.transition({height:0},300);
    }
  }); 
  
   $(".item-holder").each(function(i,v){
     var _s = $(this), _d = $('.door',_s), _ddata = _d.data();
     _s.height(a).css({"margin-top":amargin});
     if(!checkInternetExplorer() && _ddata.contentAvailable){
       _s.zoomTarget({
              targetsize: 3,
              closeclick: true,
              onanimationcomplete:loadPage, 
              zoomout: function(){}, // enable mouse over
              onclick: function(){activePage = _s; loadCountdownPage(_ddata.link)} // disable mouse hovers too
        });
      }
      if(checkInternetExplorer() && _ddata.contentAvailable){
        _s.on("click",function(e){
          window.location = PageAttr.baseUrl+_ddata.link;
        });
      }
   });
   
   $(".door").height(a).width(a*0.58).css({"border-top-left-radius": a*0.58, "border-top-right-radius": a*0.58});

   $(".zoomViewport").width(availableWidth-3);
   
   // do some fading in:
   $('nav#mainnav').delay(300).transition({left:0},700);
   
   // give the palace some values
   palace.hide().height(availableHeight+15).css({opacity:0,"max-width":maxwidth}).data({'containerHeight':availableHeight,'containerWidth':availableWidth,'menuwidth':menuwidth}).bgSwitcher({element:"div.door"});
   
   //contentEnabled
   loadHolder = $("<div/>",{id:"loader"});
   loadHolder.appendTo($('body'));
   spinner = new Spinner(opts).spin(loadHolder[0]);

   $( ":data(content-enabled)", palace).each(function() {
   var element = $( this );
    bgImagesPreload.push($( this ).data('bgImage'));
   });
   
   if(!$('body').hasClass('waiting')){
   $.imgpreload(bgImagesPreload,function()
   {         // check for success with: $(this[i]).data('loaded')
     loadHolder.css({opacity:1}).transition({opacity:0},300,function(){ loadHolder.hide(); });
     spinner.stop();
     palace.show().transition({opacity:1},700);
     socialMediaFeed.css({"top":availableHeight,opacity:0}).width(availableWidth-3).show().transition({opacity:1},300)
   });
    }
   
   // pjax calls for jax page laoding
   currentSelectedMenuItem = $('nav.main ul a.selected');
     
   $(document).pjax('[data-pjax] a', '#main section.principal');
  
   $(document).on('pjax:click', function(e) {
      currentSelectedMenuItem.removeClass('selected');
      currentSelectedMenuItem = $(e.target);
      currentSelectedMenuItem.addClass('selected');
     $('nav.main ul > li').trigger('mouseleave');
    })
     
   $(document).on('pjax:complete', function(e) {
     if(PageAttr.ShowBottomMenu != undefined && !PageAttr.ShowBottomMenu)
      sectionPrincipal.height(WINH).width(availableWidth);
      
      delegateSubActions(e.relatedTarget);
   })
   
   var pageCall;
   
   function loadCountdownPage(l){
     pageCall = $.ajax({url: PageAttr.baseUrl+l, dataType:"json", data:{w:availableWidth,h:WINH}});
   }

   function loadPage(html){
     
     if(countdownDiv.length < 1){
         countdownDiv = $("<div/>",{"class":"cd-page"}).width(availableWidth).height(WINH).hide();
         countdownContent = $("<div/>",{"class":"cd-content"});
         countdownClose = $("<div/>",{"class":"cd-close"}).text('X').css({"opacity":0.5});
         countdownClose.on("click",function(e){
            countdownDiv.transition({opacity:0},300,function(){countdownDiv.hide()});
            countdownContent.empty();
            
            if(!checkInternetExplorer()) activePage.zoomTargetOut();
         });
         countdownClose.hover(function(){
           $(this).transition({opacity:1},500);
         },function(){
           $(this).transition({opacity:0.5},500);           
         });
         countdownDiv.append(countdownContent,countdownClose).appendTo(sectionPrincipal);
       }else{
         countdownContent.empty();
         countdownDiv.width(availableWidth).height(WINH).hide();
       }

       pageCall.always(function(data){
          countdownContent.html(data.html);
          countdownDiv.delay(500).css({opacity:0}).show().transition({opacity:1},500);
       });
   }
   
   if(!checkInternetExplorer()){
       socialMediaFeed.find('a').click(function(e){
         var smf = $.ajax({url: this.href});
         smf.always(function(data){
             socialMediaFeed.append(data);
             setTimeout(function(){
               $('body').scrollTo(availableHeight, 800, {easing:'linear'});
             },300);
          });
          return false;
       });
    }

});


