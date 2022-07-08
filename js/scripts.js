/* navigation */

	function myMobilMenu() {
		var x = document.getElementById("myNav");
		if (x.style.height== "100%") {
			x.style.height= "0%";
			hicon.innerHTML="<img src='img/hamburger01.png' style='height:50px;'>";
		}
		else {
			x.style.height= "100%"
			hicon.innerHTML="<img src='img/hamburger02.png' style='height:50px;'>";
		}
	}