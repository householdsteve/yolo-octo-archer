<div class="row-fluid">    
  <div class="span12 nero">
       <iframe src="http://youtube.com/embed/uDOKLIbOgN4?wmode=transparent&rel=0&showinfo=0&modestbranding&autohide=1;width=100%&amp;height=500" width="100%" height="500" frameborder="0" allowfullscreen></iframe>
      <?php if(!$isAjax):?>
      <a class="cd-close fixed" href="<?php echo base_url();?>">X</a>
      <?php endif; ?>
  </div>
</div>

<div class="row-fluid">    
  <div class="span12 nero">
    <div class="sub-title divider">
      <h1>EXCLUSIVE PHOTOGALLERY</h1>
    </div>
    <div class="royalSlider rsEvent">
        <?php for($i=4; $i < 36; $i++):?>   
        <a class="rsImg" href="<?php echo base_url()?>assets/img/event-rome/one_night_only-rome_<?php echo $i;?>.jpg"> </a>
        <?php endfor;?>
    </div>
  </div>
