<nav class="main">
  <div id="logo"><a href="<?php echo base_url(); ?>">Home</a></div>
  <ul class="clearfix">
    <li>
      <small>The Event</small>
      <a class="<?php selected('event', $nav_selected); ?>" href="<?php echo site_url('events/roma'); ?>" title="One night only">One night only</a>
      <?php
        $this->view->partial('common/_sub_nav', array(
          'sub_nav' => array(
            array('title' => 'Roma', 'href' => site_url('events/roma'), 'nav_selected' => 'event'),
            array('title' => 'Beijing', 'href' => site_url('events/beijing'), 'nav_selected' => 'event'),
            array('title' => 'London', 'href' => site_url('events/london'), 'nav_selected' => 'event')
        )));
      ?>
    </li>
    <li>
      <small>The Exhibition</small>
      <a class="<?php selected('exhibitions', $nav_selected); ?>" href="<?php echo site_url('tattoo'); ?>" title="Tattoo">Eccentrico</a>
      <?php
        $this->view->partial('common/_sub_nav', array(
          'sub_nav' => array(
            array('title' => 'Milan', 'href' => site_url('exhibitions/milan'), 'nav_selected' => 'exhibitions'),
            array('title' => 'Tokyo', 'href' => site_url('exhibitions/tokyo'), 'nav_selected' => 'exhibitions'),
            array('title' => 'Hong Kong', 'href' => site_url('exhibitions/hong-kong'), 'nav_selected' => 'exhibitions'),
            array('title' => 'Rome', 'href' => site_url('exhibitions/rome'), 'nav_selected' => 'exhibitions')            
        )));
      ?>
    </li>
    <li>
      <small>The Boutique</small>      
      <a class="<?php selected('store', $nav_selected); ?>" href="<?php echo site_url('boutique'); ?>" title="GA Store opening">GA Store opening</a>
    </li>
  </ul>
</nav>