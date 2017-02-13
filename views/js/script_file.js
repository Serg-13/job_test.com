$(function(){
	
	$(".access").change(function(){
		
		var $this = $(this);
		var val = $.trim($this.val());
		var dataField = $this.attr('data-field');
		var span = $this.next();

		if (val == '') {
			span.removeClass().addClass('reg-cross');
		}
		else{
			span.removeClass().addClass('reg-loader');
			$.ajax({
				url: '/reg',
				type: 'POST',
				data: {val: val, dataField: dataField},
				success: function(res){
					if(res == 'no'){
						span.removeClass().addClass('reg-cross');
					}
					else{
						span.removeClass().addClass('reg-check')
					}
				}
			})
		}
	});
	
	$(".test").click(function(){
		var val = $("#area").val();
		$('#status').removeClass('no_ne').addClass('b_lock');
		$('.add_task').removeClass('b_lock').addClass('no_ne');
		$('.text').text(val);
	});
	$(".edit").click(function(){
		$('#status').removeClass('b_lock').addClass('no_ne');
		$('.add_task').removeClass('no_ne').addClass('b_lock');
	});

}) 