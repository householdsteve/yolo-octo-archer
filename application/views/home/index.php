<div class="zoomViewport">
<div class="zoomContainer">  

<div id="palace-grid-holder" class="">
  <?php
    $count = 0;
    
    for($e = 0; $e < count($events); $e++):
    if(($e % $columns == 0)):
  ?>
  <div class="grid-row clearfix">
    <?php endif; ?>
  <div class="item-holder zoomTarget">
    <div class="door">
      <div class="date"><?php echo date('j',$events[$e]['date']);?><sup><?php echo date('S',$events[$e]['date']);?></sup></div>
    </div>
  </div>
  <?php
  if(($e % $columns == 0)):
  ?>
  </div>
  <?php endif; ?>
  <?php endfor; ?>
  <div class="grid-row clearfix">
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
  </div>
  
  <div class="grid-row clearfix">
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door event">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
  </div>
  
  <div class="grid-row clearfix">
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
  </div>
  
  <div class="grid-row clearfix">
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
    
    <div class="item-holder zoomTarget">
      <div class="door">
        <div class="date">May 29<sup>th</sup></div>
      </div>
    </div>
  </div>
</div>

</div>
</div>

<div id="social-media-feed">
  <h3>#ONENIGHTONLYROMA IN SOCIAL</h3>
</div>