<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>УМУ - Учебно-методическое управление</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #1E90FF;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-weight: bold;
            font-size: 24px;
            text-decoration: none;
            color: white;
        }
        .nav {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .nav a {
            color: white;
            text-decoration: none;
        }
        .nav form {
            margin: 0;
        }
        .nav select {
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            background-color: white;
            cursor: pointer;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .title {
            font-size: 28px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<header class="header">
    <a href="/" class="logo">У М У</a>
    <nav class="nav">
        <?php if (!app()->auth::check()): ?>
            <a href="<?= app()->route->getUrl('/login') ?>">ВХОД</a>
        <?php else: ?>
            <form method="get" action="/handle-action">
                <select name="action" onchange="this.form.submit()">
                    <option value=""  >добавить</option>
                    <option value="add-employee">Добавить сотрудника</option>
                    <option value="add-discipline">Добавить дисциплину</option>
                </select>
            </form>

            <form method="get" action="/handle-action">
                <select name="action" onchange="this.form.submit()">
                    <option value=""  >списки</option>
                    <option value="list_employees">Список сотрудников</option>
                    <option value="list_disciplines">Список дисциплин</option>
                </select>
            </form>

            <a href="<?= app()->route->getUrl('/profile') ?>">личный кабинет (<?= app()->auth->user()->name ?>)</a>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход</a>
        <?php endif; ?>
    </nav>
</header>
<main class="content">
    <?= $content ?? '' ?>
</main>
</body>
</html>