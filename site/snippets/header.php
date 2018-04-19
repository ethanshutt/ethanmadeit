<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- custom css -->
  <?php foreach($page->files()->filterBy('extension', 'css') as $css): ?>
  <?= css($css->url()) ?>
  <?php endforeach ?>

  <!-- custom javascript -->
  <?php foreach($page->files()->filterBy('extension', 'js') as $js): ?>
  <?= js($js->url()) ?>
  <?php endforeach ?>
  <?= css('assets/css/styles.css') ?>

  <title><?= $site->title() ?> - <?= $page->title() ?></title>
</head>
<body class="<?php if ($page->isChildOf('writing')): ?> article <?php elseif ($page->isChildOf('work')): ?> work <?php else: ?><?= $page->uid() ?> <?php endif ?>">
  <div class="container">
    <?php snippet('menu') ?>
    <header class="header">
        <?php if ($page->isChildOf('writing')): ?>
                      <div class="big-text"><h1><?= $page->title() ?></h1></div>
                      <h4><?= $page->date('F jS, Y') ?></h4>
                    <?php elseif ($page->isChildOf('work')): ?>
                      <div class="big-text"><h1><?= $page->title() ?></h1></div>
                      <h4><?= $page->type() ?></h4>
                    <?php else: ?>
                      <div class="big-text"><?= $page->intro()->kirbytext() ?></div>
                    <?php endif ?>
    </header>
    <!-- header -->

