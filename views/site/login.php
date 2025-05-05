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

<style>
    .auth-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .auth-title {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 25px;
    }

    .auth-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-label {
        font-weight: 500;
        color: #34495e;
    }

    .form-input {
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .form-input:focus {
        border-color: #3498db;
        outline: none;
    }

    .auth-button {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .auth-button:hover {
        background-color: #2980b9;
    }

    .auth-message {
        padding: 10px;
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
        margin-bottom: 20px;
        text-align: center;
    }

    .auth-user {
        text-align: center;
        padding: 10px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 4px;
        margin-bottom: 20px;
    }
</style>