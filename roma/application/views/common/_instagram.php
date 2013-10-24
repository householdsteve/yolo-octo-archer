<?php $this->load->helper('custom'); ?>
<div class="social content instagram">
  <img src="<?php echo $content;?>" title="By: <?php echo $username;?>">
  <div class="above">
    <h2>@<?php echo $username;?> <span><?php echo time_elapsed_string($date, time() );?></span></h2>
  </div>
</div>