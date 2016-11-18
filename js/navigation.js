$(document).ready(function()
{
	if (!$('#header-frontpage').is(":in-viewport"))
	{
		$('#header-global').toggleClass('hidden');
	}
	
	// Open navigation when hamburger icon is clicked
	$('#nav-icon').click(function(evt)
	{
		$(this).toggleClass('open');
		$('#nav-main').toggleClass('open');
		evt.stopImmediatePropagation();
	});
	
	// Open and focus search box when search icon is clicked
	$('#search-icon').click(function(evt)
	{
		$(this).toggleClass('hidden');
		$('#search-main').toggleClass('hidden');
		$('#searchbox-main').focus();
		evt.stopImmediatePropagation();
	});
	
	// Close search box when it goes out of focus
	$('#searchbox-main').focusout(function(evt)
	{
		$('#search-main').toggleClass('hidden');
		$('#search-icon').toggleClass('hidden').delay(50000);
		evt.stopImmediatePropagation();
	});
});

$(window).scroll(function()
{
	if (!$('#header-frontpage').is(":in-viewport"))
		$('#header-global').removeClass('hidden');
	
	if ($('#header-frontpage').is(":in-viewport"))
	{
		if($('#nav-main').hasClass('open'))
		{
			$('#nav-main').removeClass('open');
			$('#nav-icon').removeClass('open');
		}
		$('#header-global').addClass('hidden');
	}
});