<nav class="nav">
  <a href="<?= url() ?>" class="logo-link">Ethan Made It</a>
    <ul class="menu"><?php foreach($pages->visible() as $item): ?>
    <li class="menu-item" id="<?= r($item->isOpen(), 'active') ?>">
      <a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
    </li>
    <?php endforeach ?>
  </ul>
</nav>
