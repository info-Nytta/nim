function init() {
    var col;
    var row;
    cells = new Array(); //mátrix a gyufák megjelenítéséhez
    N= new Array(); //kupacokban lévő elemszámok
    B= new Array();
    C= new Array();
	game= new Array(); //a játékos összes lépése utáni állás
    for (col = 0; col < ncol; col++) {
        cells[col] = new Array();
        for (row = 0; row < nrow; row++)
            cells[col][row] = 0;       
            N[row]=0;
    }
	game[0]=kupacok;	
}

function newGame(){
    playing=-1;
    myrow=0;
	moves=0;
    for (var row = 0; row < nrow; row++){
		/*N[row]=Math.floor(Math.random()* ncol)+1;*/
		N[row]=kupacok[row];
		for (var col = 0; col < ncol; col++){
			if (col<N[row]) setcell(col,row,1); 
			else setcell(col,row,0);
		}
	 }
	message.innerHTML="Ki kezdjen?";
	show('gep'); show('jatekos');
	hide('me');
}

function restart() {
	hide_icons();
	kupacok=game[0];
	newGame();
}

function back() {
	if (moves>0) {
		game[moves]=null;
		moves--;
		if (game[moves]==null) moves--;
		if (moves==0) restart();
		else {
			N=game[moves];
			display();
		}
	} else restart();
}

function take(){
	hide('gep');
	show('me');
   if ((playing ==-1)){playing =1;}
   s=0;
   if (playing==1){
		for (var col = 0; col < ncol; col++){
		for (var row = 0; row < nrow; row++){
			if (cells[col][row] == 2) {N[row]--; s++;}
		}}
		if (s==0) {alert('Legalább egy gyufát ki kell jelölnöd!');}  
		else {
			
			display(); zero();}
	}
	setTimeout('computer()',1000);
}

function newMove() {
	moves++;
	game[moves]=new Array();
	for (var i=0;i<nrow; i++) { game[moves][i]=N[i]; }
}

function pos(){
    B[2]=0; B[1]=0; B[0]=0;
    for (var row = 0; row < nrow; row++) {
       var t=N[row];
       for (var k= 0; k < 3;k++){ 
            if ((t%2) ==1){B[k]=((B[k]+1) % 2); t=(t-1)/2;} else {t=t/2;}
   }}
   t= B[2]*4+B[1]*2+B[0];
  return t;
}

function hint(){
   var t=pos();
   if (t==0)
  {message.innerHTML="Nincs jó lépés.";}
    row=0; 
    while (t>0) {
      var s=N[row];
      for (var k=0; k < 3;k++){ 
            if ((s%2)==1 ){C[k]=1; s=(s-1)/2;} else {C[k]=0; s=s/2;}
      }
      s=((B[2]+C[2])%2)*4+((B[1]+C[1])%2)*2+((B[0]+C[0])%2);
      if ((N[row]>=s)) 
          {t=N[row]-s; row=row+1; 
             if (t==1)
                {message.innerHTML= row + ". sor: " + t+ " db gyufa"; }
             else
                 {message.innerHTML=row + ". sor: " + t+ " db gyufa"; }
            t=0;} 
      row=row+1;
   }
}

function computer(){
   if ((playing ==-1)){
		playing =0;}
   if (playing ==0){
		var t=pos();
		if (t==0){
			/*itt javítottam
			
			row=Math.floor(Math.random()* nrow);
			while(N[row]==0) 
				{row++;} 
			*/
			
			do
				{row=Math.floor(Math.random()* nrow);}while(N[row]==0) 
			N[row]=Math.floor(Math.random()* N[row]); 
		}
		else { /*itt is javítottam*/
		row=0; 
		while (t>0) {
			var s=N[row];
			for (var k=0; k < 3;k++){ 
				if ((s%2)==1 ){
					C[k]=1; s=(s-1)/2;
				} else {
					C[k]=0; s=s/2;
				}
			}
		s=((B[2]+C[2])%2)*4+((B[1]+C[1])%2)*2+((B[0]+C[0])%2);
		if ((N[row]>=s)) {
			t=0; N[row]=s;}
		row=row+1;}
   }
   newMove();   
   display();
   zero();

}}

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

function start_computer() {
	hide('gep'); hide('jatekos');
	display(); zero();
	message.innerHTML='Gép lép ...';
	playing=0;
	setTimeout('computer()',1000);
	show_icons();
	moves++;
	game[1]=null;
}

function start_user() {
	hide('gep'); hide('jatekos');
	message.innerHTML="Válassz gyufá(ka)t!";
	show('me');
	playing=1;
	show_icons();
}

function display() {
   for (var row = 0; row < nrow; row++){
   for (var col = 0; col < ncol; col++){
      if (col<N[row])  {setcell(col,row,1);} else {setcell(col,row,0);}
   }}
}

function zero(){
   s=0;
   for (var row = 0; row < nrow; row++){s=s+N[row];}
   if (s==0) {
	   hide("pg"); hide_icons();
		document.getElementById("pg").style.display='none';
        if (playing==0){
			message.innerHTML="Gép nyert!";
			show("lose");
		} 
        if (playing==1){
			message.innerHTML="Te nyertél!";
			show("win");
		} 
		hide("me");
        playing=3;
    } else 
  {playing=(playing+1)%2;
   if (playing==1){
	   show('me');
	   message.innerHTML="Válassz gyufá(ka)t!";}
   if (playing==0){
	   hide('me');
	   message.innerHTML="Gép lép ...";}
   }
}

function operate(col,row) {
//if ((playing ==-1)){playing =1;}
if (playing==1){
if ((col < ncol) && (row < nrow)){
    if (cells[col][row] ==2) {setcell(col,row,1); return;}
    if ((myrow==row)  && (cells[col][row] ==1)){setcell(col,row,2);}
    if ((myrow!=row)  && (cells[col][row] ==1)){display(); myrow=row; setcell(col,row,2);}    
}}}

function setcell(col,row,val) {
    cells[col][row] = val;
    eval("document." + "cell" + col + "_" + row + ".src = '" + imgs[val] + "'");
}

function createField(imgsrc) {
    var row;
    var col;
    for (row = 0; row < nrow; row++) {
        for (col = 0; col < ncol; col++) {
            document.write("<img class='gyufa' src='" + imgsrc);
            document.write("' name='" +  "cell" + col + "_" + row);
            document.write("' onmousedown='javascript:");
            document.write("operate(" + col + "," + row + ")'>");
        }
        document.write("<br>");
    }
}