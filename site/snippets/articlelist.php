<?php foreach($pages->find('writing')->children()->visible()->flip() as $article): ?>

  <article class="post-preview">
    <header class="article-header">
      <a href="<?= $article->url() ?>"><h4><?= $article->title()->html() ?></h4></a>
    </header>
    <div class="article-content">
      <p><?= $article->intro() ?></p>
    </div>
    <footer class="article-preview-footer"><?= $article->date('F jS, Y') ?> - <a href="<?= $article->url() ?>">Read On..</a></footer>
  </article>

<?php endforeach ?>
