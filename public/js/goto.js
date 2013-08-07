 $(function(){
 	adjustContentIf();
 	$('span.hideMe').click(function(){
 		
 		if($(this).attr('data-status') == '1'){
 			
	 		$('.goto-lyt .nav').animate({'margin-top':'-144px'},1000,function(){
	 			adjustContentIf2();
	 		});
	 		
	 		$(this).html('إظهار  <i class="icon-chevron-up icon-white"></i>');

	 		$(this).attr('data-status',0);
	 		
	 	}else{
	 		$('.goto-lyt .nav').animate({'margin-top':'0'},1000,function(){
	 			adjustContentIf();
	 		});

	 		$(this).html('إخفاء  <i class="icon-chevron-up icon-white"></i>');

	 		$(this).attr('data-status',1);
	 		adjustContentIf();
	 	}

 	});
 	$(window).resize(function(){ adjustContentIf2(); });

 	var newsTicket = setInterval(function(){
		var current = $('.latestNews .active');
		var next = current.next('.item');
		if(next.length == 0){
			next = $('.latestNews .item:eq(0)');
		}
		current.fadeOut(500,function(){
			current.removeClass('active');
			next.fadeIn(500,function(){next.addClass('active')});
		})
	},7000);
 });

 function adjustContentIf(){
 	var iframeH = $(window).height() - 144;
 	$('#contentContainer').height(iframeH+'px');
 }
 function adjustContentIf2(){
 	var iframeH = $(window).height() - 10;
 	$('#contentContainer').height(iframeH+'px');
 }
