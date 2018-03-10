<?php
$projects = page('projects')->children()->visible();
if(isset($limit)) $projects = $projects->limit($limit);
?>

  <?php foreach($projects as $project): ?>
    <div class="showcase-item grid-item">
      <a href="<?= $project->url() ?>" class="showcase-link">
        <?php if($image = $project->images()->sortBy('sort', 'asc')->first()): $thumb = $image->crop(800, 800); ?>
          <img src="<?= $thumb->url() ?>" alt="Thumbnail for <?= $project->title()->html() ?>" class="showcase-image" />
        <?php endif ?>
      </a>
    </div>
  <?php endforeach ?>