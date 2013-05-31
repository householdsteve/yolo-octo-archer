<div class="row-fluid">
  <div class="span12"><img src="http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/ono-tokyo.jpg" width="1171" height="481" alt="Masthead"></div>
</div>
<div class="row-fluid top-space">
  <div class="span12">
    <div class="row-fluid">
      <div class="span3 offset1">
        <h1>ONE NIGHT ONLY</h1>
        <h2>DISCOVER THE EVENTS:</h2>
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
      </div>

  <div class="span7 offset1">
    <div class="row-fluid">
      <div class="span10">
        <h1>TOKYO 2007</h1>
        <p>“The idea behind One Night Only at Budokan is to create an evening reflecting the same sense of energy and excitement that Ginza now represents. Over the last few years Ginza has become one of the world’s unique fashion retail destinations, quickly joining the likes of New York’s Fifth Avenue, London’s Bond Street, Milan’s Via Montenapoleone and Paris’s Avenue Montaigne as a fashion and luxury shopping destination.” Giorgio Armani said.</p>
        </div>
      </div>
    </div>
  </div>
</div>
