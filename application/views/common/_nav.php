<nav class="main" id="mainnav">
  <div id="logo"><a href="<?php echo base_url(); ?>">Home</a></div>
  <ul class="clearfix" data-pjax >
    <li>
      <small>The Event</small>
      <a class="<?php selected('events', $nav_selected); ?>" href="<?php echo site_url('events/rome'); ?>" title="One night only">One night only</a>
      <?php
        $this->view->partial('common/_sub_nav', array(
          'parent' => 'events',
          'sub_nav' => array(
            array('title' => 'London', 'href' => site_url('events/london'), 'nav_selected' => 'london'),
            array('title' => 'Tokyo', 'href' => site_url('events/tokyo'), 'nav_selected' => 'tokyo'),
            array('title' => 'Beijing', 'href' => site_url('events/beijing'), 'nav_selected' => 'beijing'),
            array('title' => 'Rome', 'href' => site_url('events/rome'), 'nav_selected' => 'rome')        
        )));
      ?>
    </li>
    <li>
      <small>The Exhibition</small>
      <a class="<?php selected('eccentrico', $nav_selected); ?>" href="<?php echo site_url('eccentrico'); ?>" title="Eccentrico">Eccentrico</a>
      <?php
        $this->view->partial('common/_sub_nav', array(
          'parent' => 'eccentrico',
          'sub_nav' => array(
            array('title' => 'Milan', 'href' => site_url('eccentrico/milan'), 'nav_selected' => 'milan'),
            array('title' => 'Tokyo', 'href' => site_url('eccentrico/tokyo'), 'nav_selected' => 'tokyo'),
            array('title' => 'Hong Kong', 'href' => site_url('eccentrico/hong-kong'), 'nav_selected' => 'hong-kong'),
            array('title' => 'Rome', 'href' => site_url('eccentrico/rome'), 'nav_selected' => 'rome')            
        )));
      ?>
    </li>
    <li>
      <small>The Boutique</small>      
      <a class="<?php selected('boutique', $nav_selected); ?>" href="<?php echo site_url('boutique'); ?>" title="GA Store opening">GIORGIO ARMANI</br>Store opening</a>
    </li>
  </ul>
  <div id="main_countdown">
    <h1>WATCH IT LIVE</h1>
    <div class="countdown">
      
    </div>
  </div>
  <a id="visitarmani" href="http://armani.com" title="visit ARMANI.com">visit ARMANI.com</a>
</nav>