var socialH = 60; // height of social media bar
var menuwidth = 250; // width of menu
var countdownDiv = []; // element to load contents into
var activePage = [];
var currentSelectedMenuItem = [];

// get server time

function serverTime() { 
    var time = null; 
    $.ajax({url: '/home/timer', 
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
        title:"GA Super store"
    });
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var image = '/assets/img/pin0.png';
  var GAmarker = new google.maps.Marker({
      position: new google.maps.LatLng(41.9054485,12.481257700000015),
      map: map,
      icon: image
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
  $("#countdown-holder h1").fitText(0.5);
}

$(function(){
  if (!$.support.transition)
    $.fn.transition = $.fn.animate;
    
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
   socialMediaFeed.css({"top":availableHeight,opacity:0}).show().transition({opacity:1},300);
 
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
     $(this).height(a).css({"margin-top":amargin}).zoomTarget({
            targetsize: 3,
            closeclick: true,
            onanimationcomplete:loadPage, 
            zoomout: function(){console.log('closed');}, // enable mouse over
            onclick: function(){activePage = _s; loadCountdownPage(_ddata.link)} // disable mouse hovers too
      });
   });
   
   $(".door").height(a).width(a*0.58).css({"border-top-left-radius": a*0.58, "border-top-right-radius": a*0.58});

   $(".zoomViewport").width(availableWidth-20);
   
   // give the palace some values
   palace.height(availableHeight+15).css("max-width",maxwidth).data({'containerHeight':availableHeight,'menuwidth':menuwidth}).bgSwitcher({element:"div.door"});
   
   
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
     pageCall = $.ajax({url: l, dataType:"json", data:{w:availableWidth,h:WINH}});
   }

   function loadPage(html){
     
     if(countdownDiv.length < 1){
         countdownDiv = $("<div/>",{"class":"cd-page"}).width(availableWidth).height(WINH).hide();
         countdownDiv.appendTo(sectionPrincipal);
       }else{
         countdownDiv.empty().width(availableWidth).height(WINH).hide();
       }

       pageCall.always(function(data){
         $iframe = $(data.html).find('iframe');
         $iframe.width(availableWidth).height(WINH);
         console.log($iframe)
          countdownDiv.html(data.html).delay(500).show();
       });
   }
   
   
   $("body").keyup(function(e){ 
       var code = e.which; // recommended to use e.which, it's normalized across browsers
       if(code==13)e.preventDefault();
       if(code==32||code==13||code==188||code==186){
           console.log($(this).val());
           countdownDiv.hide();
           activePage.zoomTargetOut();
       } // missing closing if brace
   });
   
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
 $(".royalSlider.rsUni").royalSlider({
       	// general options go gere
       	loop:true,
       	autoHeight:false,
       	imageAlignCenter:true,
       	imageScaleMode: 'fit',
       	autoScaleSlider: false,
       	keyboardNavEnabled: true,
           fullscreen: {
           enabled: true,
           nativeFS: true
           },
           controlNavigation: 'thumbnails',
           thumbs: {
               		// thumbnails options go gere
               		spacing: 10,
               		arrowsAutoHide: true,
               		orientation: 'vertical',
                  paddingBottom: 4,
                  appendSpan: true
                  },
            transitionType:'fade',
            deeplinking: {
                		// deep linking options go gere
                		enabled: true,
                		prefix: 'slider-'
                	}
       });  
});


