<div class="row-fluid">
  <div class="span12">
    <iframe src="http://youtube.com/embed/IS8tFgfXCmw?rel=0&showinfo=0&modestbranding&autohide=1;width=100%&amp;height=480" width="100%" height="446" frameborder="0" allowfullscreen=""></iframe>
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
        <h1>MILAN</h1>
        <p>Eccentrico is an installation of exceptional clothes and unique accessories, a journey through the imagination and
        a study of the capacity for transformation, playing with shapes and materials to explore cultural connections and
        artistic symbols. It is this aspect – of the unusual – that I wished to highlight, because it represents an exuberant form
        of creativity that extends the concept of minimalism and rigour linked with my fashion design. And as simplicity of
        line does not equal simplicity of thought, I have underscored the wealth and freedom of inspiration that form the
        foundation of my work and that tell a long and unexpected story. My own story, beyond the clichés.</p>
        
        <p style="text-align:right;">Giorgio Armani</p>

        </div>
      </div>
    </div>
  </div>
</div>
