  <div class="row-fluid">
    <div class="span12"><img src="/assets/img/testing/masthead.jpg" width="1171" height="481" alt="Masthead"></div>
  </div>
  <div class="row-fluid top-space">
    <div class="span12">
      <div class="row-fluid">
        <div class="span3 offset1">
          <h1>ECCENTRICO</h1>
          <h2>EXPLORE THE EXHIBITS:</h2>
          <?php
            $this->view->partial('common/_sub_nav', array(
              'sub_nav' => array(
                array('title' => 'Milan', 'href' => site_url('eccentrico/milan'), 'nav_selected' => 'eccentrico'),
                array('title' => 'Tokyo', 'href' => site_url('eccentrico/tokyo'), 'nav_selected' => 'eccentrico'),
                array('title' => 'Hong Kong', 'href' => site_url('eccentrico/hong-kong'), 'nav_selected' => 'eccentrico'),
                array('title' => 'Rome', 'href' => site_url('eccentrico/rome'), 'nav_selected' => 'eccentrico')            
            )));
          ?>
        </div>

    <div class="span7 offset1">
      <div class="row-fluid">
        <div class="span10">
          <h1>HONG KONG</h1>
          </div>
        </div>
      </div>
    </div>
  </div>