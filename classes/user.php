<?php

class User {
    private $_db,
            $_data;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
    }


    public function makeAccount($username,$name,$password, $hashedpassword,$repassword){
        $errors = [];
            $acc = $this->_db->query('SELECT * FROM users WHERE username = ?', array(
                $username
            ));
        if($this->_db->count() != 1){
            if($password == $repassword){
                if(strlen($username) > 3){
                    if(strlen($password) > 8){
                        $makeAcc = $this->_db->query('INSERT INTO users(username,name,password) VALUES(?,?,?)', array(
                            $username,$name,$hashedpassword
                        ));
                        if(!$this->_db->error()){
                            return 'True';
                        }        
                    } else {
                        $errors[] = 'Your Password Must Be more 8 Characters';
                    }
                } else {
                    $errors[] = 'Your Username Must Be more 8 Characters';            
                }
            } else {
                $errors[] = 'Your Passwords is not matches';                        
            }
        } else {
            $errors[] = 'Choose other username';     
        }

        if(count($errors)){
            return $errors;
        }
    }

    public function login($username,$password){
        $acc = $this->_db->query('SELECT * FROM users WHERE username = ? AND password = ?', array(
            $username,$password
        ));

        if($this->_db->count() > 0){
            return true;
        } else {
            return false;
        }
    }


    public function isLoggedIn(){
        if(isset($_SESSION['username'])){
            return true;
        } else {
            return false;
        }
    }


}