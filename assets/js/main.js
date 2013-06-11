var socialH = 60; // height of social media bar
var menuwidth = 250; // width of menu
var countdownDiv = []; // element to load contents into
var countdownContent = [];
var countdownClose = [];
var activePage = [];
var currentSelectedMenuItem = [];
var isInternetExplorer = false;
var bgImagesPreload = [PageAttr.baseUrl+'assets/img/GA-logo100x100.png'];
var zoomViewport;
var offsetTime = -1;
var WIN,
    WINW,
    DOC,
    rows,
    columns,
    availableHeight,
    availableWidth,
    advise,
    spinner,
    loadHolder,
    additionalContent = [],
    palace,
    sectionMain,
    sectionPrincipal,
    socialMediaFeed,
    moreFromRome;
    
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

function checkOffsetTime(){
  return offsetTime;
}

function timeOffset() { 
    var call = $.ajax({url: PageAttr.baseUrl+'home/timer', dataType:"json"});
    call.always(function(data,textStatus,errorThrown){
         var localOffset = (data.timer/60)/60; // in hours
         var n = new Date();
         n = ((n.getTimezoneOffset()/60) + localOffset) * 60; // get difference in minutes
         offsetTime = n;
         internalCountdown();
      });
}

function serverTime() {
  if(checkOffsetTime() > -1){
    var time = null; 
        time = new Date(); 
        time.setMinutes(time.getMinutes() + offsetTime);
        time.setSeconds(time.getSeconds() + 167);
        return time;
    }else{
        return new Date();
    }
    
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
	
	var contentString = '<div id="content" style="overflow:hidden !important;">'+
      '<div id="siteNotice"style="overflow:hidden !important;">'+
      '</div>'+
      // '<h1 id="firstHeading" class="firstHeading">Giorgio Armani Boutique</h1>'+
      '<div id="bodyContent" style="height:80px;width:300px; text-align:center; padding-top:20px;max-width:300px;overflow:hidden !important;">'+ '<img src="'+PageAttr.baseUrl+'assets/img/ga-logo.png" width="247" height="37" alt="GIORGIO ARMANI">' +
      '<p>Via Condotti 77-79 • Rome</p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });
	
	  infowindow.open(map,GAmarker);
  }
}

function loadMapMain() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAtiEkSR9a6K2Ih-avv8Meu_N8SpEgOK9g&sensor=true&callback=loadMaps";
  document.body.appendChild(script);
}

window.onload = loadMapMain;

function ajaxifyGoogleAnalytics(url){
  _gaq.push(['_trackPageview', url]);
}

function delegateSubActions(atag){
  var parts = atag.href.split("/");
  var compare = parts[parts.length-2]+"/"+parts[parts.length-1];
  switch(compare){
    case "events/rome":
      //internalCountdown();
      WIN.trigger('resize');
    break;
    case "events/london":
    case "events/beijing":
    case "events/tokyo":        
      activateInternalGalleries();
    break;
  }
  ajaxifyGoogleAnalytics('/'+compare);
}

function callCountdownScripts(e){
  var parts = e.url.split("/");
    var compare = parts[parts.length-1].split('?')[0];
    switch(compare){
      case "june-4":
        interviewTexts();
      break;
      case "june-6":
        activateInternalGalleries();
      break;
      case "june-11":
        activateInternalGalleries();
      break;
  }
    ajaxifyGoogleAnalytics('/'+parts[parts.length-2]+"/"+parts[parts.length-1]);
}

