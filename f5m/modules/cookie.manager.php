<?php 

/*
    name        : CookieManager
    Version     : 2.0.2
	ver expl	: algorithm.function.bug
	developher	: fun5i
*/

namespace fun5i\manager\modules;
use DateTime;

class CookieManager {


    public static $_NAME_TOKEN = "_ftoken";

    private static $_T_TAHUN = 31536000; 
    private $_T_BULAN; 
    private static $_T_HARI      = 86400; 
    private static $_T_JAM       = 3600; 

    private $NAME;
    
    private $EXPIRES;
    private static $PATH = "/";
    private static $DOMAIN = "113.14.15.14";

    public function __construct($names){
        $this->NAME = $names;
        $this->EXPIRES = CookieManager::$_T_TAHUN;
        $dateTime = new DateTime();


        $this->_T_BULAN = $dateTime->format('m');
    }

    public function delate(){
        $arr_cookie_options = array (
            'expires' => time() - $this->EXPIRES,
            'path' => CookieManager::$PATH
        );
        setcookie(
            $this->NAME, 
            "", 
            $arr_cookie_options
        );
    }
    
    public function set($val){
        $options = array (
            'expires' => time() + $this->EXPIRES,
            'path' => CookieManager::$PATH
        );
        setcookie($this->NAME, 
            $val, 
            $options
        ); // add 
        
    }

    public function get(){
        if (isset($_COOKIE[$this->NAME]))
            return $_COOKIE[$this->NAME];
        return null;
    }

}

?>