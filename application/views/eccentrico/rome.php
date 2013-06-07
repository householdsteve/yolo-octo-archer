<div class="row-fluid">
  <div class="span12">
    <iframe src="http://youtube.com/embed/doh33fGjl20?rel=0&showinfo=0&modestbranding&autohide=1;width=100%&amp;height=480" width="100%" height="446" frameborder="0" allowfullscreen=""></iframe>
  </div>
</div>
<div class="row-fluid top-space">
<div class="span12">
  <div class="row-fluid">
      <div class="span4 offset1">
        <h1>ECCENTRICO</h1>
            <div class="ecc-txt">
              <p>After touring Milan, Tokyo and Hong Kong, the Eccentrico exhibition in Rome, open to the public from 6th to 9th June, from 11:00am to 9:00pm, will display 62 outfits from the Giorgio Armani and Giorgio Armani Privé collections.<em>Visit the exhibit at the Palazzo della Civiltà Italiana, Rome</em></p>
              

              <p>Dopo Milano, Tokyo e Hong Kong, la mostra Eccentrico a Roma sarà aperta al pubblico dal 6 al 9 giugno, dalle ore 11.00 alle ore 21.00. In esposizione abiti delle collezioni Giorgio Armani e Giorgio Armani Privé: 62 raffinate creazioni dal 1985 a oggi.<em>Presso Palazzo della Civiltà Italiana, Roma</em></p>
            </div>
        
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

      <div class="span6 offset1">
    <div class="row-fluid">
      <div class="span11">
        <img src="http://cdn3.yoox.biz/armani/wp-content/uploads/2013/06/RomaEccentrico.jpg" width="850" height="1212" alt="Eccentrico">
      </div>
    </div>
  </div>
  </div>
</div>
</div>