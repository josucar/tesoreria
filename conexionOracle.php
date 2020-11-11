<?php

class Conexion
{
    private $db = 'oci:dbname=(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=172.23.50.49)(PORT=1521))(CONNECT_DATA=(SID=BDSAL)))';
    private $user ='JDCARRERA';
    private $pass = 'info2020';

    public function Conectar()
    {
        try {
            $base = new PDO($this->db, $this->user, $this->pass);
            $base->exec("SET CARACTER SET utf8");

            if ($base) 
            {
                return $base;
            }
        } catch (Exception $e) {
            echo "Error de conexion: " . $e->getMessage();
        }
    }
}
