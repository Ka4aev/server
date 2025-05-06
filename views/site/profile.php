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

<style>
    .profile-container {
        max-width: 900px;
        margin: 30px auto;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    .employee-info {
        background: #fff;
        padding: 20px;
        border-radius: 6px;
        margin-bottom: 30px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .employee-info h2 {
        margin-top: 0;
        color: #2c3e50;
    }

    .disciplines-section {
        background: #fff;
        padding: 20px;
        border-radius: 6px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .disciplines-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
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
    }

    .disciplines-table tr:hover {
        background-color: #f5f5f5;
    }

    .hours-input {
        width: 70px;
        padding: 6px 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .save-btn {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .save-btn:hover {
        background-color: #218838;
    }
</style>