<?php

namespace common\library;

class Factory {

    //保存类实例的静态成员变量
    private static $_instance;

    //private标记的构造方法
    private function __construct() {
        
    }

    //创建__clone方法防止对象被复制克隆
    public function __clone() {
        exit(__CLASS__ . "  Can not be cloned");
    }

    //单例方法,用于访问实例的公共的静态方法
    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    function __get($key) {
        if (isset($this->$key)) {
            return($this->$key);
        } else {
            return(NULL);
        }
    }

    function __set($key, $value) {
        $this->$key = $value;
    }

    static function createFieldCache() {
        $FieldCache = new FieldCache();
        return $FieldCache;
    }

}
