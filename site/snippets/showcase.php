<?php
$projects = page('projects')->children()->visible();
if(isset($limit)) $projects = $projects->limit($limit);
?>

  <?php $n=0; foreach($projects as $project): $n++; ?>
  <div class="project <?= ($n%2) ? 'odd' : 'even' ?>">
    <div class="showcase-item">
      <a href="<?= $project->url() ?>" class="showcase-link">
        <?php if($image = $project->images()->sortBy('sort', 'asc')->first()): $first = $image ?>
          <img class="first" src="<?= $first->url() ?>" alt="Thumbnail for <?= $project->title()->html() ?>" class="showcase-image" />
        <?php endif ?>
      <?php if($image = $project->images()->sortBy('sort', 'asc')->last()): $second = $image ?>
        <img class="second" src="<?= $second->url() ?>" alt="Second Thumbnail for <?= $project->title()->html() ?>" class="showcase-image" />
      <?php endif ?>
      </a>
    </div>
    <a href="<?= $project->url() ?>"><h3 class="project-title"><?= $project->title() ?></h3></a>
    <p class="project-description"><?= $project->text()->kirbytext()->excerpt(140, 'characters') ?><a class="project-link" href=<?= $project->url() ?>>see more</a></p>  
  </div>
  <?php endforeach ?>