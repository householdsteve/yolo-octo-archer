<nav class="main">
  <div id="logo"><a href="<?php echo base_url(); ?>">Home</a></div>
  <ul class="clearfix">
    <li>
      <a class="<?php selected('artwork', $nav_selected); ?>" href="<?php echo site_url('artwork'); ?>" title="Artwork">Artwork</a>
    </li>
    <li>
      <a class="<?php selected('tattoo', $nav_selected); ?>" href="<?php echo site_url('tattoo'); ?>" title="Tattoo">Tattoo</a>
    </li>
    <li>
      <a href="http://dfiant.net" title="Dfiant" target="_blank">Merchandise</a>
    </li>
    <li>
      <a class="<?php selected('bio', $nav_selected); ?>" href="<?php echo site_url('bio'); ?>" title="Bio">Bio</a>
    </li>
    <li>
      <a class="<?php selected('contact', $nav_selected); ?>" href="<?php echo site_url('contact'); ?>" title="Bio">Contact</a>
    </li>
  </ul>
</nav>