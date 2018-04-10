<?php snippet('header') ?>
<div class="content">
  <section class="projects">
    <h3 class="section-title">Things I’ve Made</h3>
    <div class="showcase grid">
        <?php snippet('showcase', [limit => 6]) ?>
    </div>
    <a class="button" href="/work">See More Work..</a>
  </section>
  <section class="writing-homepage">
    <h3 class="section-title">Writing</h3>
    <?php snippet('articlelist') ?>
    <a class="button" href="/writing">Find Other Articles</a>
  </section>
</div>
<?php snippet ('sidebar') ?>
<?php snippet('footer') ?>
