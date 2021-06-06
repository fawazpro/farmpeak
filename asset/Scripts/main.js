$(document).ready(function(){
	// $('.modalY').click(function(){
	// 	$('#investInfoModal').modal({
    //   backdrop: 'static'
	// 	});
	// }); 
	$('.modalX').click(function(){
		$('#addFarmModal').modal({
      backdrop: 'static'
		});
	});
	$('.reveal').on('click', function(){
		var $pwd = $('.pwd');
		if($pwd.attr('type') === 'password'){
			$pwd.attr('type', 'text');
		} else{
			$pwd.attr('type', 'password')
		}
	}); 
	$('.reveal1').on('click', function(){
		var $pwd = $('.pwd1');
		if($pwd.attr('type') === 'password'){
			$pwd.attr('type', 'text');
		} else{
			$pwd.attr('type', 'password')
		}
	}); 
	$('.reveal2').on('click', function(){
		var $pwd = $('.pwd2');
		if($pwd.attr('type') === 'password'){
			$pwd.attr('type', 'text');
		} else{
			$pwd.attr('type', 'password')
		}
	}); 
	$('.reveal3').on('click', function(){
		var $pwd = $('.pwd3');
		if($pwd.attr('type') === 'password'){
			$pwd.attr('type', 'text');
		} else{
			$pwd.attr('type', 'password')
		}
	}); 
	$('.reveal4').on('click', function(){
		var $pwd = $('.pwd4');
		if($pwd.attr('type') === 'password'){
			$pwd.attr('type', 'text');
		} else{
			$pwd.attr('type', 'password')
		}
	}); 
	
});