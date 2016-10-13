$(document).ready(function()
{
	// Open navigation when hamburder icon is clicked
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
	
	$('#searchbox-main').focusout(function(evt)
	{
		$('#search-main').toggleClass('hidden');
		$('#search-icon').toggleClass('hidden').delay(50000);
		evt.stopImmediatePropagation();
	});
});