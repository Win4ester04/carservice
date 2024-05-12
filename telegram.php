<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, что все необходимые поля заполнены
    if (empty($_POST['user_name']) || empty($_POST['user_phone']) || empty($_POST['description'])) {
        // Если хотя бы одно поле пустое, выводим сообщение об ошибке
        echo '<script>alert("Пожалуйста, заполните все поля формы.");';
        echo 'window.location.href = "index.html";</script>';
        exit; // Останавливаем выполнение PHP-скрипта
    }}

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$description = $_POST['description'];
$token = "7156056549:AAEGLt_4LQMh7jdvWygyOH0wZrPcyvTYmlI";
$chat_id = "-4226084688";
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'Описание' => $description
);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) {
    echo '<script>alert("Ваша заявка успешно отправлена!");';
    echo 'window.location.href = "index.html";</script>';
} else {
  echo '<script>alert("Произошла ошибка при отправке заявки.");';
  echo 'window.location.href = "index.html";</script>';
}

?>


