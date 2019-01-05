<nav class="nav">
  <ul class="nav__list container">
    <?php foreach ($data_array['categories'] as $categorie): ?>
      <li class="nav__item">
        <a href="all-lots.html"><?= $categorie?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>
<div class="container">
  <section class="lots">
    <h2>История просмотров</h2>
    <ul class="lots__list">
      <?php foreach ($data_array['lots'] as $key => $lot): ?>
        <li class="lots__item lot">
          <div class="lot__image">
            <img src="<?= $lot['URL-картинки'] ?>" width="350" height="260" alt="Сноуборд">
          </div>
          <div class="lot__info">
            <span class="lot__category"><?= $lot['Категория'] ?></span>
            <h3 class="lot__title"><a class="text-link" href="lot.php?lot_id=<?= $key ?>"><?= $lot['Название'] ?></a></h3>
            <div class="lot__state">
              <div class="lot__rate">
                <span class="lot__amount">Стартовая цена</span>
                <span class="lot__cost"><?= $lot['Цена'] ?><b class="rub">р</b></span>
              </div>
              <div class="lot__timer timer">
                16:54:12
              </div>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </section>
</div>