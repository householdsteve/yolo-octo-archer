<div class="row-fluid">
  <div class="span12"><img src="/assets/img/testing/masthead.jpg" width="1171" height="481" alt="Masthead"></div>
</div>
<div class="row-fluid top-space">
  <div class="span12">
    <div class="row-fluid">
      <div class="span3 offset1">
        <h1>ONE NIGHT ONLY</h1>
        <h2>DISCOVER THE EVENTS:</h2>
        <?php
          $this->view->partial('common/_sub_nav', array(
            'parent' => 'eccentrico',
            'sub_nav' => array(
              array('title' => 'London', 'href' => site_url('events/london'), 'nav_selected' => 'events'),
              array('title' => 'Tokyo', 'href' => site_url('events/tokyo'), 'nav_selected' => 'events'),
              array('title' => 'Beijing', 'href' => site_url('events/beijing'), 'nav_selected' => 'events'),
              array('title' => 'Rome', 'href' => site_url('events/rome'), 'nav_selected' => 'events')            
          )));
        ?>
      </div>

  <div class="span7 offset1">
    <div class="row-fluid">
      <div class="span10">
        <h1>ROME</h1>
        <p>Da Press Release</p>
        </div>
      </div>
    </div>
  </div>
</div>
