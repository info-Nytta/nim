function ujJatek () {
	// gyufaAllas
	// uzenetSav
	reset_imgMatrix(kupacok);
	playing=null;
	game= new Array();
	s=osszelem(kupacok);
	game[0]=kupacok;	
	moves=0;
	jeloltKupac=0;
	uzenetSav();
}

function restart() {
	hide_icons();
	hide('me');
	ujJatek();
	display();
}

function back() {
	if (moves>0) {
		game[moves]=null;
		moves--;
		if (moves>0) {
			game[moves]=null;
			moves--;
		}
		if (moves==0) restart();
		else {
			reset_imgMatrix(game[moves]);
			display();
			s=osszelem(game[moves]);
		}
	} 
	else restart();
}

function newMove(kupac,db) {
	reset_imgMatrix(game[moves]);
	moves++;
	game[moves]=[...game[moves-1]];
	game[moves][kupac]-=db;
	for (i=0; i<imgMatrix[kupac].length; i++)
		if (i>imgMatrix[kupac].length-db-1) {
			imgMatrix[kupac][i]=0;
		}
	display();
	s-=db;
}

function gyufaszam() {
	hide_icons();
	if (s==0) {
		hide('pg'); 
		show("ok");
        if (playing){
			end.innerHTML="Gép nyert!";
			show("lose");
		} 
        else {
			hide('me');
			show("win");
			document.getElementById("pp").value = 1;	
			end.innerHTML="Te nyertél!";
		} 
	}
	else {
		if (playing != null) playing=!playing;
		if (playing) geplep();
		else jatekoslep();
		uzenetSav();
	}		
}

function hint() {
	let lepes=jolepes(game[moves]);	
	if (lepes[0]==0 && lepes[1]==0) {
		message.innerHTML="Nincs jó lépés.";
	}
	else {
		/*reset_imgMatrix(game[moves]);
		display();
		jeloltKupac=lepes[0];
		for (i=0; i<lepes[1]; i++) jelol(lepes[0],game[moves][jeloltKupac]-i-1);
		*/
		message.innerHTML= (lepes[0]+1) + ". sorból " + lepes[1]+ " db"; 
	}
}

function jatekoslep () {
	let	kupac;
	let	db=0;	
	if (playing==null) playing=false;
	if (playing==false)  {
		for (var i = 0; i < game[moves].length; i++){
			for (var j = 0; j < game[moves][i]; j++){
				if (imgMatrix[i][j] == 2) {kupac=i; db++;}
			}
		}
		if (db>0) {
			//newMove(kupac,db); 
			//gyufaszam();
			let lepes=[kupac,db];
			idozites(lepes);
		}
	}
}
function geplep() {
	let t=game[moves];
	let kupac;
	let db;
	let lepes=jolepes(t);
	if (lepes[0]==0 && lepes[1]==0) { 
		// ha 0 lépést kapott vissza, akkor random lépés.
		/*do {
			kupac=Math.floor( Math.random()*t.length );
		} while (t[kupac]==0);*/
		kupac=maxi(t); 
		if (t[kupac]>2) db=Math.floor( Math.random()*(t[kupac]-2)+2);
		else db=1;
		lepes=[kupac,db];
	} 
	hide('me');	 
	jeloltKupac=lepes[0];
	idozites(lepes);
}

function mutat(lepes,img) {
	for (i=0; i<lepes[1]; i++) {
		imgMatrix[lepes[0]][game[moves][lepes[0]]-i-1]=img;
		gyufaKi(lepes[0],[game[moves][lepes[0]]-i-1],img);
	}
}
async function idozites(lepes) {
	await sleep(300);	
	mutat(lepes,0);
	await sleep(300);
	if (playing) mutat(lepes,1);
	else mutat(lepes,2);
	await sleep(300);	
	mutat(lepes,0);
	await sleep(300);	
	if (playing) mutat(lepes,1);
	else mutat(lepes,2);
	await sleep(300);
	mutat(lepes,2);	
	newMove(lepes[0],lepes[1]);
	gyufaszam();
}
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

function reset_imgMatrix(t) {
	imgMatrix=new Array();
	for (i=0; i<t.length; i++) {
		imgMatrix[i]=new Array();
		for (j = 0; j < t[i]; j++) imgMatrix[i][j]=1;
	}	
}

function jatekTerulet(imgsrc) {
	for (i = 0; i < kupacok.length; i++) {
        for (j = 0; j < kupacok[i]; j++) {
            document.write("<img class='gyufa' src='" + imgsrc);
            document.write("' name='" +  "gyufa_" + i + "_" + j);
            document.write("' id='" +  "gyufa_" + i + "_" + j);
            document.write("' onmousedown='javascript:");
            document.write("jelol(" + i + "," + j + ")'>");
			imgMatrix[i][j]=1;
        }
        document.write("<br>");
    }
}

function start (p) {
	playing=p;
	hide('gep'); hide('jatekos');
	uzenetSav();
	if (playing) geplep();
	else jatekoslep();
}

function uzenetSav () {
	if (playing==null) {
		message.innerHTML="Ki kezdjen?";
		show('gep'); show('jatekos');
	}
	else if (playing) {
		message.innerHTML="Gép lép ...";
	}
	else {
		message.innerHTML="Válassz gyufá(ka)t!";
		show('me'); show_icons();
	}
}
function hide(where) {
	document.getElementById(where).style.display='none';
}
function hide_icons(){
	hide('restart'); hide('back'); hide('hint');
}
function show(where) {
	document.getElementById(where).style.display='block';
}
function show_icons() {
	show('restart'); show('back'); show('hint');
}

function jelol(kupac,gyufa) {
	if (playing==null) {playing=false; start(playing);}
	if (playing==false) {
		if (imgMatrix[kupac][gyufa]==2) {
			imgMatrix[kupac][gyufa]=1; gyufaKi(kupac,gyufa,1); return;
		}
		if ((imgMatrix[kupac][gyufa]==1) && (jeloltKupac==kupac)){
				imgMatrix[kupac][gyufa]=2; gyufaKi(kupac,gyufa,2);
		}
		if ((imgMatrix[kupac][gyufa]==1) && (jeloltKupac!=kupac)){
				reset_imgMatrix(game[moves]); display(); jeloltKupac=kupac; 
				imgMatrix[kupac][gyufa]=2; gyufaKi(kupac,gyufa,2);
		}
	}
}

function display() {
	for (i=0; i<imgMatrix.length; i++)
		for (j=0; j<imgMatrix[i].length; j++){
			if (imgMatrix[i][j]==1) gyufaKi(i,j,1);
			else if (imgMatrix[i][j]==2) gyufaKi(i,j,2);
			else gyufaKi(i,j,0);
		}
}

function gyufaKi (kupac,gyufa,kepindex) {
	eval("document." + "gyufa_" + kupac + "_" + gyufa + ".src='" +imgs[kepindex]+ "'");
}





