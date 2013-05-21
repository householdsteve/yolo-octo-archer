$( function(){
  
  if (Modernizr.touch){
     // bind to touchstart, touchmove, etc and watch `event.streamId`
     $(".royalSlider.rsUni").royalSlider({
        	// general options go gere
        	loop:true,
        	autoHeight:false,
        	imageAlignCenter:true,
        	imageScaleMode: 'fit',
        	autoScaleSlider: false,
        	arrowsNavHideOnTouch: true,
          //slidesOrientation:'vertical',
            visibleNearby: {
                enabled: true,
                centerArea: 0.7,
                center: true,
                breakpoint: 500,
                breakpointCenterArea: 0.7,
                navigateByCenterClick: true
            },

             deeplinking: {
                 		// deep linking options go gere
                 		enabled: true,
                 		prefix: 'slider-'
                 	}
        });
  } else {
  
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
  
  }
  
  $(".royalSlider.rsDefault").royalSlider({
      	// general options go gere
      	loop:true,
      	autoHeight:false,
      	imageAlignCenter:false,
      	imageScaleMode: 'fit',
      	autoScaleSlider: false,
      	arrowsNavHideOnTouch: true,
          visibleNearby: {
              enabled: true,
              centerArea: 0.7,
              center: false,
              breakpoint: 500,
              breakpointCenterArea: 0.7,
              navigateByCenterClick: true
          },
          autoPlay: {
              		// autoplay options go gere
              		enabled: true,
              		pauseOnHover: true
          }
      });
 
});
