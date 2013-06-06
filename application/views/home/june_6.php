<?php if(!$isAjax):?>
<a class="cd-close fixed" href="<?php echo base_url();?>">X</a>
<?php endif; ?>
<div class="row-fluid">    
  <div class="span12 nero">
    <div class="royalSlider rsEvent">
        <?php for($i=4; $i < 13; $i++):?>   
        <a class="rsImg" href="<?php echo base_url()?>assets/img/event-rome/one_night_only-rome_<?php echo $i;?>.jpg"> </a>
        <?php endfor;?>
    </div>
  </div>
</div>