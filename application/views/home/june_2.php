<?php if(!$isAjax):?>
<div class="cd-page">
  <div class="cd-content">
    <iframe width="100%" height="<?php echo $h;?>" src="http://www.youtube.com/embed/_Q2BoiEHLSA?wmode=transparent&rel=0&showinfo=0&modestbranding&autohide=1" frameborder="0" allowfullscreen></iframe>
  </div>
  <a class="cd-close" href="<?php echo base_url();?>home">X</a>
</div>
<?php else: ?>
<div>
    <iframe width="100%" height="<?php echo $h;?>" src="http://www.youtube.com/embed/_Q2BoiEHLSA?wmode=transparent&rel=0&showinfo=0&modestbranding&autohide=1" frameborder="0" allowfullscreen></iframe>
</div>
<?php endif; ?>