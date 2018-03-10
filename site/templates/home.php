<?php snippet('header') ?>
<?php snippet ('sidebar') ?><div class="content">
  <section class="projects">
    <div class="showcase grid">
        <?php snippet('showcase', [limit => 6]) ?>
    </div>
    <a href="/projects">See More..</a>
  </section>
  <section class="writing-homepage">
    <?php snippet('articlelist') ?>
  </section>
</div>

<?php snippet('footer') ?>
