<div class="row-fluid">
  <div class="span12">
    <iframe src="http://youtube.com/embed/tzz3XOanJy8?autohide=1&amp;color=white&amp;vq=hd720&amp;iv_load_policy=3&amp;rel=0&amp;width=100%&amp;height=480" width="100%" height="446" frameborder="0" allowfullscreen=""></iframe>
  </div>
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
        <h1>HONG KONG</h1>
         <p>For the first time, the exhibition also includes a selection of unique cosmetics, from Maestro Fusion Make Up to Lip Maestro or Rouge d’Armani. Exclusive fragrances are also displayed as a tribute to the craftsmanship of Haute Parfumerie, including Crystal and the limited edition Armani Privé collections. The 2012 Year of the Dragon limited edition watch collection was also be showcased.</p>

        </div>
      </div>
    </div>
  </div>
</div>
