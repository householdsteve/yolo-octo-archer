<?php if(!$isAjax):?>
<div class="cd-page">
  <div class="cd-content">
    <iframe width="100%" height="<?php echo $h;?>" src="http://www.youtube.com/embed/g69NzOqgP_Q?wmode=transparent&rel=0&showinfo=0&modestbranding&autohide=1" frameborder="0" allowfullscreen></iframe>
  </div>
  <a class="cd-close" href="<?php echo base_url();?>">X</a>
</div>
<?php else: ?>
<div>
    <iframe width="100%" height="<?php echo $h;?>" src="http://www.youtube.com/embed/g69NzOqgP_Q?wmode=transparent&rel=0&showinfo=0&modestbranding&autohide=1" frameborder="0" allowfullscreen></iframe>
</div>
<?php endif; ?>