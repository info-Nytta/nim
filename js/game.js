function geplep(t) {
	let kupac, db;
	let lepes=jolepes(t);
	if (lepes[0]==0 && lepes[1]==0) {
		do {
			//kupac=rand(0,t.length-1);
			kupac=Math.floor( Math.random()*t.length );
		} while (t[kupac]==0);
		//db=rand(1,t[kupac]);
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
	let gepjon=true; // ez majd attól függ, mit választ a játékos
	do {
		// ellenőrzés végett
		
		document.write("<hr><br>"+lepesek+". lépés: "+t+"<br>");
		document.write(osszelem(t)+"<br>");
		nim=nimszamol(t);
		document.write("nim szám: "+nim+"<br>");
		
		//--
		if (gepjon){
			lepes=geplep(t);
			document.write("gép lépése: "+lepes+"<br><hr>");
			t=tmod(t,lepes);
			gepjon=false;
		}
		else {
			//jatekoslep(t);
			lepes=geplep(t); // ez csak a teszt miatt
			document.write("játékos lépése: "+lepes+"<br>");
			lepesek++;
			lepestomb[lepesek]=t.map((value)=> value);
			t=tmod(t,lepes);
			gepjon=true;
			for (let i=1; i<=lepesek; i++) document.write("-"+lepestomb[i]+"<br>");
		}
		
	} while (osszelem(t)>0);
	if (gepjon) document.write("játékos nyert");
	else document.write("gép nyert");
}
