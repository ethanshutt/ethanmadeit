<?php snippet('header') ?>

<div class="content">
  <article class="post post-preview">
    <header class="article-header">
      <h4><?= $article->title()->html() ?></h4>
      <small><?= $article->date('F jS, Y') ?></small>
    </header>
    <div class="article-content">
      <p><?= $article->intro() ?></p>
    </div>
    <footer class="article-preview-footer"><a href="<? $article->url() ?>">Read On..</a></footer>
  </article>
</div>

<?php snippet('footer') ?>
