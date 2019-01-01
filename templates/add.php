<nav class="nav">
    <ul class="nav__list container">
      <?php foreach ($data_array['categories'] as $category):?>
      <li class="nav__item">
        <a href="all-lots.html"><?= $category ?></a>
      </li>
    <?php endforeach; ?>
    </ul>
  </nav>
  <form class="form form--add-lot container <?php count($data_array['error']) !== 0 ? print "form--invalid" : print "" ?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <div class="form__item <?php isset($data_array['error']['lot-name']) ? print "form__item--invalid" : print ""; ?>"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value="<?= $data_array['lot']['lot-name'] ?>" required>
        <span class="form__error"><?php isset($data_array['error']['lot-name']) ? print $data_array['error']['lot-name'] : print ""; ?></span>
      </div>
      <div class="form__item <?php isset($data_array['error']['category']) ? print "form__item--invalid" : print ""; ?>">
        <label for="category">Категория</label>
        <select id="category" name="category" required>
          <option value="">Выберите категорию</option>
          <?php foreach ($data_array['categories'] as $category):?>
            <option value="<?= $category ?>" <?php $data_array['lot']['category'] == $category ? print "selected" : print "" ?>><?= $category ?></option>
          <?php endforeach; ?>
        </select>
        <span class="form__error"><?php isset($data_array['error']['category']) ? print $data_array['error']['category'] : print ""; ?></span>
      </div>
    </div>
    <div class="form__item form__item--wide <?php isset($data_array['error']['message']) ? print "form__item--invalid" : print ""; ?>">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота" required><?= $data_array['lot']['message'] ?></textarea>
      <span class="form__error"><?php isset($data_array['error']['message']) ? print $data_array['error']['message'] : print ""; ?></span>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" name="photo2">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
      <span class="form__error" style="display: block;"><?php isset($data_array['error']['photo2']) ? print $data_array['error']['photo2'] : print ""; ?></span>
    </div>
    <div class="form__container-three">
      <div class="form__item form__item--small <?php isset($data_array['error']['lot-rate']) ? print "form__item--invalid" : print ""; ?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value="<?= $data_array['lot']['lot-rate'] ?>" required>
        <span class="form__error"><?php isset($data_array['error']['lot-rate']) ? print $data_array['error']['lot-rate'] : print ""; ?></span>
      </div>
      <div class="form__item form__item--small <?php isset($data_array['error']['lot-step']) ? print "form__item--invalid" : print ""; ?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" value="<?= $data_array['lot']['lot-step'] ?>" required>
        <span class="form__error"><?php isset($data_array['error']['lot-step']) ? print $data_array['error']['lot-step'] : print ""; ?></span>
      </div>
      <div class="form__item <?php isset($data_array['error']['lot-date']) ? print "form__item--invalid" : print ""; ?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" value="<?= $data_array['lot']['lot-date'] ?>" required>
        <span class="form__error"><?php isset($data_array['error']['lot-date']) ? print $data_array['error']['lot-date'] : print ""; ?></span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </form>