<div class="sidebar">
  <?php if($page->isHomepage()): ?>
    <section class="about-home">
      <h2>About Me</h2>
      <?= $page->about()->kirbytext() ?>
    </section>
    <section class="contact">
      <h2>Say Hello</h2>
      <?= $page->contact()->kirbytext() ?>
    </section>
    <section class="for-fun">
      <h2>Side Projects</h2>
      <?= $page->side()->kirbytext() ?>
    </section>

  <?php else: ?>
    <?= $page->sidebar()->kirbytext() ?>
  <?php endif ?>
</div>