$(function(){
  $(".countdown").countdown({ 
      until: new Date(2013, 6 - 1, 5, 21,0,0), serverSync: serverTime, format:'dHM'}); 

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

         //  $('body').css('background-image', "-webkit-gradient(radial, " + x0 +" " + y0 +", "+ r0 +", "+ x1 +" "+ y1 +", "+ r1 +", from(#575757), to(#FFFFFF))");
          $('.door').css('box-shadow', "inset #ff0000 "+ sx +"px "+ sy + "px " + b+20 + "px");
//          $('h2').css('text-shadow', "rgba(230, 230, 230, 0.7)"+ sx +"px "+ sy + "px " + b + "px");
       //    $('.evento').css('text-shadow', "rgba(210, 5, 28, 0.5)"+ sx +"px "+ sy + "px " + b + "px");
  //         $('svg').css('box-shadow', "#000 "+ sx +"px "+ sy + "px " + b + "px");
      });
      
      
});