function activateInternalGalleries(){
  $(".royalSlider.rsDefault").royalSlider({
       loop:true,
       imageAlignCenter:true,
       imageScaleMode: 'fit',
       autoScaleSlider: false,
       arrowsNavHideOnTouch: false,
       arrowsNavAutoHide:true,
       arrowsNav:true,
       width:'100%',height:'600px',
       autoScaleSlider:!0,autoScaleSliderWidth:400,autoScaleSliderHeight:600,slidesSpacing:0,
       autoPlay: {
           		// autoplay options go gere
           		enabled: true,
           		pauseOnHover: true
       }
    });
    
  $(".royalSlider.rsMoreFromRome").royalSlider({
       loop:true,
       imageAlignCenter:true,
       imageScaleMode: 'fit',
       autoScaleSlider: true,
       arrowsNavHideOnTouch: false,
       arrowsNavAutoHide:true,
       arrowsNav:true,
       width:'100%',height:'100%',
       autoScaleSlider:true,autoScaleSliderWidth:1200,
       autoScaleSliderHeight:500,slidesSpacing:0,
       imgHeight:570,
       autoPlay: {
           		// autoplay options go gere
           		enabled: true,
           		pauseOnHover: true
       },
       visibleNearby: {
                   enabled: true,
                   centerArea: 0.5,
                   center: false,
                   breakpoint: availableWidth/2,
                   breakpointCenterArea: 0.64,
                   navigateByCenterClick: true
               }
    });
    
    $(".royalSlider.rsMoreBoutique").royalSlider({
         loop:true,
         imageAlignCenter:true,
         imageScaleMode: 'fit',
         autoScaleSlider: true,
         arrowsNavHideOnTouch: false,
         arrowsNavAutoHide:true,
         arrowsNav:true,
         width:'100%',height:'100%',
         autoScaleSlider:true,autoScaleSliderWidth:1200,
         autoScaleSliderHeight:800,slidesSpacing:0,
         imgHeight:770,
         autoPlay: {
             		// autoplay options go gere
             		enabled: true,
             		pauseOnHover: true
         },
         visibleNearby: {
                     enabled: true,
                     centerArea: 0.8,
                     center: false,
                     breakpoint: availableWidth/2,
                     breakpointCenterArea: 0.64,
                     navigateByCenterClick: true
                 }
      });
    
    $(".royalSlider.rsEvent").royalSlider({
         loop:true,
         imageAlignCenter:true,
         imageScaleMode: 'fit',
         autoScaleSlider: true,
         arrowsNavHideOnTouch: false,
         arrowsNavAutoHide:true,
         arrowsNav:true,
         width:'100%',height:'100%',
         autoScaleSlider:true,autoScaleSliderWidth:1200,
         autoScaleSliderHeight:500,slidesSpacing:0,
         imgHeight:570,
         autoPlay: {
             		// autoplay options go gere
             		enabled: true,
             		pauseOnHover: true
         },
         visibleNearby: {
                     enabled: true,
                     centerArea: 0.5,
                     center: false,
                     breakpoint: availableWidth/2,
                     breakpointCenterArea: 0.64,
                     navigateByCenterClick: true
                 }
      });
    
}

function interviewTexts(){
  $(".question-content a",sectionPrincipal).on("click",function(e){
    $(".question-content",sectionPrincipal).hide();
    var _s = $(".question-content[data-lang="+$(this).text()+"]",sectionPrincipal).show();
    return false;
  });
}

function internalCountdown(){
  //$("nav h1").css({"opacity":0}).show().transition({"opacity":1},300);
  $(".countdown").countdown({until: new Date(2013, 6 - 1, 5, 21,0,0), serverSync: serverTime, format:'HMS'});
  $(".countdown-internal").countdown({until: new Date(2013, 6 - 1, 5, 21,0,0), serverSync: serverTime, format:'dHMS'});
  $("#countdown-holder h1").fitText(0.8);
}

function loadAdditionalContent(e){
  if(additionalContent.length < 1){
    additionalContent = $('<section/>',{"class":"additional",id:"additional-content"});
    additionalContent.width(availableWidth).css({"left":WINW,"top":-sectionPrincipal.height()}).appendTo(sectionMain);
    var mfr = $.ajax({url: e.currentTarget.href});
       mfr.always(function(data){
          delegateSubActions({href:e.currentTarget.href});
          additionalContent.html(data);
          var b = $("#back-to-count a").click(removeAdditional);
          activateInternalGalleries();
          moveBodyContent();
       });
     }else{
      moveBodyContent();
     }
  return false;
}

