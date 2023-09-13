<?php


try {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once '../models/CursoModel.php';
        
        $id_curso = $_GET['id_curso'];
        if (!isset($id_curso) || empty($id_curso)) {
            throw new Exception("O parâmetro 'id_curso' não pode ser vazio.");
        }
        $id_curso = filter_input(INPUT_GET, 'id_curso', FILTER_SANITIZE_NUMBER_INT);
        if (!is_numeric($id_curso)) {
            throw new Exception("O parâmetro 'id_curso' deve ser um número inteiro.");
        }

        $x = new CursoModel();
        $res = $x->getNumVagas($id_curso);
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

