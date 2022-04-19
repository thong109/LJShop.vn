$(document).ready(function(){

					$('#button-one').click(function(){
						swal({
 						position: 'top-end',
 						icon: 'success',
 						title: 'Quý khách vui lòng liên hệ sđt : 01234 nếu có nhu cầu thanh toán trực tiếp',
 						showConfirmButton: false,
 						timer: 1500
							});
					});

});
document.getElementById('b3').onclick = function(){
	swal("Good job!", "You clicked the button!", "success");
};


