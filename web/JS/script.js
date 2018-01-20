$(window).on('resize', toggle);
$(window).on('load', toggle);
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
