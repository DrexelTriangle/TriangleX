$(document).ready(function()
{	
	// Global search - Open and focus search box when search icon is clicked
	$('#header-search-icon').click(function(evt)
	{
		if($('#searchbox-main').is(':visible'))
		{
			$('#searchbox-main').width("0px").fadeOut(800);
			
			if($(window).width() < 975)
				$('#logo-mobile').fadeIn(400);
		}
		else
		{
			$('#searchbox-main').fadeIn().width("100%");
			$('#searchbox-main').focus();
			
			if($(window).width() < 975)
				$('#logo-mobile').fadeOut();
		}
			
		evt.stopImmediatePropagation();
	});
	
	// Global search - Close search box when the user clicks out of focus
	$('#searchbox-main').focusout(function(evt)
	{
		$('#searchbox-main').width("0px").fadeOut(400);
		
		if($(window).width() < 975)
				$('#logo-mobile').fadeIn(800);
		
		evt.stopImmediatePropagation();
	});
	
	// Frontpage search - Open and focus search box when search icon is clicked
	$('#search-icon-frontpage').click(function(evt)
	{
		if($('#searchbox-frontpage').is(':visible'))
		{
			$('#searchbox-frontpage').width("0px").fadeOut(400);
		}
		else
		{
			$('#searchbox-frontpage').fadeIn().width("100%");
			$('#searchbox-frontpage').focus();
		}
			
		evt.stopImmediatePropagation();
	});
	
	// Frontpage search - Close search box when the user clicks out of focus
	$('#searchbox-frontpage').focusout(function(evt)
	{
		$('#searchbox-frontpage').width("0px").fadeOut(400);
		evt.stopImmediatePropagation();
	});
});