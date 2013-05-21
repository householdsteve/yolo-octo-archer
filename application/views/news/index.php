<article class="content <?php echo $nav_selected;?>">
  <?php foreach($posts as $key => $news):?>
    <div class="base <?php echo $news['@attributes']['type'];?>">
    <?php switch($news['@attributes']['type']):
    case "regular": ?>
        <?php if(isset($news['regular-title'])){echo "<h1>".$news['regular-title']."</h1>";}?>
        <time><?php echo date('r',$news['@attributes']['unix-timestamp']);?></time>
        <p><?php echo $news['regular-body']?></p>
      <?php break;?>
      
      <?php case "photo": ?>
          <?php if(isset($news['photo-caption'])){echo "<h1>".$news['photo-caption']."</h1>";}?>
          <time><?php echo date('r',$news['@attributes']['unix-timestamp']);?></time>
          <div class="royalSlider rsDefault">
        <?php if(isset($news['photoset'])):?>
          <?php foreach($news['photoset']['photo'] as $row): ?>
            <div class="rsContent">
             <!-- lazy loaded image with thumbnail -->
              <a class="rsImg" href="<?php echo $row['photo-url'][2];?>"></a>
            </div>
          <?php endforeach; ?>
          
        <?php else: ?>
            <div class="rsContent">
             <!-- lazy loaded image with thumbnail -->
              <a class="rsImg" href="<?php echo $news['photo-url'][2];?>"></a>
            </div>
        <?php endif; ?>
        </div>
      <?php break;?>
    
    <?php endswitch; ?>
  </div>
  <?php endforeach; ?>
  <?php echo $pagination;?>
  <?php
  // Output the posts
    //print_r($posts);
  ?>
</article>