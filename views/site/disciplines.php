<div class="disciplines-list-container">
    <h1>Список дисциплин</h1>

    <table class="disciplines-table">
        <thead>
        <tr>
            <th>№</th>
            <th>Название дисциплины</th>
            <th>Кафедра</th>
            <th>Общее время (часы)</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Программирование на Python</td>
            <td>Информационных технологий</td>
            <td>120</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Базы данных</td>
            <td>Информационных технологий</td>
            <td>90</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Экономическая теория</td>
            <td>Экономики</td>
            <td>80</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Гражданское право</td>
            <td>Юридический</td>
            <td>100</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Высшая математика</td>
            <td>Математический</td>
            <td>150</td>
        </tr>
        </tbody>
    </table>
</div>

<style>
    .disciplines-list-container {
        max-width: 1000px;
        margin: 30px auto;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
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