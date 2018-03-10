<div class="sidebar">
  <?php if($page->isHomepage()): ?>
    <section class="about-home">
      <?= $page->about()->kirbytext() ?>
    </section>
    <section class="contact">
      <?= $page->contact()->kirbytext() ?>
    </section>
    <section class="for-fun">
      <?= $page->side()->kirbytext() ?>
    </section>

  <?php else: ?>
    <?= $page->sidebar()->kirbytext() ?>
  <?php endif ?>
</div>