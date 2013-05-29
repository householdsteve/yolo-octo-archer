<?php $this->load->helper('custom'); ?>
<div class="social content twitter">
  <img src="<?php echo base_url(); ?>assets/img/placeholder.png" width="612" height="612" alt="Twitter">
  <div class="above">
    <p><?php echo $content;?></p>
    <h2>@<?php echo $username;?> <span><?php echo time_elapsed_string($date, time() );?></span></h2>
  </div>
</div>