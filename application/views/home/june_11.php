<?php if(!$isAjax):?>
<a class="cd-close fixed" href="<?php echo base_url();?>">X</a>
<?php endif; ?>
<div class="row-fluid">    
  <div class="span12 nero">
    <div class="royalSlider rsMoreBoutique">
        <?php for($i=1; $i < 7; $i++):?>   
        <a class="rsImg" href="<?php echo base_url()?>assets/img/boutique/one_night_only-boutique_<?php echo $i;?>.jpg"> </a>
        <?php endfor;?>
    </div>
    <div class="sub-title">
       <h1>EXCLUSIVE PHOTOS FROM THE NEW GIORGIO ARMANI STORE IN VIA CONDOTTI, ROME</h1>
     </div>
  </div>
</div>
