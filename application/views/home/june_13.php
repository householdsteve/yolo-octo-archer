 <?php if(!$isAjax):?>
  <a class="cd-close fixed" href="<?php echo base_url();?>">X</a>
  <?php endif; ?>
<div class="row-fluid-social">
<?php
    $datalocal = array();
    $datalocal[] = array( "type"=>"custom",
                          "content"=>"We've hand picked some of our favorite shots posted by users from Instagram. Thanks for participating!",
                          "unixdate"=>"",
                          "username"=>"");
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage0.ak.instagram.com/75dc6674ce8e11e2a50222000a1fb870_7.jpg",
                          "unixdate"=>"",
                          "username"=>"paolozollo");
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage4.ak.instagram.com/7ae3e72cd00b11e2877122000a1fbc4f_7.jpg",
                          "unixdate"=>"",
                          "username"=>"daryabk");    
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage7.ak.instagram.com/27ee4e54ce3f11e2939222000a9f1385_7.jpg",
                          "unixdate"=>"",
                          "username"=>"evalitasloveistheanswer");
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage6.ak.instagram.com/b219ba9eceff11e29b2022000a9f1561_7.jpg",
                          "unixdate"=>"",
                          "username"=>"saskiapacker");
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage6.ak.instagram.com/e8be3196cee711e293e222000a1fc7f0_7.jpg",
                          "unixdate"=>"",
                          "username"=>"mpmanagement");     
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage2.ak.instagram.com/d95b7486cec211e2b15c22000a9e06ef_7.jpg",
                          "unixdate"=>"",
                          "username"=>"veronicapayares");
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage10.ak.instagram.com/81c34c64ce8e11e2a2d522000a1fb04d_7.jpg",
                          "unixdate"=>"",
                          "username"=>"danielafalcao1");    
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage3.ak.instagram.com/b1bf364ccebd11e2af0122000a1fbc9e_7.jpg",
                          "unixdate"=>"",
                          "username"=>"francesco_puc"); 
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage11.ak.instagram.com/ab1a7d74ce2c11e2a5cd22000a1fb0b0_7.jpg",
                          "unixdate"=>"",
                          "username"=>"margheritautzeri");    
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage7.ak.instagram.com/216ea4a6cdfa11e2b8f122000a1f9345_7.jpg",
                          "unixdate"=>"",
                          "username"=>"marciadocarmo");
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage4.ak.instagram.com/48e0495ccedd11e287d022000a1fc4f9_7.jpg",
                          "unixdate"=>"",
                          "username"=>"this_ismystyle");                
    $count = 0;
      foreach($datalocal as $key => $row):?>
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
