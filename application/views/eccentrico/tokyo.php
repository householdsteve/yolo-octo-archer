<div class="row-fluid">
  <div class="span12">
    <iframe src="http://youtube.com/embed/Gb4zsK3fJtY?rel=0&showinfo=0&modestbranding&autohide=1;width=100%&amp;height=480" width="100%" height="446" frameborder="0" allowfullscreen=""></iframe>
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
        <h1>TOKYO</h1>
         <p>Giorgio Armani said: “After Milan, I wanted to bring Eccentrico to Tokyo to celebrate five years of Armani/Ginza Tower, to pay tribute to my love of Japanese culture and aesthetics, which have often inspired me in my work.”</p>

        </div>
      </div>
    </div>
  </div>
</div>
