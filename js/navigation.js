$(document).ready(function()
{	
	// Open navigation when hamburger icon is clicked
	$('.header-hamburger-icon').click(function(evt)
	{
		$(this).toggleClass('open');
		$('#nav-main').toggleClass('open');
		evt.stopImmediatePropagation();
	});
	
	// Global search - Open and focus search box when search icon is clicked
	/*$('#search-icon').click(function(evt)
	{
		// Hide element but preserve space to avoid logo resizing
		$(this).css('visibility', 'hidden');
		//$('#search-main').css('visibility', 'visible');
		//$('#searchbox-main').focus();
		evt.stopImmediatePropagation();
	});
	
	// Global search - Close search box when it goes out of focus
	$('#searchbox-main').focusout(function(evt)
	{
		//$('#search-main').css('visibility', 'hidden');
		$('#search-icon').css('visibility', 'visible');
		evt.stopImmediatePropagation();
	});
	
	// Frontpage search - Open and focus search box when search icon is clicked
	$('#search-icon-frontpage').click(function(evt)
	{
		$(this).toggleClass('hidden');
		//$('#search-frontpage').toggleClass('hidden');
		$('#searchbox-frontpage').focus();
		evt.stopImmediatePropagation();
	});
	
	// Frontpage search - Close search box when it goes out of focus
	$('#searchbox-frontpage').focusout(function(evt)
	{
		//$('#search-frontpage').toggleClass('hidden');
		$('#search-icon-frontpage').toggleClass('hidden').delay(50000);
		evt.stopImmediatePropagation();
	});*/
});

$(window).scroll(function()
{
	if (!$('#header-frontpage').is(":in-viewport"))
		$('#header-global').removeClass('hidden');
	
	if ($('#header-frontpage').is(":in-viewport"))
	{
		if($('.header-hamburger-icon').hasClass('open'))
		{
			$('#nav-main').removeClass('open');
			$('.header-hamburger-icon').removeClass('open');
		}
		$('#header-global').addClass('hidden');
	}
});