<?php

if(isset($_POST)){
    extract($_POST);
    $operators = array('+', '-', '*', '/', '%', 'x2', '+/-','.', '=');
    $out = '';
    switch($action){
        case 'equal':
            $last = '';
            if(strlen($old)>0) {
                $last = substr($old, -1);
            }
            if($old <> '' and !in_array($last, $operators)){
               $out = eval("return ($old);");
            } else {
                $out = $old;
            }
        break;
        case 'operation':
            $last = '';
            if(strlen($old)>0) {
                $last = substr($old, -1);
            } 
            if( in_array($last, $operators) and in_array($num, $operators) ){
                
                    $out = $old;
              
            } else if($old == '' and in_array($num, $operators ) and $num<>'.'){
                $out = '';
            } else {
                $out = $old.$num;
            }
            if($out<>'' and $num === '%' and !in_array($last, $operators)){
                $out= eval("return ($old)/100;");
            }
            if($out<>'' and $num === 'x2' and !in_array($last, $operators)){
                $out= eval("return ($old*$old);");
            }
        break;
        default: $out = $old;
    }
    echo $out;
} 