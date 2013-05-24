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
  
      sectionMain.css("min-height",WINH);
  
   var o = availableHeight / rows;
   var amargin = (o * 0.10);
   var a = o - amargin;
   var maxwidth = Math.floor(a*3);
   
   
   $(".item-holder").height(a).css({"margin-top":amargin}).zoomTarget({targetsize: 3,closeclick: true});
   $(".door").height(a).width(a*0.58).css({"border-top-left-radius": a*0.58, "border-top-right-radius": a*0.58});

   $(".zoomViewport").width(availableWidth);
   
   // give the palace some values
   palace.height(availableHeight).css("max-width",maxwidth).data({'containerHeight':availableHeight,'menuwidth':menuwidth}).bgSwitcher({element:"div.door"});
   
   
   // $.ajax({url: '/home/countdown/may-29',  
   //        success: function(d) { 
   //           console.log(d)
   //        }, error: function(http, message, exc) { 
   //          console.log(message)
   //    }});

});


