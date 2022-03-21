	function conc() {
		var name = document.getElementById("cardname");
		var coll = document.getElementById("cardcollege");
		document.getElementById("cardnamee").innerHTML = name.value;
        document.getElementById("cardcollegee").innerHTML = coll.value;
		var reg = document.getElementById("regqr");
		var val = document.getElementById("text");
				var favorite = [];
            $.each($("input[name='events[]']:checked"), function(){            
                favorite.push($(this).val());
            });
											var val = document.getElementById("text");
												//var res = reg.value+"-"+favorite.join(",");
												var res = reg.value;
												val.value = res;
	}
