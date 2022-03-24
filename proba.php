<!doctype html>
<html lang='hu'>
<head>
    <meta charset='utf-8'>
    <title>NIM JÁTÉK</title>
</head>

<body>
<script src='js/functions.js'></script>
<script src='js/move.js'></script>
<script src='js/game.js'></script>
<script src='js/level.js'></script>
<script>

var lepesek=0;
var lepestomb=new Array();
let szint=rand(1,13);
lepestomb[0]=szint_general(szint);
document.write(szintszoveg(szint)+" szint / "+szint+"<br>");
ujjatek(lepestomb[0]);


//kupacok=[5,4,2,1,1];
//kupacok=[5,4,2,1];
//kupacok=[6,4,2,1];
//document.write("nim szám: "+nimszamol(kupacok)+"<br>");
//document.write("jó lépés: "+jolepes(kupacok)+"<br>");
//document.write("lépés: "+geplep(kupacok)+"<br><hr>");
//kupacok=tombmodosit(kupacok,geplep(kupacok));

</script>
</body>
</html>