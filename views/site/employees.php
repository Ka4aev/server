<div class="block">
    <div class="employees-list-container">
        <h1>Список сотрудников</h1>

        <table class="employees-table">
            <thead>
            <tr>
                <th>№</th>
                <th>ФИО</th>
                <th>Должность</th>
                <th>Кафедра</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $employee->id ?></td>
                    <td><?= "{$employee->surname} {$employee->name}" ?></td>
                    <td>
                        <?= match($employee->position) {
                            'ped' => 'Пед. сотрудник',
                            'decanat' => 'Сотрудник деканата',
                            default => $employee->position
                        } ?>
                    </td>
                    <td>
                        <?= $employee->faculty->name ?? 'Не указана' ?>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>

    <div class="filters-container">
        <h2>Фильтры</h2>
        <form method="GET" action="/employees">
            <div class="filter-group">
                <label>Отсортировать по кафедрам:</label>
                <div class="checkbox-group">
                    <?php foreach ($faculties as $faculty): ?>
                        <label>
                            <input type="checkbox"
                                   name="faculty_ids[]"
                                   value="<?= $faculty->id ?>"
                                <?= in_array($faculty->id, $selectedFaculties) ? 'checked' : '' ?>>
                            <?= htmlspecialchars($faculty->name) ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
            <button type="submit" class="filter-button">Применить</button>
            <a href="/employees" class="reset-button">Сбросить</a>
        </form>
    </div>
</div>