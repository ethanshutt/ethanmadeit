<footer class="site-footer">
  <div class="left">
    <p class="footer-copyright"><?php echo html::decode($site->copyright()->kirbytext())?></p>
    <p class="colophon"><?= $site->colophon()->kirbytext() ?></p>
  </div><div class="right">
      <h3 class="section-title">Links</h3>    
      <ul class="footer-links"><?php foreach($pages->visible() as $item): ?>
      <li class="footer-link-item">
        <a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
      </li>
      <?php endforeach ?>
    </ul>
    <ul class="footer-links">
      <li class="social-list-item"><a href="<?= $site->twitter() ?>">Twitter</a></li>
      <li class="social-list-item"><a href="<?= $site->instagram() ?>">Instagram</a></li>
      <li class="social-list-item"><a href="<?= $site->github() ?>">GitHub</a></li>
      <li class="social-list-item"><a href="<?= $site->linkedin() ?>">LinkedIn</a></li>
    </ul>
    <a href="#top" onClick="topFunction" id="to-top" class="button">Back to Top</a>
  </div>
</footer>
</div>
<?= js('assets/js/scripts.js') ?>

</body>
</html>