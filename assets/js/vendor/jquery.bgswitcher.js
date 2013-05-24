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
            itemCount = items.length;
            
            
            // without this is internal function
            function executeCallBack(f){
              if(typeof f == 'function') f.apply();
            }
            
            
            function createHover(ele){
              var _s = $(ele.currentTarget);
              
              if(!_s.data('bgcached')){
                $.imgpreload(_s.data('bgImage'),function()
                 {
                     _s.data({'bgdimens':$(this).data('attrs'), "bgcached":true}).trigger('bgcomplete');
                 });
              }else{
                // call animation of bg image and load for all
                items.trigger('bgset',[_s]);
              }
            }
            
            function calculateBackground(ele){
              var _s = $(ele.currentTarget), _d = _s.data();
              
              var bgprop = _d.bgdimens.width / _d.bgdimens.height;
              var bgwidth = Math.ceil(scopeData.containerHeight * bgprop);
              var bgorigin = (Math.abs(scopeData.containerHeight - bgwidth) / 2);
              _s.data({"bgprop":bgprop,"bgwidth":bgwidth,"bgorigin":bgorigin});
              
              // call animation of bg image and load for all
              items.trigger('bgset',[_s]);
            
            }
            
            function setCurrentBackground(ele,activeObject){
              var _s = $(ele.currentTarget), _d = activeObject.data(), offset = _s.offset();
              console.log(offset)
                  _s.css({
                            "background-image":"url("+_d.bgImage+")",
                            "background-size": _d.bgwidth+"px "+ scopeData.containerHeight +"px",
                            "background-position": ((_d.bgorigin+(winWidth - scopeData.containerHeight))-offset.left) + "px "+ (-offset.top) +"px"
                        });
                              
            }
            // start all calls here !!!

            items.each(function(i,v){
              var _s = $(this);
              
              _s.on("mouseenter", createHover);
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