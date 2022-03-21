function dec2bin(x) {
   let str=x.toString(2);
   let space="";
   if (str.length<4)
	   for (let i=0; i<4-str.length; i++)
		   space+="0";
   return space+str; 
}

function maxi(t) {
	let maxi=0;
	for (let i=1; i<t.length; i++) {
		if (t[i]>t[maxi])
			maxi=i;
	}
	return maxi;
}

function nimszamol(t) {
	let nim=["0","0","0","0"];
	for (let i=0; i<t.length; i++) {
		for (let j=0; j<4; j++) {
			if ( (nim[j]=='1') ^ (dec2bin(t[i])[j]=='1'))
				nim[j]='1';
			else
				nim[j]='0';
		}
	}
	return nim.join(""); // join() nélkül tömbként megy vissza
}

function nincs_par(t) {
	for (let i=0; i<t.length-1; i++)
		for (let j=i+1; j<t.length; j++) 
			if (t[i]!=0 && t[i]==t[j]) {
				t[i]=0;
				t[j]=0;
			}
	return t;
}

function jolepes(t)
{
	let kitevo=4;
	let kivonas=0;
	let kupac=0;
	let db=0;
	let nim="0000";
	let lepes;
	if (nimszamol(t)==nim) {		
		lepes=[0,0];
	}
	else {
		t=nincs_par(t);
		nim=nimszamol(t);
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
		if (db==-1) 
			do {
				t[kupac]=0;
				kupac=maxi(t);
				db++;
			} while ( dec2bin(t[kupac])[3]=='0');
		lepes=[kupac,db];
	}
	return lepes;
}

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

