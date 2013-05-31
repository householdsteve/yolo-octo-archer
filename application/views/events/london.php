<div class="row-fluid">
  <div class="span12"><img src="http://cdn3.yoox.biz/armani/wp-content/uploads/2013/05/ono-london.jpg" width="1171" height="481" alt="Masthead"></div>
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
        <h1>LONDON 2006</h1>
        <p>Giorgio Armani said: "I am greatly looking forward to presenting my Emporio Armani women’s collection at London Fashion Week. London is one of the world’s most vibrant cities, a reference point for all the arts, for architecture, literature, film, music, food, and certainly for fashion. I hope that my three new stores and restaurant will further add to the cosmopolitan culture of the United Kingdom’s capital city. The (EMPORIO ARMANI) RED One Night Only event will, I hope, help to create further momentum for Bono and Bobby Shriver’s pioneering (PRODUCT) RED TM initiative to help channel funds from the private sector to The Global Fund to fight AIDS in Africa."</p>
        
        <p>Launched by Bono and Bobby Shriver, (PRODUCT) RED is a global initiative whose primary objective is to engage the private sector in the fight against AIDS in Africa by channelling funds from the sale of (PRODUCT) RED products directly to The Global Fund. Companies whose products take on the(PRODUCT) RED mark contribute a portion of profits from the sale of that product to the Global Fund to finance AIDS programmes in Africa with a focus on women and children.</p>
        
        <p>Hilary Riva, Chief Executive of the British Fashion Council, said: “I am delighted to welcome Mr. Armani and his show to London. This city is the most innovative and inclusive of the world's fashion capitals, so it is also appropriate that the Emporio Armani (PRODUCT) RED collection should be launched here. This initiative has been inspirational in its ability to motivate leading brands to unite behind such an important cause."</p>
        </div>
      </div>
    </div>
  </div>
</div>
