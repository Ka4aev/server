<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>УМУ - Учебно-методическое управление</title>
    <link rel="stylesheet" href="/public/styles/main.css">
</head>
<body>
<header class="header">
    <a href="/" class="logo">У М У</a>
    <nav class="nav">
        <?php if (!app()->auth::check()): ?>
            <a href="<?= app()->route->getUrl('/login') ?>">ВХОД</a>
        <?php else: ?>
            <?php
            $user = app()->auth->user();
            $isAdmin = $user->role_id == 1;
            $isDecanat = $user->position == 'decanat';
            $isTeacher = $user->position == 'ped';
            ?>

            <?php if ($isAdmin || $isDecanat): ?>
                <form method="get" action="/handle-action">
                    <select name="action" onchange="this.form.submit()">
                        <option value="">добавить</option>
                        <option value="add-employee">Добавить сотрудника</option>
                        <option value="add-discipline">Добавить дисциплину</option>
                        <option value="add-faculty">Добавить кафедру</option>
                    </select>
                </form>
            <?php endif; ?>

            <form method="get" action="/handle-action">
                <select name="action" onchange="this.form.submit()">
                    <option value="">списки</option>
                    <?php if ($isAdmin || $isDecanat): ?>
                        <option value="list_employees">Список сотрудников</option>
                    <?php endif; ?>
                    <option value="list_disciplines">Список дисциплин</option>
                </select>
            </form>
            <?php if ($isTeacher): ?>
            <a href="<?= app()->route->getUrl('/profile') ?>">Личный кабинет (<?= $user->name ?>)</a>
            <?php endif; ?>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход</a>
        <?php endif; ?>
    </nav>
</header>
<main class="content">
    <?= $content ?? '' ?>
</main>
</body>
</html>