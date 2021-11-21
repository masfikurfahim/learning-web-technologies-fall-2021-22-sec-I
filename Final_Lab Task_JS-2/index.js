var last = ""; 
var next = ""; 
var result = 0;
var history = []; 
var reset = false;
var lastInput = "";

function type(n) {

    if (n == "0" && $("#temp").text == "0") 
        return;
    if (n == "." && $("#temp").text().indexOf(n) >= 0)
        return;

    if (($("#temp").text() == "0" || reset) && n != ".") {
        lastInput = $("#temp").text();
        $("#temp").text("");
        reset = false;
        last = next;
        next = "";
    }

    $("#temp").text( $("#temp").text() + n);
}
function nextOperation(op) {
    switch (op) {
        case "percent":
            $("#temp").text(percent($("#temp").text()));
            next = "";
            return;
        case "sqroot":
            $("#temp").text(sqroot($("#temp").text()));
            next = "";
            return;
        case "square":
            $("#temp").text(square($("#temp").text()));
            next = "";
            return;
        case "inverse":
            $("#temp").text(inverse($("#temp").text()));
            next = "";
            return;
              }    
 
    if (!next && last) 
        solve();

    next = op;
    reset = true;
}

function sum(a, b) {
    return Number(a) + Number(b);
}

function subs(a, b) {
    return Number(a) - Number(b);
}

function multiply(a, b) {
    return Number(a) * Number(b);
}

function divide(a, b) {
    return Number(a) / Number(b);
}

function percent() {
    return;
}

function sqroot(a) {
    return Math.sqrt(Number(a));
}

function square(a) {
    return Math.pow(Number(a), 2);
}

function inverse(a) {
    return 1 / Number(a);
}

function plusminus() {
    $("#temp").text(-$("#temp").text());
}

function solve() {
    var a;
    var b = lastInput;
    var operation;
    
    a = $("#temp").text();
    
    switch (last) {
        case "sum":
            operation = sum;
            break;
        case "subs":
            operation = subs;
            break;
        case "multiply":
            operation = multiply;   
            break;
        case "divide":
            operation = divide;
            break;
        case "percent":
            percent(a);
            next = "";
            return;
        case "sqroot":
            sqroot();
            next = "";
            return;
        case "square":
            square(a);
            next = "";
            return;
        case "inverse":
            inverse(a);
            next = "";
            return;
              }
    
    result = operation(a,b);
    lastInput = $("#temp").text();
    $("#temp").text(result);
    next = "";
    reset = true;
}

function clearScr() {
    $("#temp").text("0");
}

function resetInput() {
    $("#temp").text("0");
    next = "";
    last = "";
    lastInput = "";
}

function backspace() {
    var foo = $("#temp").text();
    foo = foo.split("");
    foo.pop();
    foo = foo.join("");
    foo = foo == "" ? "0" : foo;

    $("#temp").text(foo);
}

$(".btn-num").click( function() {
    type($(this).text());
    next = "";
});

$(".btn-op").click( function() {
    let op = this.id; //$(this).attr("id");
    if(op == "solve") { solve(); return; }
    nextOperation(op);
});