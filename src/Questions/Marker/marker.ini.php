<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Questions\Marker;

abstract class Marker {
    abstract public function mark($answer);
    abstract public function handle($answer);
}

class MarkerMatch extends Marker {
    private $response;
    private $responseArr;
    private $answerArr;
    
    public function __construct($response) {
        $this->response = $response;
    }
    
    public function handle($answer){
         
    }
    
    public function mark($answer){
        return ($this->response === $answer);
    }
}

class MarkerList extends Marker {
    private $response;
    
    public function __construct($response) {
        $this->response = $response;
    }
    
    public function handle($answer){
        if ( (strpos($answer, ',') !== true) && (strpos($this->response, ',') !== true)) {
            $answer = str_replace(" ", "", $answer);
            $this->answerArr = explode(",", $answer);
            
            $this->response = str_replace(" ", "", $this->response);
            $this->responseArr = explode(",", $this->response);
        }
    }
    
    public function mark($answer){
        $this->handle($answer);
        
        $res = array_intersect($this->answerArr, $this->responseArr);
        return (count($res) === count($this->responseArr));
    }
}