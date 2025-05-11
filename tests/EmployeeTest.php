<?php

use Model\User;
use PHPUnit\Framework\TestCase;
use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Auth\Auth;
use Src\Request;

class EmployeeTest extends TestCase
{
    protected function setUp(): void
    {
        // Установка переменной среды
        $_SERVER['DOCUMENT_ROOT'] = '/OSPanel/domains/server.loc';

        // Инициализация базы данных
        $this->initializeDatabase();

        // Создаем экземпляр приложения
        $this->initApplication();
    }

    protected function initApplication(): void
    {
        // Конфигурация базы данных для тестов
        $dbConfig = [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'server',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ];

        $GLOBALS['app'] = new Src\Application(new Src\Settings([
            'app' => include $_SERVER['DOCUMENT_ROOT'] . '/config/app.php',
            'db' => $dbConfig,
            'path' => include $_SERVER['DOCUMENT_ROOT'] . '/config/path.php',
        ]));

        if (!function_exists('app')) {
            function app()
            {
                return $GLOBALS['app'];
            }
        }
    }

    protected function initializeDatabase(): void
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'server',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    /**
     * @dataProvider employeeProvider
     */
    public function testAddEmployee(): void
    {
        // Подготовка тестовых данных
        $employeeData = [
            'name' => 'Test',
            'surname' => 'User',
            'birth_date' => '1990-01-01',
            'address' => 'Test address',
            'login' => 'testuser',
            'password' => 'Test123!',
            'position' => 'decanat',
            'faculty_id' => 1
        ];

        // Создание заглушки запроса
        $request = $this->createMock(Request::class);
        $request->expects($this->any())
            ->method('all')
            ->willReturn($employeeData);
        $request->method = 'POST';

        // Авторизация от имени администратора
        $this->authAsAdmin();

        // Вызов метода контроллера
        $controller = new \Controller\UserController();
        $controller->addEmployee($request);

        // Проверка: пользователь успешно добавлен
        $userExists = User::where('login', 'testuser')->exists();
        $this->assertTrue($userExists);

        // Очистка после теста
        User::where('login', 'testuser')->delete();
    }


    private function authAsAdmin(): void
    {
        $admin = User::where('login', 'admin')->first();
        if ($admin) {
            Auth::login($admin);
        }
    }

    public static function employeeProvider(): array
    {
        return [
            ['GET', [
                'name' => '',
                'surname' => '',
                'birth_date' => '',
                'address' => '',
                'login' => '',
                'password' => ''
            ], ''],

            ['POST', [
                'name' => '',
                'surname' => '',
                'birth_date' => '',
                'address' => '',
                'login' => '',
                'password' => ''
            ],
                '{"name":["Поле name обязательно для заполнения"],"surname":["Поле surname обязательно для заполнения"],"birth_date":["Поле birth_date обязательно для заполнения"],"address":["Поле address обязательно для заполнения"],"login":["Поле login обязательно для заполнения"],"password":["Поле password обязательно для заполнения"]}'
            ],

            ['POST', [
                'name' => 'Test',
                'surname' => 'User',
                'birth_date' => '2050-01-01',
                'address' => 'Test address',
                'login' => 'login is busy',
                'password' => '123'
            ],
                '{"birth_date":["Дата рождения не может быть в будущем"],"password":["Пароль должен содержать минимум 6 символов, включая цифру, заглавную букву и спецсимвол"],"login":["Поле login уже занято"]}'
            ],

            ['POST', [
                'name' => 'Test',
                'surname' => 'User',
                'birth_date' => '1990-01-01',
                'address' => 'Test address',
                'login' => 'testuser',
                'password' => 'Test123!',
                'position' => 'decanat',
                'faculty_id' => 1
            ],
                'Location: /employees']
        ];
    }

    protected function tearDown(): void
    {
        // Очищаем данные после тестов
        User::where('login', 'testuser')->delete();
    }
}