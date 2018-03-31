<?php snippet('header') ?>
<?php snippet('sidebar') ?>
<div class="content">
  <div class="project">
    <?= $page->text()->kirbytext()->html() ?>
  </div>
</div>
<?php snippet('sidebar') ?>
<?php snippet('footer') ?>