<?php

?>
<html>
    <head>
        <title>Calculator</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <style>
            .but{
                width: 70px;
                height: 70px;
                font-weight: bold;
                text-align: center;
            }
            .cls{
                width: 70px;
                height: 70px;
                font-weight: bold;
                text-align: center;
                color: #ffffff;
                background-color: black;
            }
            .eql{
                width: 100%;
                height: 70px;
                font-weight: bold;
                text-align: center;
                color: #ffffff;
                background-color: black;
            }
            .display{
                background-color: #808080;
                border:1px #666 solid; 
                height: 150px; width: 380px; 
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
                    $.ajax({
                            url:'ajax.php',
                            type: "POST",
                            data:{'action':'operation','num':num,'old':old},
                            success: function(msg){
                                $('#display').html(msg);
                            }
                        }).error(function(){
                            $('#display').html('Oops! An error occured');}
                           );
                });
                $('#eql').click(function(){
                    var num = $('#display').html();
                    var old = $('#display').html();
                    $.ajax({
                            url:'ajax.php',
                            type: "POST",
                            data:{'action':'equal', 'num':num, 'old':old},
                            success: function(msg){
                                $('#display').html(msg);
                            }
                        }).error(function(){
                            $('#display').html('Oops! An error occured.');}
                           );
                });
            });
        </script>
    </head>
    <body>

<table width="120">
    <tr>
        <td colspan="5"><textarea id="display" class="display"></textarea></td>
    </tr>
    <tr>
        <td><input value="7" type="button" class="but"></td>
        <td><input value="8" type="button" class="but"></td>
        <td><input value="9" type="button" class="but"></td>
        <td><input id="plus" value="+" type="button" class="but"></td>
        <td><input id="cls" value="C" type="button" class="cls"></td>
    </tr>
    <tr>
        <td><input value="4" type="button" class="but"></td>
        <td><input value="5" type="button" class="but"></td>
        <td><input value="6" type="button" class="but"></td>
        <td><input id="sub" value="-" type="button" class="but"></td>
        <td><input id="sqr" value="x2" type="button" class="but"></td>
    </tr>
    <tr>
        <td><input value="1" type="button" class="but"></td>
        <td><input value="2" type="button" class="but"></td>
        <td><input value="3" type="button" class="but"></td>
        <td><input id="mul" value="*" type="button" class="but"></td>
        <td><input id="per" value="%" type="button" class="but"></td>
    </tr>
    <tr>
        <td><input value="0" type="button" class="but"></td>
        <td><input id="dot" value="." type="button" class="but"></td>
        <td><input id="neg" value="+/-" type="button" class="but"></td>
        <td><input id="div" value="/" type="button" class="but"></td>
        <td><input id="some" value="" type="button" class="but" disabled></td>
    </tr>
    <tr>
        <td colspan="5"><input id="eql" value="=" type="button" class="eql"></td>
    </tr>
</table>
</body>
</html>