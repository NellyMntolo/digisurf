$(document).ready(function(){
	
	//how much items per page to show
	var show_per_page = 3; 
	//getting the amount of elements inside content div
	var number_of_items = $('#boxcover a').children().size();
	//calculate the number of pages we are going to have
	var number_of_pages = Math.ceil(number_of_items/show_per_page);
	
	//set the value of our hidden input fields
	$('.current_page').val(0);
	$('.show_per_page').val(show_per_page);
	
	//now when we got all we need for the navigation let's make it '	
	/* 
	what are we going to have in the navigation?
		- link to previous page
		- links to specific pages
		- link to next page
	*/
	var navigation_html = '<li><a class="previous_link btn-primary" aria-label="Previous" href="javascript:previous();window.scrollTo(0, 0);"><span aria-hidden="true">&laquo;</span></a></li>';
	var current_link = 0;
	while(number_of_pages > current_link){
		navigation_html += '<li class="page_link" longdesc="' + current_link +'"><a class="page_link" href="javascript:go_to_page(' + current_link +');window.scrollTo(0, 0);" longdesc="' + current_link +'">'+ (current_link + 1) +'</a></li>';
		current_link++;
	}
	navigation_html += '<li><a class="next_link btn-primary" aria-label="Next" href="javascript:next();window.scrollTo(0, 0);"><span aria-hidden="true">&raquo;</span></a></li>';
	
	$('#page_navigation').html(navigation_html);
	
	//add active_page class to the first page link
	$('#page_navigation .page_link:first').addClass('active_page');
	
	//hide all the elements inside content div
	$('#boxcover a').children().css('display', 'none');
	
	//and show the first n (show_per_page) elements
	$('#boxcover a').children().slice(0, show_per_page).css('display', 'block');

		//Extra Code
	if ($('#page_navigation') && ($('#page_navigation').children().length == 1)) {
    $('#page_navigation :first').show();
}

/*if ($(go_to_page())){

}*/
	
});

function previous(){
	
	new_page = parseInt($('.current_page').val()) - 1;
	//if there is an item before the current active link run the function
	if($('.active_page').prev('.page_link').length==true){
		go_to_page(new_page);
	}
}

function next(){
	new_page = parseInt($('.current_page').val()) + 1;
	//if there is an item after the current active link run the function
	if($('.active_page').next('.page_link').length==true){
		go_to_page(new_page);
	}
	
}
function go_to_page(page_num){
	//get the number of items shown per page
	var show_per_page = parseInt($('.show_per_page').val());
	
	//get the element number where to start the slice from
	start_from = page_num * show_per_page;
	
	//get the element number where to end the slice
	end_on = start_from + show_per_page;
	
	//hide all children elements of content div, get specific items and show them
	$('#boxcover a').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');
	
	/*get the page link that has longdesc attribute of the current page and add active_page class to it
	and remove that class from previously active page link*/
	$('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');
	
	//update the current page input field
	$('.current_page').val(page_num);
}