function moveBodyContent(){
  //$('html').css({"overflow-x":"hidden"});
  additionalContent.show();
  sectionMain.css({'left':sectionMain.offset().left}).transition({"left":-availableWidth},800,function(){
    //$('html').css({"overflow-x":"auto"});
  });
}

function removeAdditional(){
  sectionMain.transition({"left":0},800,function(){
    additionalContent.hide();
  });
  return false;
}

function windowListenerEvents(){
  var currentHeight = WIN.height(), currentWidth = WIN.width();

  $("#frame1").height(currentHeight);
}

function windowScrollEvents(){
  var e = $(window).scrollTop();
  // call events here if needed
}

$(function(){
    // dfault setup for cs3 animations
    if (!$.support.transition) $.fn.transition = $.fn.animate;
    
    // check for internet explorer  
    if($('html').hasClass('lt-ie9')) isInternetExplorer = true;
    
    // set up basic vars and cache elements
    WIN = $(window);
    WINW = WIN.width(), WINH = WIN.height(),
    DOC = $(document), DOCW = DOC.width(), DOCH = DOC.height(),
    rows = 4,
    columns = 4,
    availableHeight = WINH - (socialH*2)
    availableWidth = WINW - menuwidth;

    palace = $("#palace-grid-holder"),
    sectionMain = $("section#main");
    sectionPrincipal = $("section.principal",sectionMain),
    socialMediaFeed = $("#social-media-feed"),
    moreFromRome = $("#more-from-rome");

     var o = availableHeight / rows,
         amargin = (o * 0.10),
         a = o - amargin,
         maxwidth = Math.floor(a*3);
         
         // get top margin back
         availableHeight = availableHeight + amargin;
     
  // add window listeners
  WIN.on('resize',windowListenerEvents);
  //WIN.on('scroll',windowScrollEvents);
  WIN.trigger('resize');
  
  if(!PageAttr.hideTimer)  timeOffset();
  
  if(checkInternetExplorer()){
    if($("#frame1").length){
      var _s = $("#frame1"), srcfr = _s.attr('src');
      _s.remove();
      $("<iframe/>",{"id":"frame1","src":srcfr}).height(WINH).width("100%").appendTo($("#live-streaming"));
      WIN.trigger('resize');
    }
  }
  
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

      $('.door:not(.event)').css('box-shadow', "inset rgba(65,65,65,0.5) "+ sx +"px "+ sy + "px " + b+20 + "px");
      $('.door.event, .door.event .door').css('box-shadow', "inset rgba(255,0,0,1) "+ sx +"px "+ sy + "px ");

  });
   
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
     var _s = $(this), _d = $('.door',_s), _ddata = _d.data(), _over = _s.hasClass('override');
     _s.height(a).css({"margin-top":amargin});
     if(_over && Modernizr.touch){
       _s.on("click",function(e){
         window.location = PageAttr.baseUrl+_ddata.link;
       });
     }else if(_over && _d.hasClass('event')){
       _s.on("click",function(e){
          window.location = PageAttr.baseUrl+_ddata.link;
        });
     }else if(!checkInternetExplorer() && _ddata.contentAvailable){
       _s.zoomTarget({
              targetsize: 3,
              closeclick: true,
              onanimationcomplete:loadPage, 
              zoomout: function(){ zoomViewport.show(); }, // enable mouse over
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

   zoomViewport = $(".zoomViewport").width(availableWidth-3);
   
   // do some fading in:
   $('nav#mainnav').delay(300).transition({left:0},700);
   
   // give the palace some values
   palace.hide().height(availableHeight+15).css({"opacity":0,"max-width":maxwidth}).data({'containerHeight':WINH - socialH,'containerWidth':availableWidth,'menuwidth':menuwidth}).bgSwitcher({"element":"div.door"});
   
   //contentEnabled
   loadHolder = $("<div/>",{id:"loader"});
   loadHolder.appendTo($('body'));
   loadHolder.spin(opts);


   $( ":data(content-enabled)", palace).each(function() {
    var _dbgimg = $( this ).data('bgImage');
    //if($.inArray(_dbgimg,bgImagesPreload) == -1)  bgImagesPreload.push(_dbgimg);
   });
  
   
   if(!$('body').hasClass('waiting')){
     $.imgpreload(bgImagesPreload,function()
      {         // check for success with: $(this[i]).data('loaded')
       loadHolder.css({opacity:1}).transition({opacity:0},300,function(){ loadHolder.hide().spin(false) });
       //loadHolder.data("spinner").stop();
       palace.show().transition({opacity:1},700);
       socialMediaFeed.css({top:WINH - socialH, opacity:0}).width(availableWidth-3).show().transition({opacity:1},500);
       moreFromRome.css({opacity:0}).height(socialH - amargin).show().delay(400).transition({opacity:1},500);
      });
    }
   
   $("a.mfr",moreFromRome).on("click",loadAdditionalContent);
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
     
      pageCall.done(function(data){
        loadHolder.css({opacity:1}).show().spin(opts);
      });
   }

   function loadPage(html){
     
     if(countdownDiv.length < 1){
         countdownDiv = $("<div/>",{"class":"cd-page"}).width(availableWidth).hide();
         countdownContent = $("<div/>",{"class":"cd-content"});
         countdownClose = $("<div/>",{"class":"cd-close fixed"}).text('X').css({"opacity":0.5});
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
         countdownDiv.width(availableWidth).hide();
       }

       pageCall.always(function(data){
          countdownContent.html(data.html);
          countdownDiv.delay(200).css({opacity:0}).show().transition({opacity:1},500);
          countdownDiv.height(countdownContent.outerHeight());
          callCountdownScripts(this);
          loadHolder.hide().spin(false);
          zoomViewport.hide();
       });
   }
   
   if(!checkInternetExplorer()){
       socialMediaFeed.find('a').click(function(e){
         var smf = $.ajax({url: this.href}), lhref = this.href;
         var c = $('span',$(this));
         c.css({"position":"fixed",top:c.offset().top, left:c.offset().left,"z-index":9999})
         smf.always(function(data){
             var parts = lhref.split("/");
             ajaxifyGoogleAnalytics("/"+parts[parts.length-1]);
             
             socialMediaFeed.append(data);
             $(".social.content p").fitText(1.85);
             setTimeout(function(){
               $('body').scrollTo(availableHeight, 800, {easing:'linear'});
               $('.row-fluid-social').waypoint('infinite',{
                 onBeforePageLoad: function(){
                   $.extend(true,opts,{"shadow":true,"color":"#fff"});
                   loadHolder.css({opacity:1}).show().spin(opts);
                 },
                 onAfterPageLoad: function(){
                   $.extend(true,opts,{"shadow":false,"color":"#000"});
                   loadHolder.hide().spin(false); $(".social.content p").fitText(1.85);
                 }
               });
               $(".social.content h3").fitText(1.5);
               $(".social.content p").fitText(1.5);
             },300);
          });
          return false;
       });
    }else{
      var special = $(".row-fluid-social");
      $('.span12:even').find('.span3:even').addClass('white');
      $('.span12:even').find('.span3:odd').addClass('black')
      $('.span12:odd').find('.span3:odd').addClass('white');
      $('.span12:odd').find('.span3:even').addClass('black');
    }
    
  setTimeout(function() { $(".cd-content",sectionMain).height(WINH) },200);
  
  activateInternalGalleries();
  interviewTexts();
  
  if($('.row-fluid-social').length > 0){
  $(".social.content h3").fitText(1.5);
  $(".social.content p").fitText(1.85);
  $('.row-fluid-social').waypoint('infinite',{
     onBeforePageLoad: function(){
        $.extend(true,opts,{"shadow":true,"color":"#fff"});
        loadHolder.css({opacity:1}).show().spin(opts);
      },
      onAfterPageLoad: function(){
        $.extend(true,opts,{"shadow":false,"color":"#000"});
        loadHolder.hide().spin(false); $(".social.content p").fitText(1.85);
      }
   });
 }
});
