$(window).on('resize', toggle);
$(window).on('load', toggle);
var arr = [];
var cartCount = 0;
function toggle(){
	var win = $(this); //this = window
	var ul = document.getElementById("menu");
	var btn = document.getElementById("dropBtn");
	if (win.width() <= 700) {
	  $(ul).removeClass('show');
	  $(ul).addClass('hide');
	  $(btn).removeClass('hide');
	  $(btn).addClass('show');
	}
	if (win.width() >= 701) {
	  $(ul).removeClass('hide');
	  $(ul).addClass('show');
	  $(btn).removeClass('show');
	  $(btn).addClass('hide');
	}
}
function menu(){
	var ul = document.getElementById("menu");
	if($(ul).hasClass('hide') == true){
		$(ul).removeClass('hide');
		$(ul).addClass('show');
	}else{
		$(ul).removeClass('show');
		$(ul).addClass('hide');
	}
}
function addToCart(item){
	console.log("Item Number", item);
	var div = document.getElementById(item);
	var hidden = document.getElementById("viewCart");
	var quantity = document.getElementsByClassName("quantity")[item - 1].value;
	console.log("Quantity", quantity);
	if(quantity > 0 && quantity != "" && quantity != 0){
		console.log("Switch", item);
		switch(item){
			case 1:
				var tempArr = {Game:"Ark: Survival Evolved", Price:"$39.99", Quantity:quantity};
				arr[0] = tempArr;
				break;
			case 2:
				var tempArr = {Game:"Overwatch", Price:"$59.99", Quantity:quantity};
				arr[1] = tempArr;
				break;
			case 3:
				var tempArr = {Game:"RocketLeague", Price:"$29.99", Quantity:quantity};
				arr[2] = tempArr;
				break;
		}
	}
	hidden.value = "";
	hidden.value = JSON.stringify(arr);
}