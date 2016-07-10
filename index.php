<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'src/Questions/Question/question.ini.php';
require_once 'src/Questions/Marker/marker.ini.php';

use \Questions\Question\Question;
use \Questions\Marker\MarkerMatch;
use \Questions\Marker\MarkerList;

$answers = array(
    'six', 'three', 'Britain Queen', 5, 'five', '5',
    'public, private, protected', 'red, blue, white'
);
$questions = array();
$questions[0] = new Question("How many fingers do a human hand has?", new MarkerMatch(5));
$questions[1] = new Question("Which access modifiers do you know?", new MarkerList('public, protected, private'));

foreach($questions as $q) {
    
    echo '<h2>' . $q->prompt . '</h2>';
    echo '<p>';
    
    foreach($answers as $a) {
        $q->answer($a);
       
        echo 'Your answer: <strong>' . $q->getHTML($a) . '</strong>; ';
        echo 'Scope: <strong>' . $q->scope . '</strong><br>';
    }
    
    echo '</p>';
}




