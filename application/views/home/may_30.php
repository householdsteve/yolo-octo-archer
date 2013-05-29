<?php if(!$isAjax):?>
<div class="cd-page" style="width: 1280px; height: 844px; opacity: 1;"><div class="cd-content"><div>
    <iframe width="100%" height="<?php echo $h;?>" frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/g69NzOqgP_Q?wmode=transparent&amp;rel=0&amp;showinfo=0&amp;modestbranding&amp;autohide=1"></iframe>
</div></div><a class="cd-close" href="<?php echo base_url();?>" style="opacity: 1;">X</a></div>
<?php else: ?>
<div>
    <iframe width="100%" height="<?php echo $h;?>" src="http://www.youtube.com/embed/g69NzOqgP_Q?wmode=transparent&rel=0&showinfo=0&modestbranding&autohide=1" frameborder="0" allowfullscreen></iframe>
</div>
<?php endif; ?>