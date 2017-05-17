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
	$('.header-search-icon').click(function(evt)
	{
		$('#search-modal').fadeToggle();
		$('#searchbox-main').focus();
		evt.stopImmediatePropagation();
	});
	
	// Global search - Close search modal when the user clicks close button
	$('#search-close').click(function(evt)
	{
		$('#search-modal').fadeToggle();
		evt.stopImmediatePropagation();
	});
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