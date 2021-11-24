<?php

?>
<html>
    <head>
        <title>Calculator</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            .but{
                width: 25px;
                height: 25px;
                font-weight: bold;
                text-align: center;
            }
            .cls{
                width: 25px;
                height: 25px;
                font-weight: bold;
                text-align: center;
                color: #ffffff;
                background-color: red;
            }
            .eql{
                width: 100%;
                height: 25px;
                font-weight: bold;
                text-align: center;
                color: #ffffff;
                background-color: green;
            }
            .display{
                background-color: #BCCD64;
                border:1px #666 solid; 
                height: 50px; width: 150px; 
                text-align: right; 
                font-size: 20px;
            }
        </style>
        <script>
            $(document).ready(function(){
                $('input[type=button]').click(function(){
                    var num = $(this).val();
                    var old = $('#display').html();
                    if( num === 'C' ){
                        $('#display').html('');
                        return;
                    }
                    if( num === '=' ){
                        $('#display').html(old);
                        return;
                    }