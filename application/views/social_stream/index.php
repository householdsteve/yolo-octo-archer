<div class="row-fluid-social feed">
<?php echo $pagination; ?><?php
    $count = 0;
      foreach($data as $key => $row):?>
      <?php if ($count % 4 == 0):?>
        <div class="span12 infinite-item">
      <?php endif;?>
        <div class="span3">
            <?php $this->view->partial('common/_'.$row['type'], array(
              'content' => $row['content'],
              'date' => $row['unixdate'],
              'username' => $row['username']
              )); ?>
        </div>
      <?php if ($count % 4 == 3):?>
        </div>
      <?php endif; $count++;?>
    <?php endforeach;?>
</div>
<span class="end">End of content</span>