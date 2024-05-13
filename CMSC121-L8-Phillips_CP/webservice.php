<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = file_get_contents("php://input");
    $requestData = json_decode($requestData, true);

    if (isset($requestData['todolist'], $requestData['todolist']['items'])) {
        $todoList = $requestData['todolist'];
        file_put_contents("list.json", json_encode($todoList));
        http_response_code(200);
    } else {
        http_response_code(400);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists("list.json")) {
        $listContents = file_get_contents("list.json");
        echo $listContents;
    } else {
        http_response_code(204);
    }
} else {
    http_response_code(405);
}
?>
