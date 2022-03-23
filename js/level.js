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

function szint_general(szint) {
	// kidolgozásra várnak a szintek
	
	let  kdb=Math.floor( Math.random()*3+3);
	let kupacok=new Array();
	for (let i=0; i<kdb; i++) { kupacok[i]=Math.floor(Math.random()*10+1);}
	
	return kupacok;
}