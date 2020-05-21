<!--Логгирование в JSON по PSR-->
<!--Написать класс, который умеет записывать логи в формате JSON по стандарту PSR-3. Файл лога-->
<!--должен быть корректным JSON-массивом, каждая запись в логе - отдельный JSON-объект с-->
<!--полями:-->
<!--1. Тип записи-->
<!--2. Время записи-->
<!--3. Содержимое.-->
<!--Методы логирования следует вызывать из вспомогательного класса. Весь проект должен быть-->
<!--выполнен с соблюдением PSR-1/2.-->



<pre><?php
    require_once("Logger.php");
    use logger\Logger;

    if (isset($_POST["send"])) {
        $logger = new Logger("log.txt");
        $logger->log("emergency", "Message for emergency");
        $logger->log("alert", "Message for alert");
        $logger->log("critical", "Message for critical");


    } else {
        include "web.html";
    }






    ?>



</pre>


