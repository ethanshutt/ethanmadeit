<div class="sidebar">
  <?php if($page->isHomepage()): ?>
    <section class="about-home">
      <h3 class="section-title">Recently</h3>
      <?= $page->about()->kirbytext() ?>
    </section>
    <section class="contact">
      <h3 class="section-title">Get in Touch</h3>
      <?= $page->contact()->kirbytext() ?>
    </section>
    <section class="for-fun">
      <h3 class="section-title">Fun Stuff</h3>
      <?= $page->funstuff()->kirbytext() ?>
    </section>

  <?php else: ?>
    <?= $page->sidebar()->kirbytext() ?>
  <?php endif ?>
</div>