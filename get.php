<?php
class UNI
{
    function get($opt)
    {
        // Предположим что $GLOBALS['connect'] подключает нас к бд
        $arr = array();
        $ALLROW = @mysqli_query($GLOBALS['connect'], $opt);
        while ($row = @mysqli_fetch_array($ALLROW, MYSQLI_ASSOC)) {
            $arr[] = $row;
        }
        return $arr;
    }
}

$data = file_get_contents( "php://input" );
$data = json_decode($data, true);
if (isset($data['get'])) {
    $arr = $data['arr'];
    // $get = UNI::get('SELECT * FROM table'); //Впишите сюда MySQL запрос для получения всех данных из таблицы "table"
    $get = ['id' => 1, 'name' => 'Name'];
    $arr[] = $get;
    // echo true; // в echo отдайте $arr в json формате
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($arr);
}
