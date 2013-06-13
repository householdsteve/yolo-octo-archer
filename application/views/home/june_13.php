 <?php if(!$isAjax):?>
  <a class="cd-close fixed" href="<?php echo base_url();?>">X</a>
  <?php endif; ?>
<div class="row-fluid-social">
<?php
    $datalocal = array();
    $datalocal[] = array( "type"=>"custom",
                          "content"=>"Best Instagram photos of",
                          "unixdate"=>"",
                          "username"=>"");
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage8.ak.instagram.com/57e51fe8cee411e2971f22000a1f8c25_7.jpg",
                          "unixdate"=>"",
                          "username"=>"Armani");
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
                          "content"=>"http://distilleryimage4.ak.instagram.com/3e4c8678cf7711e2918122000a9f4d8a_7.jpg",
                          "unixdate"=>"",
                          "username"=>"Armani"); 
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage3.ak.instagram.com/330c850ecec011e2b1c622000aa8000f_7.jpg",
                          "unixdate"=>"",
                          "username"=>"Armani");    
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage8.s3.amazonaws.com/fa7b742ecdee11e29ad222000a1f97a2_7.jpg",
                          "unixdate"=>"",
                          "username"=>"Armani");
    $datalocal[] = array( "type"=>"instagram-new",
                          "content"=>"http://distilleryimage10.s3.amazonaws.com/407179aacbb611e2962d22000a1f9aa0_7.jpg",
                          "unixdate"=>"",
                          "username"=>"Armani");                
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
