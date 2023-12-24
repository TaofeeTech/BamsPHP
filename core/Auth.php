<?php

require_once("Crud.php");

//! HANDLE AUTHENTICATION

class Auth extends Crud
{

    // public $is_logged_in = false;

    public function login($username, $password, $remeberMe)
    {
        // Validate credentials

        $userData = $this->validateCredentials($username, $password, $remeberMe);

        if ($userData) {

            // set session
            session_start();
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['role'] = $userData['role'];
            $_SESSION['is_logged_in'] = true;

            return true; //login successfull

        }

        return false; //login failed

    }


    public function logout()
    {

        // Destroy Session
        session_start();
        session_unset();
        session_destroy();

        // clear remember_me cookie
        // setcookie

    }


    private function validateCredentials($username, $password, $remeberMe)
    {

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        // Sanitize input to prevent sql injection
        $username = $db->realEscape($username);
        $password = $db->realEscape($password);

        // Query the database for the user
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $db->query($query);

        // Check if user exist and if the password matches
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            $storedPassword = $row['password'];

            // compare store password with the provided password
            if (password_verify($password, $storedPassword)) {

                // password is correct
                // $db->close();

                if ($remeberMe === 'on') {

                    // set cookies
        
                    setcookie('remeber_me', $username, time() + (30 * 24 * 60 * 60),);
        
                }

                return [

                    'id' => $row['id'],
                    'username' => $row['username'],
                    'firstname' => $row['firstname'],
                    'lastname' => $row['lastname'],
                    'email' => $row['email'],
                    'role' => $row['role'],

                ];

                // return true;

            }


        }

        // close the database connection
        $db->close();

        // if user doesn't exist or password don't match
        return false;

    }

    public function register($userData)
    {

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        // Sanitize input to prevent sql injection
        foreach ($userData as $key => $value) {

            $userData[$key] = $db->realEscape($value);

        }

        // Hash the password
        $userData['password'] = password_hash($userData['password'], PASSWORD_BCRYPT);

        // Check if username is already taken
        if ($this->userNameTaken($userData['username'])) {

            $db->close();
            return false; //Username taken registration failed

        }

        // Check if email is already taken
        if ($this->emailTaken($userData['email'])) {

            $db->close();
            return false; //Email taken registration failed

        }

        $result = $this->insert($table = 'users', $userData);

        // close the database connection
        $db->close();

        return $result; // Return true on successful registration. false otherwise

    }

    public function getSession($key)
    {

        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;

    }

    public function removeSession($key)
    {

        if (isset($_SESSION[$key])) {

            unset($_SESSION[$key]);

        }

    }

    private function userNameTaken($username)
    {

        /** 
         * Check if a username is taken
         * 
         * @param string $username The username to check.
         * @return bool True if the username is taken, false otherwise.
        */

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        $query = "SELECT username FROM users WHERE username = '$username'";
        $result = $db->query($query);

        return $result->num_rows > 0; 

    }

    private function emailTaken($email)
    {

         /** 
         * Check if a username is taken
         * 
         * @param string $email The username to check.
         * @return bool True if the username is taken, false otherwise.
        */

        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "";
        $dbName = "framework";

        // Create a Database Instance
        $db = new Database($dbHost, $dbUser, $dbPass, $dbName);

        $query = "SELECT email FROM users WHERE email = '$email'";
        $result = $db->query($query);

        return $result->num_rows > 0; 

    }


    // Add more session method here to transfer data, remeber me, forget password, e.t.c

}