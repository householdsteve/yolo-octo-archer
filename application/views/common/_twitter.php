<?php $this->load->helper('date'); ?>
<div class="social content">
  <h1><?php echo $content;?></h1>
  <h2><?php echo $username;?></h2>
  <h3><?php echo timespan($date, time() ) . "ago";?></h3>  
</div>