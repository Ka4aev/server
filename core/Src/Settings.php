<?php
namespace Src;
use Error;
class Settings
{
    private array $_settings;
    public function __construct(array $settings = [])
    {
        $this->_settings = $settings;
    }
    public function __get($key)
    {
        if (array_key_exists($key, $this->_settings)) {
            return $this->_settings[$key];
        }
        throw new Error('Accessing a non-existent property');
    }
    public function getRootPath(): string
    {
        return $this->path['root'] ? '/' . $this->path['root'] : '';
    }
    public function getViewsPath(): string
    {
        return '/' . $this->path['views'] ?? '';
    }
}
//Класс Settings в целом похож на класс Application. В нем содержится массив $_settings
//хранящий массив с настройками приложения. Доступ к этим настройкам также
//реализован через магический метод __get(). Метод getRootPath() возвращает url путь до приложения