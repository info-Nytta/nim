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

function tmod(t,lepes) {
	t[lepes[0]]-=lepes[1];
	return t;
}

// csak a tesztelés miatt ilyen
function jatek(t){
	let nim;
	let lepes=new Array();

	do {
		document.write(t+"<br><br>");
		document.write(osszelem(t)+"<br><br>");

		nim=nimszamol(t);
		document.write("nim szám: "+nim+"<br>");
		lepes=geplep(t);
		document.write("gép lépése: "+lepes+"<br><hr>");
		kupacok=tmod(t,lepes);

	} while (osszelem(t)>0);
}
