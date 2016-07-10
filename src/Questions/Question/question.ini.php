<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Questions\Question;

interface HTMLable {
    public function getHTML($answer);
}

class Question implements HTMLable {
    public $prompt;
    protected $marker;
    public $answer;
    public $scope;
    
    public function __construct($prompt, $marker) {
        $this->prompt = $prompt;
        $this->marker = $marker;
    }
    
    public function answer($answer) {
        $this->answer = '';
        $this->scope  = 0;
        
        if ($this->marker->mark($answer) === true) {
            $this->answer = $answer;
            $this->scope  = 1;
        }
    }
    
    public function getHTML($answer) {
        
        $style = ($this->scope === 1) ? "green" : "red";
        return '<span style="color:' . $style . '">' . $answer . '</span>';
    }
    
}