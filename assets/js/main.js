var socialH = 40; // height of social media bar
var menuwidth = 250; // width of menu
var countdownDiv = []; // element to load contents into

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
    zoom: 14,
    center: new google.maps.LatLng(41.890519800000000000, 12.494248599999992000),
    mapTypeId: google.maps.MapTypeId.SATELLITE
  }
  if($('#map-canvas').length > 0){
    
    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(41.898552400000000000,12.473210999999992000),
        title:"GA Super store"
    });
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    // To add the marker to the map, call setMap();
    marker.setMap(map);
  }
}

function loadMapMain() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyAtiEkSR9a6K2Ih-avv8Meu_N8SpEgOK9g&sensor=true&callback=loadMaps";
  document.body.appendChild(script);
}

window.onload = loadMapMain;

$(function(){
  if (!$.support.transition)
    $.fn.transition = $.fn.animate;
    
  $(".countdown").countdown({ 
      until: new Date(2013, 6 - 1, 5, 21,0,0), serverSync: serverTime, format:'dHM'});   
  
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
      sectionPrincipal = $("section.principal",sectionMain);
  
      sectionMain.css("min-height",WINH);
  
   var o = availableHeight / rows;
   var amargin = (o * 0.10);
   var a = o - amargin;
   var maxwidth = Math.floor(a*3);
   
   if(PageAttr.ShowBottomMenu != undefined && !PageAttr.ShowBottomMenu)
   sectionPrincipal.height(WINH).width(availableWidth);
   
   $(".item-holder").each(function(i,v){
     var _s = $(this), _d = $('.door',_s), _ddata = _d.data();
     $(this).height(a).css({"margin-top":amargin}).zoomTarget({targetsize: 3,closeclick: true, animationendcallback: loadPage, onclick: function(){loadCountdownPage(_ddata.link)}});
   });
   
   $(".door").height(a).width(a*0.58).css({"border-top-left-radius": a*0.58, "border-top-right-radius": a*0.58});

   $(".zoomViewport").width(availableWidth-20);
   
   // give the palace some values
   palace.height(availableHeight+15).css("max-width",maxwidth).data({'containerHeight':availableHeight,'menuwidth':menuwidth}).bgSwitcher({element:"div.door"});
   
   
   $(document).pjax('[data-pjax] a', '#main section.principal');
   
   $(document).on('pjax:complete', function() {
     console.log('done loading')
   })
   
   var pageCall;
   
   function loadCountdownPage(l){
     pageCall = $.ajax({url: l, dataType:"json"});
   }

   function loadPage(html){
     
     if(countdownDiv.length < 1){
         countdownDiv = $("<div/>",{"class":"cd-page"}).width(availableWidth).height(WINH).hide();
         countdownDiv.appendTo(sectionPrincipal);
       }else{
         countdownDiv.empty().width(availableWidth).height(WINH).hide();
       }

       pageCall.always(function(data){
          countdownDiv.html(data.html).delay(500).show();
       });
   }
   
   function showPage(){
     //countdownDiv.show();
   }
});


