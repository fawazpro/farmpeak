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
	$('.reveal').on('mousedown', function(){
		var $pwd = $('.pwd');
		if($pwd.attr('type') === 'password'){
			$pwd.attr('type', 'text');
		} else{
			$pwd.attr('type', 'password')
		}
	}); 
	$('.reveal1').on('mousedown', function(){
		var $pwd = $('.pwd1');
		if($pwd.attr('type') === 'password'){
			$pwd.attr('type', 'text');
		} else{
			$pwd.attr('type', 'password')
		}
	}); 
	$('.reveal2').on('mousedown', function(){
		var $pwd = $('.pwd2');
		if($pwd.attr('type') === 'password'){
			$pwd.attr('type', 'text');
		} else{
			$pwd.attr('type', 'password')
		}
	}); 
	$('.reveal3').on('mousedown', function(){
		var $pwd = $('.pwd3');
		if($pwd.attr('type') === 'password'){
			$pwd.attr('type', 'text');
		} else{
			$pwd.attr('type', 'password')
		}
	}); 
	$('.reveal4').on('mousedown', function(){
		var $pwd = $('.pwd4');
		if($pwd.attr('type') === 'password'){
			$pwd.attr('type', 'text');
		} else{
			$pwd.attr('type', 'password')
		}
	}); 
	
	//////Owl carousel
	$('.mainSlider').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayTimeout: 7000,
		autoplaySpeed: 2000,
		smartSpeed: 1500,
		margin: 0,
		nav: false,
		dots: false,
		responsive:{
			0:{
				items: 1
			},
			600:{
				items: 1
			},
			1000:{
				items: 1
			}
		}
	});
	$('.customer').owlCarousel({
		loop: true,
		autoplay: true,
		autoplayTimeout: 6000,
		autoplaySpeed: 1500,
		smartSpeed: 1500,
		margin: 0,
		nav: false,
		dots: true,
		responsive:{
			0:{
				items: 1
			},
			600:{
				items: 2
			},
			1000:{
				items: 3
			}
		}
	});
});