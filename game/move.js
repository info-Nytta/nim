// decimálisból kettesbe
function dec2bin(x) {
   let str=x.toString(2);
   let space="";
   if (str.length<4)
	   for (let i=0; i<4-str.length; i++)
		   space+="0";
   return space+str; 
}

// maxelemszám
function maxi(tt) {
	let maxi=0;
	for (let i=1; i<tt.length; i++) {
		if (tt[i]>tt[maxi])
			maxi=i;
	}
	return maxi;
}
	
// összes gyufa darabszáma
function osszelem(tt) {
	let ossz=0;
	for (let x of tt) ossz+=x;
	return ossz;
}

// gyufák nimszáma
function nimszamol(tt) {
	let nim=["0","0","0","0"];
	for (let i=0; i<tt.length; i++)
		for (let j=0; j<4; j++) 
			if ( (nim[j]=='1') ^ (dec2bin(tt[i])[j]=='1'))
				nim[j]='1';
			else
				nim[j]='0';
	return nim.join(""); // join() nélkül tömbként megy vissza
}

// pedagógiai szempontból megnézem van-e pár valahol, mert azt nem bontom meg, ha van más lehetőség
function nincs_par(tt) {
	let pt=tt.map((value)=> value);
	for (let i=0; i<pt.length-1; i++)
		for (let j=i+1; j<pt.length; j++) 
			if (pt[i]!=0 && pt[i]==tt[j]) {
				pt[i]=0;
				pt[j]=0;
			}
	return pt;
}

// nyerő helyzetben nim szám és párok alapján lépés meghatározás
function lepesszamol(tt) {
	let kitevo=4;
	let kivonas=0;
	let kupac=0;
	let db=0;
	let lepes=new Array();
	let nim=nimszamol(tt);
	for (let j=0; j<4; j++){
		kitevo--;
		kivonas=Math.pow(2,kitevo);
		if (nim[j]=='1') {
			kupac=maxi(tt);
			if (dec2bin(tt[kupac])[j]=='1')
				db+=kivonas;
			else
				db-=kivonas;
		}
	}
	if (db<0) 
		lepes=negativlepes(tt,kupac,db);
	else 
		lepes=[kupac,db];
	return lepes;
}

// ha túlfutna az elvenni kívánt gyufák száma, mint amennyi az adott kupacban van
function negativlepes(tt,kupac,db) {
	let pt=tt.map((value)=> value);
	let lepes=new Array();
	db=Math.abs(db);
		while (pt[kupac]!=db) {
			kupac=0;
			while (kupac<pt.length && pt[kupac]!=db) 
				kupac++;
			if (kupac==pt.length) 
				for (let i=0; i<pt.length; i++) 
					pt[i]--;
		}
	lepes=[kupac,db];
	return lepes;
}

// vesztő helyzetben 0 lépés, nyerő helyzetben számolás
function jolepes(tt)
{
	let nim="0000";
	let lepes=new Array();
	if (nimszamol(tt)==nim) 		
		lepes=[0,0];
	else
		lepes=lepesszamol(nincs_par(tt));
	return lepes;
}
