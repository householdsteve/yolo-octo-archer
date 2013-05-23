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
          <p>In the first place, you are struck by the general contrast between these heads. Both are massive enough in all conscience; but there is a certain mathematical symmetry in the Sperm Whale's which the Right Whale's sadly lacks. There is more character in the Sperm Whale's head. As you behold it, you involuntarily yield the immense superiority to him, in point of pervading dignity. In the present instance, too, this dignity is heightened by the pepper and salt colour of his head at the summit, giving token of advanced age and large experience. In short, he is what the fishermen technically call a "grey-headed whale."</p>

          <p>Let us now note what is least dissimilar in these heads&mdash;namely, the two most important organs, the eye and the ear. Far back on the side of the head, and low down, near the angle of either whale's jaw, if you narrowly search, you will at last see a lashless eye, which you would fancy to be a young colt's eye; so out of all proportion is it to the magnitude of the head.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
