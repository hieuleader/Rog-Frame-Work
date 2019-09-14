<?php 
use Root\Model;
use Carbon\Carbon;

class RogController extends Controller {

    private $rogModel = '';

    public function __construct() {
        $this->rogModel = Model::load('Rog');
    }

    public function show() {
        $this->rogModel::abc();
        
        $dataExample = [
            'title' => 'Rog Framework',
            'author' => 'Louis Gin'
        ];
        return $this->view('viewExample', $dataExample);
    }
}