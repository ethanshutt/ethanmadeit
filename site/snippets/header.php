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

  <title>Ethan Made It</title>
</head>
<body class="<?php if ($page->isChildOf('writing')): ?>
              <?= $page->parent()->uid() ?>
            <?php else: ?>
              <?= $page->uid() ?>
            <?php endif ?>">
  <div class="container">
    <?php snippet('menu') ?>
    <header class="header">
      <h1 class="big-text">
        <?= $page->intro() ?>
      </h1>
    </header>
    <!-- header -->

