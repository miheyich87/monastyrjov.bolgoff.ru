Тестовое задание "Четкий поиск - первый уровень"
================================================

Краткое описание
----------------

* __index.php__ - front controller
* __app/init.php__ - инициализация ядра
* __app__ - директория приложения
  * __app/core__ - базовые классы приложения
    * __app/core/route.php__ - роутинг
	* __app/core/db.php__ - класс для работы с БД
	* __app/core/controller.php__ - базовый класс контроллера
	* __app/core/model.php__ - базовый класс модели
	* __app/core/view.php__ - базовый класс view
* __app/config__ - файлы конфигураций
  * __app/config/db.sample.php__ - пример файла с параметрами для БД
* __app/controllers__ - директория с контроллерами приложения
* __app/models__ - директория с моделями приложения
* __app/views__ - директория с view приложения
  * __app/views/layout.php__ - layout приложения
  
Поиск
-----

Поиск реализован "в лоб": выбираются все препараты и циклически отбрасываются те, которые не удовлетворяют условиям.

Для больших объемов данных целесообразней использовать sphinx/elasticsearch.