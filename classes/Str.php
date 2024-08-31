<?php
class Str{

    public function short_description($des){
        if(strlen($des) > 20){
            return substr($des,0,20).'...';
        }
    }
}


?>