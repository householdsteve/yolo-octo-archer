<ul class="clearfix">
  <?php foreach($sub_nav as $list): ?>
    <li class="<?php selected($list['title'], $list['nav_selected']); ?>">
      <a href="<?php echo $list['href']; ?>" title="<?php echo $list['title']; ?>">
      <?php echo $list['title']; ?>
      </a>
    </li>
    <?php endforeach; ?>
</ul>