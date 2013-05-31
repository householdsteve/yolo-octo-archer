<div class="row-fluid">
  <div class="span12"><img src="http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/ecc-roma.jpg" width="1171" height="481" alt="Masthead"></div>
</div>
<div class="row-fluid top-space">
  <div class="span12">
    <div class="row-fluid">
      <div class="span3 offset1">
        <h1>ECCENTRICO</h1>
        <h2>EXPLORE THE EXHIBITS:</h2>
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
      </div>

  <div class="span7 offset1">
    <div class="row-fluid">
      <div class="span10">
        <p>From the June 6th, featuring neverbefore seen dresses, accessories and jewels from the Giorgio Armani collections.</p>
        
        <p>Dal 6 Giugno, un percorso inedito attraverso abiti, accessori e gioielli delle collezioni Giorgio Armani.</p>
        </div>
      </div>
    </div>
  </div>
</div>
