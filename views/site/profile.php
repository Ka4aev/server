<div class="profile-container">
    <h1>Профиль сотрудника</h1>

    <div class="employee-info">
        <h2>Иванов Иван Иванович</h2>
        <p><strong>Должность:</strong> Преподаватель</p>
        <p><strong>Кафедра:</strong> Информационных технологий</p>
    </div>

    <div class="disciplines-section">
        <h3>Дисциплины</h3>

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
            <tr>
                <td>Программирование на Python</td>
                <td>120</td>
                <td>
                    <input type="number" value="40" min="0" max="120" class="hours-input">
                </td>
                <td>
                    <button class="save-btn">Сохранить</button>
                </td>
            </tr>
            <tr>
                <td>Базы данных</td>
                <td>90</td>
                <td>
                    <input type="number" value="15" min="0" max="90" class="hours-input">
                </td>
                <td>
                    <button class="save-btn">Сохранить</button>
                </td>
            </tr>
            <tr>
                <td>Веб-разработка</td>
                <td>80</td>
                <td>
                    <input type="number" value="0" min="0" max="80" class="hours-input">
                </td>
                <td>
                    <button class="save-btn">Сохранить</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>