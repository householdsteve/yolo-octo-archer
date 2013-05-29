/**
 * Little Ul Carousel.
 * Copyright (c) 2012 Steven McCrumb
 * Dual licensed under MIT and GPL.
 * Date: 7/1/2012
 * @author Steven McCrumb
 * @version 0.0.1
 *
 * http://stevenmccrumb.com
 */

(function($) {
    var bgSwitcher = function(el,opts){
        var $el = $(el), $win = $(window), winWidth = $win.width();
    
        //Defaults to extend options
        var defaults = {
            callback: function(){}, 		// empty function 
            startfrom: 0
     	};  
        
        //Extend those options
        var options = $.extend(defaults, opts); 

        
// ==============
// ! SETUP   
// ==============
        
            //Global Variables
        var _global = this,
            scope = $el,
            scopeData = scope.data();
            items = $(options.element,scope),
            itemCount = items.length,
            isOver = false,
            activeItem = [];
            
            
            // without this is internal function
            function executeCallBack(f){
              if(typeof f == 'function') f.apply();
            }
            
            
            function createHover(ele){
              var _s = $(ele.currentTarget);
              
              isOver = true;
              activeItem = _s;
              
              if(!_s.data('bgcached')){
                $.imgpreload(_s.data('bgImage'),function()
                 {
                     _s.data({'bgdimens':$(this).data('attrs'), "bgcached":true}).trigger('bgcomplete');
                 });
              }else{
                // call animation of bg image and load for all
                items.trigger('bgset',[_s]);
              }
              console.log(activeItem)
            }
            
            function removeHover(ele){
              isOver = false;
              //setTimeout(function(){
                //if(!testTime()){
                  items.trigger('bghide');
              //  }
             // },300);
              
            }
            
            function testTime(){
              return isOver;
            }
            
            function calculateBackground(ele){
              var _s = $(ele.currentTarget), _d = _s.data();
              
              var bgprop, bgwidth, bgheight = scopeData.containerHeight, bgorigin;

                  
              bgwidth  = (bgheight / _d.bgdimens.height) * _d.bgdimens.width;
              bgorigin = (Math.abs((winWidth - scopeData.menuwidth) - bgwidth) / 2);
                      
              _s.data({"bgprop":bgprop,"bgwidth":bgwidth,"bgorigin":bgorigin});
              
              // call animation of bg image and load for all
              items.trigger('bgset',[_s]);
            
            }
            
            function setCurrentBackground(ele,activeObject){
              var _s = $(ele.currentTarget), _d = activeObject.data(), offset = _s.offset();
                  _s.css({
                            "background-image":"url("+_d.bgImage+")",
                            "background-size": _d.bgwidth+"px "+ scopeData.containerHeight +"px",
                            "background-position": ((_d.bgorigin+(scopeData.menuwidth))-offset.left) + "px "+ (-offset.top) +"px"
                        });
                  var _c = $('.cover',_s);
                  _c.transition({opacity:0},300,function(){});           
            }
            
            function hideBackground(ele){
              var _s = $(ele.currentTarget);
              
              var _c = $('.cover',_s);
              activeItem = [];
              _c.transition({opacity:1},300,function(){
                 _s.css({
                            "background-image":"none",
                        });
                  if(activeItem.length > 0){
                    console.log('hover still availabe')
                    items.trigger('bgset',[activeItem]);
                  }
              });
             
            }
            // start all calls here !!!

            items.each(function(i,v){
              var _s = $(this);
              _s.append($('<div/>').addClass('cover door').css({opacity:1}));
              
              _s.on("mouseenter", createHover);
              _s.on("mouseleave", removeHover);
              _s.on("bghide", hideBackground);
              _s.on("bgcomplete", calculateBackground);
              _s.on("bgset", setCurrentBackground);
            
              // add mouse click
            });
          
          
          // this functions are available via data api
          this.doSOmething = function(){
            
          }
            
            
            $el.data('bgSwitcher', this);
            
        } // end constructor
        
        $.fn.bgSwitcher = function(options) {
          return this.each(function(){
                   (new bgSwitcher(this,options));
          });
        }
    
})(jQuery);