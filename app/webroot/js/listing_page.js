$(function(){
	var $container = $('#container');
	$container.imagesLoaded(function(){
	  $container.masonry({
	   itemSelector: '.box',
		isFitWidth: true,
		columnWidth:columnWidth
	  });
	});
	$container.infinitescroll({
	  navSelector  : '#page-nav',    // selector for the paged navigation 
	  nextSelector : '#page-nav a',  // selector for the NEXT link (to page 2)
	  itemSelector : '.box',     // selector for all items you'll retrieve
	  loading: {
		  finishedMsg: 'No more record to load.',
		  img: templateassets+'images/loading-bar.gif'
		}
	  },
	  function( newElements ) {
		var $newElems = $( newElements ).css({ opacity: 0 });
		$newElems.imagesLoaded(function(){
		  $newElems.animate({ opacity: 1 });
		  $container.masonry( 'appended', $newElems, true ); 
		});
	  }
	);
	$(window).unbind('.infscr');
  });

   jQuery(".load-more-list").click(function(){
	   var ID = $(this).attr("id");

	   if(ID)
	   {
			jQuery('#container').infinitescroll('retrieve');
			var nextPage = parseInt(ID)+1;
			if(nextPage > totalPage)
			$("#"+ID).attr("id",'');
			else
			$("#"+ID).attr("id",nextPage);
		}
		else
		{		
			$(".morebox").html('<div class="no-record">'+No_Escorts_found+'..</div>');
		}
		return false;
});
