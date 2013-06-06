<div id="live-streaming-int" class="container">
  <iframe id="frame2" src="http://live.armani.com/live.aspx?e=armani-one-night-only" width="100%" height="500" align="left" scrolling="no" frameborder="0"></iframe>
  <?php if(!$isAjax):?>
  <a class="cd-close fixed" href="<?php echo base_url();?>">X</a>
  <?php endif; ?>
</div>
<div class="row-fluid">    
  <div class="sub-title divider">
    <h1>EXCLUSIVE PHOTOGALLERY</h1>
  </div>
  <div class="span12 nero">
    <div class="royalSlider rsEvent">
        <?php for($i=4; $i < 13; $i++):?>   
        <a class="rsImg" href="<?php echo base_url()?>assets/img/event-rome/one_night_only-rome_<?php echo $i;?>.jpg"> </a>
        <?php endfor;?>
    </div>
  </div>
