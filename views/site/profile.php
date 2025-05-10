<div class="profile-container">
    <h1>Профиль сотрудника</h1>

    <div class="employee-info">
        <h2><?= htmlspecialchars("{$user->surname} {$user->name} {$user->patronym}") ?></h2>
        <p><strong>Должность:</strong>
            <?= match ($user->position) {
                'ped' => 'Пед.сотрудник',
                'decanat' => 'Сотрудник деканата',
            } ?>
        </p>
        <p><strong>Кафедра:</strong> <?= htmlspecialchars($user->faculty->name ?? 'Не указана') ?></p>
    </div>

    <div class="disciplines-section">
        <h3>Дисциплины</h3>

        <?php if (isset($message)): ?>
            <div class="alert"><?= $message ?></div>
        <?php endif; ?>

        <table class="disciplines-table">
            <thead>
            <tr>
                <th>Дисциплина</th>
                <th>Общее время (часы)</th>
                <th>Пройдено (часы)</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user->disciplines as $discipline): ?>
                <tr>
                    <td><?= htmlspecialchars($discipline->name) ?></td>
                    <td><?= $discipline->all_time ?></td>
                    <td>
                        <form method="POST" action="/profile">
                            <input type="hidden" name="discipline_id" value="<?= $discipline->id ?>">
                            <input type="number"
                                   name="passed_time"
                            value="<?= $discipline->pivot->passed_time ?? 0 ?>"
                            min="0"
                            max="<?= $discipline->all_time ?>"
                            class="hours-input">
                    </td>
                    <td>
                        <button type="submit" class="save-btn">Сохранить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if ($user->disciplines->isEmpty()): ?>
                <tr>
                    <td colspan="4" class="text-muted">Дисциплины не назначены</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>