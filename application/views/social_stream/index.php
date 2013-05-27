<?php
// echo '<pre>';
// print_r($data);
// echo '</pre>';
?>
<div class="row-fluid">
  <div class="span12">
    <?php
    foreach($data as $key => $row){
      $this->view->partial('common/_'.$row['type'], array(
        'content' => $row['content'],
        'date' => $row['unixdate'],
        'username' => $row['username']
        ));
    }
    ?>
  </div>
</div>