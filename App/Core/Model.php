<?php
namespace Root;

class Model {
    
    public static function all() {
        echo "Show all";
    }

    public static function load($modelName) {
        if (!file_exists('App/Rog/Model/'.$modelName.'.php')) {
            return false;
        }
        require('App/Rog/Model/'.$modelName.'.php');
        return new $modelName();
    }
}