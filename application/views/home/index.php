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
       <div class="item-holder<?php ($events[$count]['available']) ? ' zoomTarget' : '';?><?php echo (isset($events[$count]['override'])) ? " override" : ""; ?>">
         <div class="door<?php echo (isset($events[$count]['classes'])) ? " ".$events[$count]['classes'] : ""; ?>" data-bg-image="<?php echo $events[$count]['image'];?>" data-link="<?php echo $events[$count]['link'];?>/<?php echo strtolower(date('F-j',$events[$count]['date']));?>" data-hovertitle="<?php echo $events[$count]['title'];?>" data-hoversubtitle="<?php echo $events[$count]['subtitle'];?>" data-hovertype="<?php echo $events[$count]['type'];?>" data-content-enabled="<?php echo $events[$count]['enabled'];?>" data-content-available="<?php echo $events[$count]['available'];?>">
           <div class="date">
             <?php if(!isset($events[$count]['custom-date'])):?>
             <span><?php echo date('F',$events[$count]['date']);?></span> <?php echo date('j',$events[$count]['date']);?><sup><?php echo date('S',$events[$count]['date']);?></sup>
             <?php else: ?>
              <?php echo $events[$count]['custom-date'];?> 
             <?php endif;?>   
          </div>
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
</div>

<div id="social-media-feed">
  <h3 class="title"><a href="social-stream" class="">#ONENIGHTONLYROMA</a></h3>
</div>