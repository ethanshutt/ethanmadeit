<?php snippet('header') ?>

<div class="content">
  <div class="post">
    <h4><?= $page->date('F jS, Y') ?></h4>
    <p><?= $page->text()->kirbytext()->html() ?></p>
  </div>
</div>

<?php snippet('footer') ?>
