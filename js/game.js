function geplep(t) {
	let kupac, db;
	let lepes=jolepes(t);
	if (lepes[0]==0 && lepes[1]==0) {
		do {
			kupac=Math.floor( Math.random()*t.length );
		} while (t[kupac]==0);
		db=Math.floor( Math.random()*t[kupac]+1);
		lepes=[kupac,db];
	}
	return lepes;
}

function jatekoslep(t) {

}

function tmod(t,lepes) {
	t[lepes[0]]-=lepes[1];
	return t;
}

// csak a tesztelés miatt ilyen
function ujjatek(t){
	let nim;
	let lepes=new Array();
	let gepjon=false; // ez majd attól függ, mit választ a játékos
	do {
		// ellenőrzés végett
		
		document.write("<br>"+lepesek+". lépés: "+t+"<br><br>");
		document.write(osszelem(t)+"<br><br>");
		nim=nimszamol(t);
		document.write("nim szám: "+nim+"<br>");
		//--
		if (gepjon){
			lepes=geplep(t);
			document.write("gép lépése: "+lepes+"<br><hr>");
			gepjon=false;
			t=tmod(t,lepes);
		}
		else {
			for (let i=0; i<=lepesek; i++) document.write("-"+lepestomb[i]+"<br>");
			//jatekoslep(t);
			lepes=geplep(t);
			document.write("játékos lépése: "+lepes+"<br><hr>");
			t=tmod(t,lepes);
			lepesek++;
			lepestomb[lepesek]=t.map((value)=> value);
			gepjon=true;
		}
		
	} while (osszelem(t)>0);
	if (gepjon) document.write("játékos nyert");
	else document.write("gép nyert");
}
