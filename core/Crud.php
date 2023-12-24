<?php

//! HANDLE CRUD OPRATIONS

class Crud
{

    public function selectAll($table)
    {

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        $query = "SELECT * FROM $table";
        $result = $db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function selectById($table, $id)
    {

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        $id = $db->realEscape($id);
        $query = "SELECT * FROM $table WHERE id = $id";
        $result = $db->query($query);
        return $result->fetch_assoc();

    }

    public function selectWhere($table, $column, $value)
    {

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        $column = $db->realEscape($column);
        $value = $db->realEscape($value);
        $query = "SELECT * FROM $table WHERE $column = '$value'";
        $result = $db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function selectWhere2($table, $column, $value)
    {

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        $column = $db->realEscape($column);
        $value = $db->realEscape($value);
        $query = "SELECT * FROM $table WHERE $column = '$value'";
        // return $db->query($query);
        // return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function insert($table, $data)
    {

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        $column = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $query = "INSERT INTO $table ($column) VALUES ($values)";
        return $db->query($query);

    }

    public function update($table, $data, $id) 
    {

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        $id = $db->realEscape($id);
        $setClause = '';
        foreach($data as $column => $value){
            $setClause .= "$column = '$value', ";
        }
        $setClause = rtrim($setClause, ', ');
        $query = "UPDATE $table SET $setClause WHERE id = $id";
        return $db->query($query);
    }

    public function delete($table, $id)
    {

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        $id = $db->realEscape($id);
        $query = "DELETE FROM $table WHERE id = $id";
        return $db->query($query);

    }

    // ADD MORE !CRUD METHOD HERE

}