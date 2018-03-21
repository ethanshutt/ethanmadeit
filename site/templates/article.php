<?php snippet('header') ?>

<div class="content">
  <div class="post">
    <span class="post-intro"><?= $page->intro()->kirbytext()->html() ?></span>
    <?= $page->text()->kirbytext()->html() ?>
  </div>
</div>
<div class="other-posts">
  <h3 class="section-title">Other Articles</h3>
  <?php snippet('articlelist') ?>
</div>

<?php snippet('footer') ?>
