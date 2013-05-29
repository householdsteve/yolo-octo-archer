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
        var $el = $(el), $win = $(window), winWidth = $win.width(), winHeight = $win.height();
    
        //Defaults to extend options
        var defaults = {
            callback: function(){}, 		// empty function 
            startfrom: 0,
            hoverOpacity: 0.7
     	};  
        
        //Extend those options
        var options = $.extend(defaults, opts); 

        
// ==============
// ! SETUP   
// ==============
        
            //Global Variables
        var _global = this,
            scope = $el,
            scopeData = scope.data(),
            items = $(options.element,scope),
            itemCount = items.length,
            isOver = false,
            isAnimating = false,
            isHoverAble = true,
            activeItem = [],
            lastHoverChild = [],
            activeHoverChild = [],
            globalHoverContainerInternal = $("<div/>",{'id':'globalHoverContainer-internal'}),
            globalHoverContainer = $("<div/>",{"id":"globalHoverContainer"})
                                    .height(winHeight/2.5).width(scopeData.containerWidth).css({opacity:0,"top":(winHeight/2)- ((winHeight/2.5)/2)})
                                    .append(globalHoverContainerInternal).hide();
            
            
            
            // without this is internal function
            function executeCallBack(f){
              if(typeof f == 'function') f.apply();
            }
            
            function testTime(){
              return isOver;
            }
            
            function testAnimating(){
              return isAnimating;
            }
            
            function testHoverAble(){
              console.log(isHoverAble)
              return isHoverAble;
            }
            
            function createHover(ele){
              var _s = $(ele.currentTarget);
              
              if(testHoverAble()){
              isOver = true;
              activeItem = _s;
              
              if(!_s.data('bgcached')){
                $.imgpreload(_s.data('bgImage'),function()
                 {
                     
                     _s.data({'bgdimens':$(this).data('attrs'), "bgcached":true}).trigger('bgcomplete');
                 });
              }else{
                // call animation of bg image and load for all
                if(!testAnimating()) items.trigger('bgset',[_s]);
              }
              
              globalHoverContainer.show().delay(400).transition({opacity:options.hoverOpacity},700,function(){}); 
              if(activeHoverChild.length > 0) activeHoverChild.hide();
              activeHoverChild = _s.data('hoverRef');
              activeHoverChild.show();
            }
              
            }
            
            function removeHover(ele){
              setTimeout(function(){
              if(testHoverAble()){
              isOver = false;
              lastHoverChild = activeHoverChild;
              if(lastHoverChild.length > 0) lastHoverChild.hide();
              
                 setTimeout(function(){
                 if(!testTime()){
                      items.trigger('bghide');
                      globalHoverContainer.delay(0).transition({opacity:0},500,function(){globalHoverContainer.hide()});
                      if(activeHoverChild.length > 0) activeHoverChild.hide();
                      if(lastHoverChild.length > 0) lastHoverChild.hide();
                      lastHoverChild = [];
                      activeHoverChild = []
                   }
                  },300);
               }
              },10);
            }
            
            function calculateBackground(ele){
              var _s = $(ele.currentTarget), _d = _s.data();
              
              var bgprop, bgwidth, bgheight = scopeData.containerHeight, bgorigin;

                  
              bgwidth  = (bgheight / _d.bgdimens.height) * _d.bgdimens.width;
              bgorigin = (Math.abs((winWidth - scopeData.menuwidth) - bgwidth) / 2);
                      
              _s.data({"bgprop":bgprop,"bgwidth":bgwidth,"bgorigin":bgorigin});
              
              // call animation of bg image and load for all
              if(!testAnimating()) items.trigger('bgset',[_s]);
            
            }
            
            function setCurrentBackground(ele,activeObject){
              var _s = $(ele.currentTarget), _d = activeObject.data(), offset = _s.offset();
                  _s.css({
                            "background-image":"url("+_d.bgImage+")",
                            "background-size": _d.bgwidth+"px "+ scopeData.containerHeight +"px",
                            "background-position": ((_d.bgorigin+(scopeData.menuwidth))-offset.left) + "px "+ (-offset.top) +"px"
                        });
                  var _c = $('.cover',_s);
                  _c.transition({opacity:0},500,function(){});
                  _s.data('dateEle').hide();
                  _d.dateEle.show();          
            }
            
            function hideBackground(ele){
              var _s = $(ele.currentTarget);
              
              var _c = $('.cover',_s);
              activeItem = [];
              isAnimating = false;
          
              
              _c.transition({opacity:1},500,function(){
                 _s.css({
                            "background-image":"none",
                        });
                _s.data('dateEle').show();
                  if(activeItem.length > 0){
                    console.log('hover still availabe');
                    isAnimating = false;
                    //items.trigger('bgset',[activeItem]);
                  }
              });
             
            }
            // start all calls here !!!

            items.each(function(i,v){
              var _s = $(this);
              
              var localContent = $('<div/>',{"class":"internal-hover"}).append(
                $('<h1/>').text($(this).data('hovertitle')),
                $('<h3/>').text($(this).data('hoversubtitle')),
                $('<small/>').text($(this).data('hovertype'))
                ).appendTo(globalHoverContainerInternal).hide();
                
              _s.data({"hoverRef":localContent, "dateEle":_s.children('div.date')});
              _s.append($('<div/>').addClass('cover door').css({opacity:1}));
              
              _s.on("mouseenter", createHover);
              _s.on("mouseleave", removeHover);
              _s.on("bghide", hideBackground);
              _s.on("bgcomplete", calculateBackground);
              _s.on("bgset", setCurrentBackground);
            
              // add mouse click
            });
            
            // add main hover over to parent container
            globalHoverContainer.appendTo(scope.parent());
            globalHoverContainer.on("mouseenter",takeHoverControl);
            globalHoverContainer.on("mouseleave",releaseHoverControl);            
          
          
          function takeHoverControl(e){
            console.log(isHoverAble)
            _global.disableHover();
          }
          
          function releaseHoverControl(e){
            _global.enableHover();
            if(activeItem.length > 0) activeItem.trigger('mouseleave');
          }
          
          // this functions are available via data api
          this.disableHover = function(){
            isHoverAble = false;
          }
          
          this.enableHover = function(){
            isHoverAble = true;
          }
            
            
            $el.data('bgSwitcher', this);
            
        } // end constructor
        
        $.fn.bgSwitcher = function(options) {
          return this.each(function(){
                   (new bgSwitcher(this,options));
          });
        }
    
})(jQuery);