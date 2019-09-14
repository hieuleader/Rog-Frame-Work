<?php

class Controller {

    public $db = null;

    public function __construct($db) {
        $this->db = $db;
    }

    public function view($viewName, $data = []) {
        if (!file_exists('App/Rog/View/'.$viewName.'.php')) {
            return false;
        }
        extract($data);
        require('App/Rog/View/'.$viewName.'.php');
    }
}