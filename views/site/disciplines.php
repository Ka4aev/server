<div class="block">
    <div class="disciplines-list-container">
        <h1>Список дисциплин</h1>

        <table class="disciplines-table">
            <thead>
            <tr>
                <th>№</th>
                <th>Название дисциплины</th>
                <th>Кафедра</th>
                <th>Общее время (часы)</th>
                <th>Преподаватель</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Программирование на Python</td>
                <td>Информационных технологий</td>
                <td>120</td>
                <td>Качаев Станислав</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Базы данных</td>
                <td>Информационных технологий</td>
                <td>90</td>
                <td>Елисеев Павел</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Экономическая теория</td>
                <td>Экономики</td>
                <td>80</td>
                <td>Иванов Иван</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Гражданское право</td>
                <td>Юридический</td>
                <td>100</td>
                <td>Качаев Станислав</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Высшая математика</td>
                <td>Математический</td>
                <td>150</td>
                <td>Елисеев Павел</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Геология нефти и газа</td>
                <td>Нефтегазовая</td>
                <td>110</td>
                <td>Иванов Иван</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="filters-container">
        <h2>Фильтры</h2>
        <div class="filter-group">
            <label>Отсортировать по кафедрам:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="department" value="Информационных технологий" checked> Информационных технологий</label>
                <label><input type="checkbox" name="department" value="Экономики" checked> Экономики</label>
                <label><input type="checkbox" name="department" value="Юридический" checked> Юридический</label>
                <label><input type="checkbox" name="department" value="Математический" checked> Математический</label>
                <label><input type="checkbox" name="department" value="Нефтегазовая" checked> Нефтегазовая</label>
            </div>
        </div>

        <?php
        $user = app()->auth->user();
        $isAdmin = $user->role_id == 1;
        $isDecanat = $user->position == 'decanat';
        ?>

        <?php if ($isAdmin || $isDecanat): ?>
        <div class="filter-group" id="employee-filter">
            <label>Отсортировать по сотрудникам:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="employee" value="Качаев Станислав" checked> Качаев Станислав</label>
                <label><input type="checkbox" name="employee" value="Елисеев Павел" checked> Елисеев Павел</label>
                <label><input type="checkbox" name="employee" value="Иванов Иван" checked> Иванов Иван</label>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
