<?php

if (isset($_POST['name'])) {$name = $_POST['name']; if ($name == '') {unset($name);}}
if (isset($_POST['email'])) {$email = $_POST['email']; if ($email == '') {unset($email);}}
if (isset($_POST['website'])) {$email = $_POST['website']; if ($email == '') {unset($website);}}
if (isset($_POST['body'])) {$body = $_POST['body']; if ($body == '') {unset($body);}}

if (isset($name) && isset($email) && isset($body)){

    $address = "ghtheme@gmail.com";
    $mes = "Имя: $name \nE-mail: $email \nWebsite: $website \nТекст: $body";
    $send = mail ($address,$mes,"Content-type:text/plain; charset = UTF-8\r\nFrom:$email");
    if ($send == 'true')
    {echo "Сообщение отправлено, теперь Вы можете перейти на главную страницу и продолжить чтение <a href='http://rex.site.ua/'>Rex</a>";}
    else {echo "Ошибка, сообщение не отправлено!";}

}
else
{
    echo "Вы заполнили не все поля, необходимо вернуться назад!";
}