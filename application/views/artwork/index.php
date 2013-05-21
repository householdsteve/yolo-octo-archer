<div class="royalSlider rsUni" id="maingallery">
    <?php foreach($posts as $row): ?>
      <div class="rsContent">
       <!-- lazy loaded image with thumbnail -->
        <a class="rsImg" href="<?php echo $row['photo-url'][0];?>"><img src="<?php echo $row['photo-url'][5];?>" class="rsTmb" /></a>
      </div>
    <?php endforeach; ?>
</div>
