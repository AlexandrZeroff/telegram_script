<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "6314327492:AAFdPDyD0zX52YXOVYWxGSehE2Eu_F4hUxI";

//Сюда вставляем chat_id
$chat_id = "-4152174945";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $name = ($_POST['name']);
    $phone = ($_POST['phone']);
    $question = ($_POST['question']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Iм`я:' => $name,
        'Телефон:' => $phone,
        'Запитання:' => $question,
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "".$key." ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        console.log('Запит успішно вiдправлено!');
    }

//А здесь сообщение об ошибке при отправке
    else {
        console.log('Щось пiшло не так. Будь ласка, вiдправте форму ще раз!');
    }
}

?>
