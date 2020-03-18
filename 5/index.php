<pre><?php

//    Пользователь вводит пароль. При помощи регулярного выражения или
//нескольких проверяется соответствие пароля следующим правилам:
//1. Длина пароля не менее 10 символов
//2. пароль содержит хотя бы по 2 символа из каждой категории: латинские
//прописные буквы; латинские строчные буквы; цифры; символы %$#_*
//3. Пароль не содержит более чем 3 символов любой категории подряд
//Если одно из правил нарушено, пользователю нужно вывести
//соответствующее правило, например "пароль содержит более 3 цифр
//подряд" или "в пароле содержится менее 2 специальных символов"

if (isset($_POST["send"])) {
    $par_pos = 0;
    $password = $_POST["password"];
    if(!(preg_match('|^.{10,}$|', $password))){
        print('Your password contains less than 10 characters!');
        print("<br/>");
    }
    else if(!((preg_match('|^(.*\d.*){2,}$|', $password)) && (preg_match('|^(.*[a-z].*){2,}$|', $password))
        && (preg_match('|^(.*[A-Z].*){2,}$|', $password)) && (preg_match('|^(.*[%,$,#,_,*].*){2,}$|', $password)))){
        print('Password contains less than 2 special characters');
        print("<br/>");
        print('Special characters: uppercase and lowercase letters, numbers and %,$,#,_,*');
        print("<br/>");
    }
    else if((preg_match('|^.*\d{4,}.*$|', $password)) || (preg_match('|^.*[a-z]{4,}.*$|', $password))
        || (preg_match('|^.*[A-Z]{4,}.*$|', $password)) || (preg_match('|^.*[%,$,#,_,*]{4,}.*$|', $password))){
        print('Password contains more than 3 special characters contract');
        print("<br/>");
    }
    else{
        print('Password is suitable');
    }





} else {
    include "web.html";
}
?>
</pre>


