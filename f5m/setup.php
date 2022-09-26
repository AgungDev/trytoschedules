<?php 
/*
    name            : Setup fun5i manager
    deskripsi       : Management user library
    version         : 1.0.0
    update          : none
*/

namespace fun5i\manager;

require_once __DIR__."/auth.php";

use fun5i\manager\Auth;

class Setup {

    private $auth;

    public function __construct(){
        $this->auth = new Auth();
    }

    public function hostName(){
        return $this->auth->loadF5M();
    }

    public function auth(){
        return $this->auth->getAuth();
    }

    public function logout(){
        $this->auth->removeAuth();
    }

    public function loginAction($redirectPages){
        /*
        Set in header, or top html tag
        */
        if (isset($_POST['email'], $_POST['pass'])){
            $email = htmlspecialchars($_POST['email']);
            $pass = htmlspecialchars($_POST['pass']);
            $login = $this->auth->login($email, $pass);

            if ($login){
                header("Location: ".$redirectPages);
            }else{
                echo "<script>alert('Failed Login, ".$email."')</script>";
            }
        }
    }

    public function logins(){
        if(self::getToken() != null){
            echo self::getToken();
        }else{
            require_once __DIR__.'/pages/login.php';
        }
        
    }

    public function getToken(){
        return $this->auth->getToken();
    }
}