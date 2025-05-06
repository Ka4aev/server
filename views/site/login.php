<div class="auth-container">
    <h2 class="auth-title">Авторизация</h2>

    <?php if ($message ?? ''): ?>
        <div class="auth-message"><?= $message ?></div>
    <?php endif; ?>

    <?php if (app()->auth->user()->name ?? ''): ?>
        <div class="auth-user">Вы вошли как: <?= app()->auth->user()->name ?></div>
    <?php endif; ?>

    <?php if (!app()->auth::check()): ?>
        <form method="post" class="auth-form">
            <div class="form-group">
                <label class="form-label">Логин</label>
                <input type="text" name="login" class="form-input" placeholder="Введите ваш логин" required>
            </div>

            <div class="form-group">
                <label class="form-label">Пароль</label>
                <input type="password" name="password" class="form-input" placeholder="Введите пароль" required>
            </div>

            <button type="submit" class="auth-button">Войти</button>
        </form>
    <?php endif; ?>
</div>