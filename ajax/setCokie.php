<? header('Content-Type: application/json'); ?>


<?

function process_form_data($data, $key)
{
    // Обработка данных формы
    if (empty($data[$key])) {
        return false;
    }
    return $data[$key];
}

function set_cookie($name, $value, $expire = 0)
{
    // Установка куки
    return setcookie($name, $value, $expire, '/', '', false, true);

}

// Обработка данных формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = false;

    foreach ($_POST as $key => $value) {
        $value = process_form_data($_POST, $key);
        if ($value !== false) {
            $status = set_cookie($key, $value);
        }
    }


    echo json_encode(array(
        "status" => $status,
    ));
}

?>


