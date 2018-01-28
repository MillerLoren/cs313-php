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
	var hidden1 = document.getElementById("viewCart1");
	var hidden2 = document.getElementById("viewCart2");
	var hidden3 = document.getElementById("viewCart3");
	var quantity = document.getElementsByClassName("quantity")[item - 1].value;
	console.log("Quantity", quantity);
	if(quantity > 0 && quantity != "" && quantity != 0){
		console.log("Switch", item);
		switch(item){
			case 1:
				var tempArr = {Game:"Ark: Survival Evolved", Price:"$39.99", Quantity:quantity};
				arr[0] = tempArr;
				hidden1.value = "";
				hidden1.value = JSON.stringify(arr);
				break;
			case 2:
				var tempArr = {Game:"Overwatch", Price:"$59.99", Quantity:quantity};
				arr[1] = tempArr;
				hidden2.value = "";
				hidden2.value = JSON.stringify(arr);
				break;
			case 3:
				var tempArr = {Game:"RocketLeague", Price:"$29.99", Quantity:quantity};
				arr[2] = tempArr;
				hidden3.value = "";
				hidden3.value = JSON.stringify(arr);
				break;
		}
	}
	hidden.value = "";
	hidden.value = JSON.stringify(arr);
}