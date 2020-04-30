<!--Нужно создать иерархию из 5 разных классов-исключений
и класс, с 4 методами, каждый из которых может выкинуть случайным образом 2 разных исключения.
Основной код долженсоздавать объект этого класса и
поочерёдно вызывать все его методы,
отлавливая все возможные ошибки этого метода и выводя на экран название возникшей ошибки.
Все классы должны находиться в отдельных файлах, ошибки - в другом пространстве имён.
Основной код должен загружать нужные классы автоматически.-->



<pre><?php
    require_once("FirstException.php");
    require_once("SecondException.php");
    require_once("ThirdException.php");
    require_once("FourthException.php");
    require_once("FifthException.php");
    require_once("MyClass.php");
    if (isset($_POST["send"])) {
        $cl = new MyClass();
        try {
            $cl->first();
            $cl->toString();
        }catch (FirstException $eF) {
            echo "Поймано FirstException или его наследники в методе first\n", $eF;
        }catch (FifthException $eF){
            echo "Поймано FifthException или его наследники в методе first\n", $eF;
        }

        try {
            $cl->second();
        }catch (FirstException $eF){
            echo "Поймано FirstException или его наследники в методе second\n", $eF;
        }catch  (FifthException $eF){
            echo "Поймано FifthException или его наследники в методе second\n", $eF;
        }

        try {
            $cl->third();
        }catch (FirstException $eF){
            echo "Поймано FirstException или его наследники в методе third\n", $eF;
        }catch  (FifthException $eF){
            echo "Поймано FifthException или его наследники в методе third\n", $eF;
        }

        try {
            $cl->fourth();
        }catch (FirstException $eF){
            echo "Поймано FirstException или его наследники в методе fourth\n", $eF;
        }catch  (FifthException $eF){
            echo "Поймано FifthException или его наследники в методе fourth\n", $eF;
        }

    } else {
        include "web.html";
    }
    ?>



</pre>


