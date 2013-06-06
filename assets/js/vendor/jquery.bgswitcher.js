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
            internalDoors = [],
            isOver = false,
            isAnimating = false,
            isHoverAble = true,
            globalHoverShowing = false,
            doorsShowing = true,
            activeItem = [],
            lastHoverChild = [],
            activeHoverChild = [],
            globalHoverContainerInternal = $("<div/>",{'id':'globalHoverContainer-internal'}),
            globalHoverContainer = $("<div/>",{"id":"globalHoverContainer"})
                                    .height(280).width(scopeData.containerWidth).css({opacity:0,"top":(winHeight/2)- ((winHeight/2.5)/2)})
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
              return isHoverAble;
            }
            
            function isGlobalHoverShowing(){
              return globalHoverShowing;
            }
            
            function isDoorsShowing(){
              return doorsShowing;
            }
            
            function createHover(ele){
              var _s = $(ele.currentTarget);
              
              if(testHoverAble()){
              isOver = true;
              activeItem = _s;
              
              if(!_s.data('bgcached')){
                $.imgpreload(_s.data('bgImage'),function()
                 {
                     items.trigger('setLoader');
                     _s.data({'bgdimens':$(this).data('attrs'), "bgcached":true}).trigger('bgcomplete');
                 });
              }else{
                // call animation of bg image and load for all
                items.trigger('bgset',[_s]);
              }
              
              if(!isGlobalHoverShowing()){
                globalHoverContainer.show().delay(400).transition({opacity:options.hoverOpacity},700,function(){});
                globalHoverShowing = true;
              }

              if(activeHoverChild.length > 0) activeHoverChild.hide();
              if(lastHoverChild.length > 0) lastHoverChild.hide();
              
              activeHoverChild = _s.data('hoverRef');
              activeHoverChild.show();
            }
              
            }
            
            function removeHover(ele){
              
            isOver = false;
            setTimeout(function(){
                              if(!testTime()){
                                 items.trigger('bghide');
                                 globalHoverContainer.delay(0).transition({opacity:0},500,function(){
                                   globalHoverContainer.hide();
                                   globalHoverShowing = false;
                                 });
           
                                 if(activeHoverChild.length > 0) activeHoverChild.hide();
                                 if(lastHoverChild.length > 0) lastHoverChild.hide();
                                 lastHoverChild = [];
                                 activeHoverChild = [];
                              }
              },300);
            }
            
            function calculateBackground(ele){
              var _s = $(ele.currentTarget), _d = _s.data();
              
              var bgprop, bgwidth, bgheight = scopeData.containerHeight, bgorigin;

                  
              bgwidth  = (bgheight / _d.bgdimens.height) * _d.bgdimens.width;
              //bgorigin = (Math.abs((winWidth - scopeData.menuwidth) - bgwidth) / 2);
              bgorigin = ((winWidth/2) - (bgwidth/2)) + scopeData.menuwidth;
                      
              _s.data({"bgprop":bgprop,"bgwidth":bgwidth,"bgorigin":bgorigin});
              
              // call animation of bg image and load for all
              if(!testAnimating()) items.trigger('bgset',[_s]);
            
            }
            
            function setCurrentBackground(ele,activeObject){
              var _s = $(ele.currentTarget), _d = activeObject.data(), offset = _s.parent().offset();
              items.trigger('removeLoader');                           
              _s.css({
                "background-image":"url("+_d.bgImage+")",
                "background-size": _d.bgwidth+"px "+ scopeData.containerHeight +"px",
                "background-position": (scope.offset().left - offset.left) + "px "+ (-offset.top) +"px"
              });



              var _c = $('.cover',_s);
              if(_c.is(":visible")){
                _c.transition({opacity:0},500,function(){});
              }

              _s.data('dateEle').hide();
              if(items.index(_s) == itemCount-1){
                // last animation
                // bbroadcast even listener here
                changeDateMessage(_d,activeObject);
              }        
            }
            
            function changeDateMessage(d,ao){
              d.dateEle.addClass('active').text(d.hovertype).show();
            }
            
            function changeDateMessageBack(ele){
              var _s = $(ele.currentTarget);
              var _d = _s.data();
                _d.dateEle.removeClass('active').text(_d.originalText).show();
            }

            
            function hideBackground(ele){
              var _s = $(ele.currentTarget);
              
              var _c = $('.cover',_s);
              
              activeItem = [];
              isAnimating = true;
          
              if(items.index(_s) == itemCount-1){
                // broadcast complete event
                items.trigger('resetDate');
              }
              
              _c.transition({opacity:1},500,function(){
                 _s.css({
                            "background-image":"none"
                        });
              });
             
            }
            
            function removeLoader(ele){
              var _s = $(ele.currentTarget), _c = $('.cover',_s);
              _c.transition({opacity:0},500,function(){
                
              });
              _c.removeClass('loading');
            }
            
            function setLoader(ele){
              var _s = $(ele.currentTarget), _c = $('.cover',_s);
              _c.transition({opacity:1},500,function(){
                
              });
              _c.addClass('loading');
            }
            
            // start all calls here !!!

            items.each(function(i,v){
              var _s = $(this);
              
              var localContent = $('<div/>',{"class":"internal-hover"}).append(
                $('<h1/>').text($(this).data('hovertitle')),
                $('<h3/>').text($(this).data('hoversubtitle'))
                ).appendTo(globalHoverContainerInternal).hide();
              
              var dateEl = _s.children('div.date');
              _s.data({"hoverRef":localContent, "dateEle":dateEl, 'originalText':dateEl.text()});
              
              var internalDoor = $('<div/>').addClass('cover door').css({opacity:1});
              var internalHover = $('<div/>').addClass('controller').css({opacity:0});
              _s.append(internalDoor,internalHover);
              internalDoors.push(internalDoor);
              
              _s.on("mouseenter", createHover);
              _s.on("mouseleave", removeHover);
              _s.on("bghide", hideBackground);
              _s.on("bgcomplete", calculateBackground);
              _s.on("bgset", setCurrentBackground);
              _s.on("resetDate", changeDateMessageBack);
              _s.on("setLoader", setLoader);
              _s.on("removeLoader", removeLoader);
            
              // add mouse click
            });
            
            // add main hover over to parent container
            globalHoverContainer.appendTo(scope.parent());
            globalHoverContainer.on("mouseenter",takeHoverControl);
            globalHoverContainer.on("mouseleave",releaseHoverControl);            
          
          
          function takeHoverControl(e){
            //_global.disableHover();
          }
          
          function releaseHoverControl(e){
           // _global.enableHover();
           // if(activeItem.length > 0) activeItem.trigger('mouseleave');
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