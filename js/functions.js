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

function osszelem(t) {
	let ossz=0;
	for (let x of t) ossz+=x;
	return ossz;
}