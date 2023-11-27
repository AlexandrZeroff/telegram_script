<?php

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "6871308154:AAGuFJ-GBTenHdWDji89TqtaZh-QGH_Cx1g";

//Сюда вставляем chat_id
$chat_id = "503783030";

//Определяем переменные для передачи данных из нашей формы
if ($_POST['act'] == 'order') {
    $name = ($_POST['name']);
    $phone = ($_POST['phone']);
    $city = ($_POST['city']);

//Собираем в массив то, что будет передаваться боту
    $arr = array(
        'Iм`я:' => $name,
        'Телефон:' => $phone,
        'Мiсто:' => $city,
    );

//Настраиваем внешний вид сообщения в телеграме
    foreach($arr as $key => $value) {
        $txt .= "".$key." ".$value."%0A";
    };

//Передаем данные боту
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

//Выводим сообщение об успешной отправке
    if ($sendToTelegram) {
        alert('Запит вiдправлено!');
    }

//А здесь сообщение об ошибке при отправке
    else {
        alert('Щось пiшло не так. Будь ласка, вiдправте форму ще раз!');
    }
}

?>
