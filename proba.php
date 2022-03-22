<script src='js/functions.js'></script>
<script src='js/move.js'></script>
<script src='js/game.js'></script>
<script>

const kdb=Math.floor( Math.random()*3+3);
let kupacok=new Array();
for (let i=0; i<kdb; i++) { kupacok[i]=Math.floor(Math.random()*10+1);}

jatek(kupacok);

//kupacok=[5,4,2,1,1];
//kupacok=[5,4,2,1];
//kupacok=[6,4,2,1];
//document.write("nim szám: "+nimszamol(kupacok)+"<br>");
//document.write("jó lépés: "+jolepes(kupacok)+"<br>");
//document.write("lépés: "+geplep(kupacok)+"<br><hr>");
//kupacok=tombmodosit(kupacok,geplep(kupacok));

</script>