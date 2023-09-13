<?php 
include '../../private_dbconnection/config.php';


class Conexao
{
    protected $conn;

    protected function db_connect()
    {
        try {
            $this->conn = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    protected function db_close()
    {
        $this->conn = null;
    }
}