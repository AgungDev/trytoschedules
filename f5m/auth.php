<?php 
/*
    name            : Auth
    deskripsi       : Management user library
    version         : 1.0.0
    update          : none
*/
namespace fun5i\manager;

require_once __DIR__."/modules/cookie.manager.php";

use fun5i\manager\modules\CookieManager;

class Auth {

    private $_API;

    private $cookieManager;

    public function __construct(){
        $this->cookieManager = new CookieManager(CookieManager::$_NAME_TOKEN);
        $this->_API = "http://".$this->loadF5M()->{'server'}."/api/"; // setHost
    }

    public function loadF5M(){
        $file = __DIR__."/f5m.json";
        $filedata = file_get_contents($file);
        $details = json_decode($filedata);

        return ($details);
    }

    private function curlSign($post){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->_API."users.php?signin");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($ch);

        return json_decode($response);
    }

    public function login($email, $pass){
        $out = false;
        $post = [
            'email' => $email,
            'password' => $pass
        ];
        $response = $this->curlSign($post);

        if (!$response->{'error'}){
            $token = $response->{'result'}->{'token'};
            $this->cookieManager->set($token);
            $out = true;
        }
        return $out;
    }

    public function getAuth(){
        $out = false;
        if ($this->getToken() != null){
            $post = [
                'token' => $this->getToken()
            ];
            $response = self::curlSign($post);
            if (!$response->{'error'}){
                $out = true;
            }else{
                $this->removeAuth();
            }
        }

        return $out;
    }

    public function removeAuth(){
        $this->cookieManager->delate();
    }

    public function getToken(){
        return $this->cookieManager->get();
    }
}