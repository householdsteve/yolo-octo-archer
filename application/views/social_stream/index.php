<div class="row-fluid-social">
    <?php
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

    <?php if(!$isAjax):?>
    <div class="infinite-loading">loading...</div>
    <?php endif;?>
    <?php echo $pagination; ?>
</div>
