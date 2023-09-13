<?php
include '../database/Conexao.Class.php';


class CursoModel extends Conexao
{
    private $default_fields;
    private $InsertCursoParams;

    public function __construct()
    {
        $this->default_fields = '(`nome, descricao, url_img, data, prazo_de_inscricao, hora_inicio, hora_fim, num_vagas, vagas_diponiveis)';
        $this->InsertCursoParams = '(`:nome, :descricao, :url_img, :data, :prazo_de_inscricao, :hora_inicio, :hora_fim, :num_vagas, :vagas_diponiveis)';
    }

    // Não testado
    public function inserirUmNovoCurso($form_campos)
    {
        try {
            $insertUserQuery = "INSERT INTO Users " . $this->default_fields . " VALUES " . $this->InsertCursoParams;
            $this->conn->beginTransaction();
            $stmt = $this->conn->prepare($insertUserQuery);
            //bindParam();
            $stmt->execute($form_campos);
            $this->conn->commit();
            $this->db_close();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    // Não testado
    function updateInfoIncricao($nome_completo, $id_inscrito, $id_curso)
    {
        try {
            $this->db_connect();
            $this->conn->beginTransaction();
            $sql = "UPDATE Inscritos SET nome_completo = :n_c, id_curso = :i_c WHERE id_inscrito = :i_i";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':n_c', $nome_completo);
            $stmt->bindParam(':i_i', $id_inscrito);
            $stmt->bindParam(':i_c', $id_curso);
            $stmt->execute();
            $this->conn->commit();
            $this->db_close();

            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }


    function nova_inscricao($nome_completo, $id_curso)
    {
        try {
            $numVagas = $this->getNumVagas($id_curso);

            if ($numVagas >= 1) {
                $this->decrementVagasDisponiveis($id_curso);
                $this->db_connect();
                $this->conn->beginTransaction();
                $insertUserQuery = "INSERT INTO `Inscritos` (`nome_completo`, `id_curso`) VALUES (:nome_completo, :id_curso)";
                $stmt = $this->conn->prepare($insertUserQuery);
                $stmt->bindParam(':nome_completo', $nome_completo, PDO::PARAM_STR);
                $stmt->bindParam(':id_curso', $id_curso, PDO::PARAM_INT);
                $stmt->execute();
                $this->conn->commit();
                $this->db_close();
                return true;
            }
            return false;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }


    function getInscritos($id_curso = null)
    {
        $c = "c.nome, i.nome_completo, i.created_at 'data_inscricao'";
        $sql = "SELECT " . $c . " FROM Cursos c 
                LEFT JOIN Inscritos i
                ON c.id_curso = i.id_curso
                WHERE deleted_at IS NULL AND created_at IS NOT NULL";

        if ($id_curso !== null) {
            $sql .= " AND c.id_curso = :id_curso";
        }

        try {
            $this->db_connect();
            $stmt = $this->conn->prepare($sql);

            if ($id_curso !== NULL) {
                $stmt->bindParam(':id_curso', $id_curso);
            }

            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->db_close();
            return json_encode(array('inscritos' => array('curso_' . $id_curso => $res)));
        } catch (Exception $e) {
            // die('DB ERROR -> getInscritos(): ' . $e->getMessage());
            return false;
        }
    }


    function removerInscricao($id_inscrito, $id_curso)
    {
        try {
            $this->db_connect();
            $this->conn->beginTransaction();
            $sql = "UPDATE Inscritos SET deleted_at = NOW() WHERE id_inscrito = :id_inscrito";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_inscrito', $id_inscrito);
            $stmt->execute();
            $this->conn->commit();
            $this->db_close();

            $this->incrementVagasDisponiveis($id_curso);
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
            // die('DB ERROR -> checkUserNameExists(): ' . $e->getMessage());
        }
    }


    function getNumVagas($id_curso = null)
    {
        try {
            $this->db_connect();
            $sql = "SELECT vagas_disponiveis FROM Cursos WHERE id_curso = :id_curso";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_curso', $id_curso);
            $stmt->execute();
            $temp = $stmt->fetchAll(PDO::FETCH_OBJ);
            $numVagas = $temp[0]->vagas_disponiveis;
            $this->db_close();
            return $numVagas;
        } catch (Exception $e) {
            die('DB ERROR -> getNumVagas(): ' . $e->getMessage());
        }
    }


    function decrementVagasDisponiveis($id_curso)
    {
        try {
            $numVagas = $this->getNumVagas($id_curso);

            if ($numVagas >= 1) {
                $this->db_connect();
                $this->conn->beginTransaction();
                $sql = "UPDATE Cursos SET vagas_disponiveis = vagas_disponiveis - 1 WHERE id_curso = :id_curso";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id_curso', $id_curso);
                $stmt->execute();
                $this->conn->commit();
                $this->db_close();
            }
            return $numVagas >= 1;
        } catch (Exception $e) {
            $this->conn->rollBack();
            die('DB ERROR -> decrementVagasDisponiveis(): ' . $e->getMessage());
        }
    }


    function incrementVagasDisponiveis($id_curso)
    {
        try {
            $numVagas = $this->getNumVagas($id_curso);

            if ($numVagas <= 19) {
                $this->db_connect();
                $this->conn->beginTransaction();
                $sql = "UPDATE Cursos SET vagas_disponiveis = vagas_disponiveis + 1 WHERE id_curso = :id_curso";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id_curso', $id_curso);
                $stmt->execute();
                $this->conn->commit();
                $this->db_close();
            }
            return $numVagas <= 19;
        } catch (Exception $e) {
            $this->conn->rollBack();
            die('DB ERROR -> checkUserNameExists(): ' . $e->getMessage());
        }
    }


    function getAllNumVagas()
    {
        try {
            $this->db_connect();
            $sql = "SELECT * FROM Cursos";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $cursos = $stmt->fetchAll(PDO::FETCH_OBJ);
            $this->db_close();
            return $cursos;
        } catch (Exception $e) {
            die('DB ERROR -> ' . $e->getMessage());
        }
    }
}