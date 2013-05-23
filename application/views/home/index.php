<div class="zoomViewport">
<div class="zoomContainer">  

<div id="palace-grid-holder" class="">
  <?php
    $count = 0;
    $currentRow = 0;
    $currentColumn = 0;
    for($r = 0; $r < $rows; $r++):
    ?>
      <div class="grid-row clearfix">
    <?php
      for($c = 0; $c < $rows; $c++):
       ?>
       <div class="item-holder zoomTarget">
         <div class="door">
           <div class="date"><?php echo date('j',$events[$count]['date']);?><sup><?php echo date('S',$events[$count]['date']);?></sup></div>
         </div>
       </div>
      <?php
      $count++;
      endfor;
      ?>
      </div>
    <?php  
    endfor;
    ?>
  
</div>
</div>

<div id="social-media-feed">
  <h3>#ONENIGHTONLYROMA IN SOCIAL</h3>
</div>