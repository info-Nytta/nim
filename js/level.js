function szint_megad(szint){
	
	/*tanulójátéknál érdekes
	
	const level=new Array();
	level=[
		[6,5],[5,3],[5,5],[7,7],[7,3],[5,4],[4,4],[3,7],
		[3,6],[6,6],[2,2],[3,5],[4,5],[3,3],[6,3],[3,4]
	],
	[
		[5,5,5],[3,3,3],[3,7,7],[1,3,3],[6,4,6],[2,3,2],
		[2,2,4],[4,4,4],[7,7,2],[4,1,4],[3,2,2],[1,1,4],
		[3,4,3],[2,4,2],[3,3,2],[3,3,4],[6,3,6],[4,2,4],
		[4,5,5]
	];
	*/
	document.write(level);
}

function elemek()
{
	// itt majd ki kellene dolgozni egy jó kis általános algoritmust arra vonatkozóan, ha kell ismétlődés, nem, kell, hányszor kell, minden elem küülönböző legyen, stb.
}

function szint_general(szint) {
	// a haladó szintet ketté kellene még osztani

	let kupacok=new Array();
	let kdb=0;
	let k=0;

	switch (szint) {
		case 11: // kezdő
			kdb=rand(3,4);
			for (let i=0; i<kdb; i++)
				if (i==2)  { 
					do
						k=rand(1,7);	
					while (!(kupacok.includes(k)));
					kupacok[i]=k;
				}
				else
				kupacok[i]=rand(1,7);
			break;
		case 12: // haladó
			kdb=3;
			for (let i=0; i<kdb; i++) { 
				do
					k=rand(1,10);
				while (kupacok.includes(k));
				kupacok[i]=k;
			}
			break;
		case 13: // profi
			kdb=rand(4,5);
			for (let i=0; i<kdb; i++) { 
				do
					k=rand(4,10);
				while (kupacok.includes(k));
				kupacok[i]=k;
			}
			break;
		default: // egyelőre teszteléshez
			kdb=2;
			for (let i=0; i<kdb; i++)
				kupacok[i]=rand(1,10);
			break;
	}
	return kupacok;
}


function szintszoveg(sz) {
	let szint="";
	if (sz<=10) szint="Tanuló"
	else if (sz==11) szint="Kezdő";
	else if (sz==12) szint="Haladó";
	else if (sz==13) szint="Profi";
	else szint=sz;
	return szint;
}
