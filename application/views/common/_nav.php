<nav class="main">
  <div id="logo"><a href="<?php echo base_url(); ?>">Home</a></div>
  <ul class="clearfix" data-pjax >
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
      <a class="<?php selected('eccentrico', $nav_selected); ?>" href="<?php echo site_url('eccentrico'); ?>" title="Eccentrico">Eccentrico</a>
      <?php
        $this->view->partial('common/_sub_nav', array(
          'sub_nav' => array(
            array('title' => 'Milan', 'href' => site_url('eccentrico/milan'), 'nav_selected' => 'eccentrico'),
            array('title' => 'Tokyo', 'href' => site_url('eccentrico/tokyo'), 'nav_selected' => 'eccentrico'),
            array('title' => 'Hong Kong', 'href' => site_url('eccentrico/hong-kong'), 'nav_selected' => 'eccentrico'),
            array('title' => 'Rome', 'href' => site_url('eccentrico/rome'), 'nav_selected' => 'eccentrico')            
        )));
      ?>
    </li>
    <li>
      <small>The Boutique</small>      
      <a class="<?php selected('store', $nav_selected); ?>" href="<?php echo site_url('boutique'); ?>" title="GA Store opening">GA Store opening</a>
    </li>
  </ul>
  <div id="main_countdown">
    <h1>WATCH IT LIVE</h1>
    <div class="countdown">
      
    </div>
  </div>
</nav>