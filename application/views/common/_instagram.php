<?php $this->load->helper('date'); ?>
<div class="social content">
  <img src="<?php echo $content;?>" title="By: <?php echo $username;?>">
  <h2><?php echo $username;?></h2>
  <h3><?php echo timespan($date, time() ) . "ago";?></h3>  
</div>