<div class="disciplines-page">
    <div style="display: flex; flex-direction: row-reverse">
        <div class="employees-list-container">
            <h3>Фильтры</h3>

            <form method="GET" action="/disciplines">

                <div class="filter-group">
                    <label>Поиск по названию:</label>
                    <input type="text"
                           name="search"
                           value="<?= isset($filters['search']) ? htmlspecialchars($filters['search']) : '' ?>"
                           placeholder="Введите название дисциплины"
                           class="form-control">
                </div>

                <div class="filter-group">
                    <label>Кафедра:</label>
                    <select name="faculty_id">
                        <option value="">Все кафедры</option>
                        <?php foreach ($faculties as $faculty): ?>
                            <option value="<?= $faculty->id ?>"
                                <?= isset($filters['faculty_id']) && $filters['faculty_id'] == $faculty->id ? 'selected' : '' ?>>
                                <?= $faculty->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Сотрудник:</label>
                    <select name="employee_id">
                        <option value="">Все сотрудники</option>
                        <?php foreach ($employees as $employee): ?>
                            <option value="<?= $employee->id ?>"
                                <?= isset($filters['employee_id']) && $filters['employee_id'] == $employee->id ? 'selected' : '' ?>>
                                <?= $employee->surname ?> <?= $employee->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="">Применить</button>
                <a href="/disciplines" class="">Сбросить</a>
            </form>
        </div>

        <div class="employees-table">
            <h2>Список дисциплин</h2>

            <table class="">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Кафедра</th>
                    <th>Часы</th>
                    <th>Сотрудники</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($disciplines as $discipline): ?>
                    <tr>
                        <td><?= $discipline->id ?></td>
                        <td><?= $discipline->name ?></td>
                        <td><?= $discipline->faculty->name ?></td>
                        <td><?= $discipline->all_time ?></td>
                        <td>
                            <?php if ($discipline->users->isNotEmpty()): ?>
                                <?php foreach ($discipline->users as $user): ?>
                                    <span class="badge bg-secondary">
                                        <?= $user->surname ?> <?= $user->name ?>
                                    </span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span class="text-muted">Не назначены</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>