<div class="row-fluid">
  <div class="span12"><img src="/assets/img/testing/ono-beijing.jpg" width="1171" height="481" alt="Masthead"></div>
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
        <h1>BEIJING</h1>
        <p>Giorgio Armani says, “I’ve always had a very special relationship with China, a country with a rich cultural background and a sophisticated aesthetic which has often inspired me in my search for atmosphere and mood. It is a place to which I have paid homage in many of my collections. I believe I can say I was one of the first to recognise the potential of the Chinese market: we opened our first boutique in Beijing in 1998, well ahead of the economic boom that has led the luxury sector to become interested in the region. </p>
        
        <p>More than a decade after my arrival in China, it seems to me that the time has come to celebrate our presence in the country and to present the current collections in a special way, edited just for this purpose. I didn’t want the celebration to be an end in itself, though; my trip will also offer an opportunity to present the research programme I have developed with Tsinghua University: an initiative I hold very dear, building another bridge between East and West, through the successful exchange of culture and know-how, supporting the new talent the region has to offer.”</p>

        </div>
      </div>
    </div>
  </div>
</div>

