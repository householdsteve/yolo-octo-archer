<ul class="clearfix subnav">
  <?php foreach($sub_nav as $list): ?>
    <li class="<?php selected($list['title'], $list['nav_selected']); ?>">
      <a class="<?php selectedBoth($list['nav_selected'], $sub_nav_selected,$parent,$nav_selected); ?>" href="<?php echo $list['href']; ?>" title="<?php echo $list['title']; ?>">
      <?php echo $list['title']; ?>
      </a>
    </li>
    <?php endforeach; ?>
</ul>