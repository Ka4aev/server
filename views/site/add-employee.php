<div class="employee-form-container">
    <h2>Добавить сотрудника деканата</h2>

    <?php if ($message ?? ''): ?>
        <div class="error-message"><?= $message ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="form-group">
            <label>Фамилия *</label>
            <input type="text" name="surname" required>
        </div>

        <div class="form-group">
            <label>Имя *</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label>Отчество</label>
            <input type="text" name="patronym">
        </div>

        <div class="form-group">
            <label>Дата рождения *</label>
            <input type="date" name="birth_date" required>
        </div>

        <div class="form-group">
            <label>Пол *</label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="M" checked> Муж.</label>
                <label><input type="radio" name="gender" value="W"> Жен.</label>
            </div>
        </div>

        <div class="form-group">
            <label>Адрес *</label>
            <input type="text" name="address" required>
        </div>

        <?php
        $user = app()->auth->user();
        $isAdmin = $user->role_id == 1;
        ?>

        <div class="form-group">
            <label>Должность *</label>
            <select name="position" required>
                <?php if ($isAdmin): ?>
                <option value="decanat">Сотрудник деканата</option>
                <?php endif; ?>
                <option value="ped">Педагогический сотрудник</option>
            </select>
        </div>

        <div class="form-group">
            <label>Кафедра</label>
            <select name="faculty_id">
                <option value="">Не указана</option>
                <?php foreach ($faculties as $faculty): ?>
                    <option value="<?= $faculty->id ?>"><?= $faculty->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Логин *</label>
            <input type="text" name="login" required>
        </div>

        <div class="form-group">
            <label>Пароль *</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" class="submit-btn">Добавить сотрудника</button>
    </form>
</div>

<style>
    .employee-form-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        background: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .error-message {
        color: #d9534f;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #f2dede;
        border: 1px solid #ebccd1;
        border-radius: 4px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="date"],
    .form-group input[type="password"],
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .radio-group {
        display: flex;
        gap: 15px;
    }

    .submit-btn {
        background-color: #1E90FF;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
    }

    .submit-btn:hover {
        background-color: #187bcd;
    }
</style>