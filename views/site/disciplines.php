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

<style>
    .block {
        display: flex;
        gap: 20px;
        max-width: 1400px;
        margin: 30px auto;
        padding: 0 20px;
    }

    .disciplines-list-container {
        flex: 3;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .filters-container {
        flex: 1;
        padding: 20px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        height: fit-content;
        position: sticky;
        top: 20px;
    }

    .filters-container h2 {
        margin-top: 0;
        margin-bottom: 20px;
        color: #1E90FF;
    }

    .filter-group {
        margin-bottom: 20px;
    }

    .filter-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
        color: #333;
    }

    .checkbox-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .checkbox-group label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: normal;
        cursor: pointer;
    }

    .checkbox-group input[type="checkbox"] {
        cursor: pointer;
    }

    .disciplines-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: #fff;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .disciplines-table th,
    .disciplines-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    .disciplines-table th {
        background-color: #1E90FF;
        color: white;
        font-weight: 500;
        position: sticky;
        top: 0;
    }

    .disciplines-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .disciplines-table tr:hover {
        background-color: #f1f1f1;
    }
</style>
