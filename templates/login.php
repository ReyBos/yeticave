<nav class="nav">
  <ul class="nav__list container">
    <?php foreach ($data_array['categories'] as $categorie): ?>
      <li class="nav__item">
        <a href="all-lots.html"><?= $categorie?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>
<form class="form container <?= (empty($data_array['errors']) ? '' : 'form--invalid'); ?>" action="login.php" method="post">
  <h2>Вход</h2>
  <div class="form__item <?= ((!empty($data_array['errors']['email']) || !empty($data_array['errors']['email_format']) || !empty($data_array['errors']['user']) || !empty($data_array['errors']['password_wrong'])) ? 'form__item--invalid' : ''); ?>">
    <label for="email">E-mail*</label>
    <input id="email" type="text" name="email" placeholder="Введите e-mail" value="<?= (!empty($data_array['errors']['email_format']) ? $data_array['errors']['user'] : ''); ?><?= ((!empty($data_array['errors']['user']) && empty($data_array['errors']['email_format'])) ? $data_array['login'] : ''); ?><?= (!empty($data_array['errors']['password_wrong']) ? $data_array['login'] : '') ?>">
    <span class="form__error"><?= $data_array['errors']['email']; ?><?= (empty($data_array['errors']['email']) ? $data_array['errors']['email_format'] : ''); ?><?= $data_array['errors']['user']; ?></span>
  </div>
  <div class="form__item form__item--last <?= ((!empty($data_array['errors']['password']) || !empty($data_array['errors']['password_wrong'])) ? 'form__item--invalid' : ''); ?>">
    <label for="password">Пароль*</label>
    <input id="password" type="text" name="password" placeholder="Введите пароль">
    <span class="form__error"><?= $data_array['errors']['password']; ?><?= $data_array['errors']['password_wrong']; ?></span>
  </div>
  <button type="submit" class="button">Войти</button>
</form>