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
	
	// Toggle search icon/box when clicked
	$('#searchbox-main').focusout(function(evt)
	{
		$('#search-main').toggleClass('hidden');
		$('#search-icon').toggleClass('hidden').delay(50000);
		evt.stopImmediatePropagation();
	});
});

$(window).scroll(function() {
    /*var top_of_element = $("#header-frontpage").offset().top;
    var bottom_of_element = $("#header-frontpage").offset()top + $("#header-frontpage").outerHeight;
    var bottom_of_screen = $(window).scrollTop() + $(window).height();

    if((bottom_of_screen > top_of_element) && (bottom_of_screen < bottom_of_element))
	{
        // The element is visible, do something
		alert("If");
    }
    else 
	{
        // The element is not visible, do something else
		alert("Else");
    }*/
});