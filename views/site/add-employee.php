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
