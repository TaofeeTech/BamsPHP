<?php

//! HANDLE DATABASE CONNECTION AND REAL ESCAPE

class Database
{

    private $conn;

    public function __construct($host, $user, $password, $database)
    {

        $this->conn = new mysqli($host, $user, $password, $database);

        if($this->conn->connect_error)
        {

            die("Connection failed: " . $this->conn->connect_error);

        }

    }

    public function query($sql)
    {

        $result = $this->conn->query($sql);

        if(!$result) {

            die("Query Failed: " . $this->conn->error);

        }

        return $result;

    }

    public function realEscape($input)
    {

        return $this->conn->real_escape_string($input);

    }

    public function close()
    {

        $this->conn->close();
        
    }

}

