<div class="add-discipline-page">
    <div class="add-discipline-container">
        <h1>Добавить дисциплину</h1>

        <?php if (isset($message)): ?>
            <div class="alert alert-danger"><?= $message ?></div>
        <?php endif; ?>

        <form method="POST" class="discipline-form">
            <div class="form-group">
                <label>Наименование дисциплины</label>
                <input type="text" name="name" class="form-control" required>

                <label>Общее количество часов</label>
                <input type="number" name="all_time" class="form-control" required>

                <label>Кафедра</label>
                <select name="faculty_id" class="form-control" required>
                    <option value="">Выберите кафедру</option>
                    <?php foreach ($faculties as $faculty): ?>
                        <option value="<?= $faculty->id ?>"><?= $faculty->name ?></option>
                    <?php endforeach; ?>
                </select>

                <label>Сотрудники</label>
                <div class="employees-list">
                    <?php foreach ($employees as $employee): ?>
                        <div class="employee-checkbox">
                            <input type="checkbox"
                                   name="employees[]"
                                   id="emp-<?= $employee->id ?>"
                                   value="<?= $employee->id ?>">
                            <label for="emp-<?= $employee->id ?>">
                                <?= $employee->surname ?> <?= $employee->name ?> <?= $employee->patronym ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <button type="submit" class="save-btn">Добавить</button>
        </form>
    </div>
</div>