<?php
header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once '../models/CursoModel.php';
        $x = new CursoModel();
        $res = $x->getAllNumVagas();
        http_response_code(200);
        echo json_encode($res);
        exit;
    } else {
        http_response_code(405);
        echo json_encode(array('message' => 'Método não permitido'));
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array('error' => 'Ocorreu um erro no servidor: ' . $e->getMessage()));
}
