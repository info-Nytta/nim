function ujjatek(t) {
	
}

function gyufak(t) {
	let s=0;
	for (let i=0; i<t.length; i++)
		s+=t[i];
	return s;
}

function uj_lepes(t) {
	lepesek++;
	
}

function lepes(geplep,t) {
	let lepes;
	if (geplep) {
		lepes=geplep(t);
	}
	else {
		lepes=jatekoslep(t);
	}
	uj_lepes(lepes);
	if (s(t)==0)
		vege(geplep);
	else
		geplep=!geplep;
}

function jatek () {
	
}



/*

A játék menete:
be: géplép, tömb
ha géplép akkor
	géplép
különben
	játékoslép
új lépés felvitele
tömbmódosítás
ha vége akkor
	ki nyert
különben
	a másik következik
*/