function nimszamol(t) {
	let nim=["0","0","0","0"];
	for (let i=0; i<t.length; i++)
		for (let j=0; j<4; j++) 
			if ( (nim[j]=='1') ^ (dec2bin(t[i])[j]=='1'))
				nim[j]='1';
			else
				nim[j]='0';
	return nim.join(""); // join() nélkül tömbként megy vissza
}

function nincs_par(t) {
	let pt=t.map((value)=> value);
	for (let i=0; i<pt.length-1; i++)
		for (let j=i+1; j<pt.length; j++) 
			if (pt[i]!=0 && pt[i]==t[j]) {
				pt[i]=0;
				pt[j]=0;
			}
	return pt;
}

function lepesszamol(t) {
	let kitevo=4;
	let kivonas=0;
	let kupac=0;
	let db=0;
	let lepes=new Array();
	let nim=nimszamol(t);
	for (let j=0; j<4; j++){
		kitevo--;
		kivonas=Math.pow(2,kitevo);
		if (nim[j]=='1') {
			kupac=maxi(t);
			if (dec2bin(t[kupac])[j]=='1')
				db+=kivonas;
			else
				db-=kivonas;
		}
	}
	if (db<0) 
		lepes=negativlepes(t,kupac,db);
	else 
		lepes=[kupac,db];
	return lepes;
}

function negativlepes(t,kupac,db) {
	let pt=t.map((value)=> value);
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

function jolepes(t)
{
	let nim="0000";
	let lepes=new Array();
	if (nimszamol(t)==nim) 		
		lepes=[0,0];
	else
		lepes=lepesszamol(nincs_par(t));
	return lepes;
}
