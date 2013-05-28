<?php
// echo '<pre>';
// print_r($data);
// echo '</pre>';
?>
<div class="row-fluid-social">
  <div class="span12">
    <?php
    $count = 0;
    $data = array("key1" => array(
      "type"=> "custom",
      "content" => "Join us in sharing the excitement for the Giorgio Armani One Night Only in Roma event. Mention @armani start tagging:",
      "username"=> "",
      "unixdate"=> ""
     )) + $data;
      foreach($data as $key => $row):?>
        <div class="span3">
            <?php $this->view->partial('common/_'.$row['type'], array(
              'content' => $row['content'],
              'date' => $row['unixdate'],
              'username' => $row['username']
              )); ?>
        </div>
    <?php if ($count % 4 == 3):?>
    </div>
    <div class="span12">
    <?php endif; $count++;?>
    <?php endforeach;?>
     </div>
  </div>
</div>