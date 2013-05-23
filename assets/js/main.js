var socialH = 40; // height of social media bar
var menuwidth = 250; // width of menu

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


$(function(){
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
          $('.door.event').css('box-shadow', "inset rgba(255,0,0,1) "+ sx +"px "+ sy + "px ");

      });
      
  var WIN = $(window), WINW = WIN.width(), WINH = WIN.height(),
      DOC = $(document), DOCW = DOC.width(), DOCH = DOC.height(),
      rows = 4,
      columns = 4,
      availableHeight = WINH - socialH;
  
  var palace = $("#palace-grid-holder"),
      sectionMain = $("section#main");
  
  sectionMain.css("min-height",WINH);
  palace.height(availableHeight);
  
  // calculate heights

  // var a = availableHeight * 0.15;
  //   var amargin = (a * 0.10);
  // 
  //   $(".item-holder").height(a).css({"margin-top":amargin});
  //   $(".door").height(a).width(a*0.5).css({"border-top-left-radius": a*0.5, "border-top-right-radius": a*0.5});
  //   palace.css("max-width",a*3);
  
  var o = availableHeight / 4;
   var amargin = (o * 0.10);
   var a = o - amargin;
   $(".item-holder").height(a).css({"margin-top":amargin});
   $(".door").height(a).width(a*0.58).css({"border-top-left-radius": a*0.58, "border-top-right-radius": a*0.58});
   palace.css("max-width",a*3);
   
   $(".door").each(function(i,v){
     //$(this).css({"background-position-x":i,"background-position-y":});
   });
});
