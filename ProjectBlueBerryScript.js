
$('.extraBtn').hide();

$('img').bind('contextmenu', function(e){ return false;});
$('video').bind('contextmenu', function(e){ return false;});

$('#searchId, .navigation').keypress( function(event) {
	if (event.which == '13') 
			event.preventDefault();
});

$(document).ready(function()
{
	var height = $(window).height();
	$('body, #settingsMenuId, #accountMenuId').css({'width': '100%', 'min-height': height});
	$.ajax({
		type: 'GET',
		url: 'ProjectBlueBerryAjaxHandeler.php',
		cache: false,
		dataType: 'json',
		data: { fname: 'poster'},
		success: function (datal) 
		{
			var el = [], x1 = [], x2 = [], x3 = [], x4 = [], x5 = [], x6 = [], x7 = [];
			var arr = new Array();
			var i, j;
			for (i = 0; i < 7; i++) 
			{
				if (i == 0)
					arr[i] = $('[id^="cat1z"]');
				else if (i == 1)
					arr[i] = $('[id^="cat2z"]');
				else if (i == 2) 
					arr[i] = $('[id^="cat3z"]');
				else if (i == 3)
					arr[i] = $('[id^="cat4z"]');
				else
				{}
			}
			for (j = 0; j < arr.length; j++)
			{
				for (i = 0; i < datal.length; i++) 
				{
					el[i] = document.createElement('img').cloneNode();
					el[i].src = datal[i];
					x1[i] = arr[j][i];
					x1[i].appendChild(el[i]);
				}
			}
		}
	});

});

$('#channelsClassAid').ready(function () {
	$.ajax({
		type: 'GET',
		url: 'ProjectBlueBerryAjaxHandeler.php',
		dataType: 'json',
		data: { fname: 'channelPost'},
		success: function (datal) 
		{
			var x1= [], x2 = [];
			var narr = $('[id^="cTile"]');
			for (var i = 0; i < datal.length; i++) 
			{
				x1[i] = document.createElement('img');
				x1[i].src = datal[i];
				x2[i] = narr[i];
				x2[i].appendChild(x1[i]);
			}
		}
	});
})

$(document).scroll(function() {
	if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) 
	{
		$('.navigation').css('background-color', '#123456');
	}
	else 
	{ 
		$('.navigation').css('background-color', 'transparent');
	}
});

window.onclick = function (event) {
	if (event.target.matches('#extraMenu')) 
	{
		$('.extraBtn').show();
		$('.extraMenu').hide();
	}
	else if (event.target.matches('#b1')) 
	{
		$('#idMenu').slideToggle(300);
	}
	else if (event.target.matches('#searchButtonId ,#searchId'))
	{	
		$('#navBtnId').hide(3);
		$('#idMenu').slideUp(3);
		$('.search').css({'width': '100%', 'z-index': '99'});
		$('#searchId, #searchResId').slideDown(300).css('z-index', '99');
		$('#searchButtonId').hide(3);
	}
	else if (event.target.matches('.Btn *'))
	{
		window.history.back();
	}
	else
	{
		$('.extraBtn').hide();
		$('#navBtnId').show(3);
		$('#idMenu, #searchResId').slideUp(300);
		$('.search').css('width', 'auto');
		$('#searchId').hide(3);
		$('#searchButtonId').show(300);
	}
};

$('.navigation button, .menu button').click(function (arg) {
	if (arg.target.matches('#logoBtn, #logoBtn i')) 
	{
		location.href = 'ProjectBlueBerry.php';
		//location.target = '_blank';
	}
	else if (arg.target.matches('#b3')) 
	{
		location.href = 'ProjectBlueBerryShows.php';
		//location.target = '_blank';
	}
	else if (arg.target.matches('#b4')) 
	{
		location.href = 'ProjectBlueBerryMovies.php';
		//location.target = '_blank';
	}
	else if (arg.target.matches('#b7')) 
	{
		location.href = 'ProjectBlueBerryChannels.php';
	}
	else if (arg.target.matches('#menuB4'))
	{
		location.href = 'ProjectBlueBerryHelp.php';
	}
	else
	{

	}
});

$('#helpCategoriesId button').click(function (ele) {
	//alert();
	var z = ele;
	if (ele.target.matches('#hBilling'))
		z.id = 'hBilling';
	else if (ele.target.matches('#hMyacc'))
		z.id = 'hMyacc';
	else if (ele.target.matches('#hStream'))
		z.id = 'hStream';
	else if (ele.target.matches('#hCont'))
		z.id = 'hCont';
	else if (ele.target.matches('#hAbout'))
		z.id = 'hAbout';
	else
	{}

	var ids = document.querySelectorAll("#helpBillingId, #helpMyaccId, #helpStreamId, #helpContId, #helpAboutId");
	var idsArray = [...ids];
	var x = document.getElementById('helpCategoriesId');
	var y = x.getElementsByTagName('button');
	for (var i = 0, j = 0; i < y.length, j < idsArray.length ; i++, j++) 
	{
		y[i].style.backgroundColor = "transparent";
		y[i].style.color = 'black';
		idsArray[j].style.display = "none";
		if (y[i].id == z.id && i == j) 
		{
			y[i].style.backgroundColor = '#123456';
			y[i].style.color = "#abcdef";
			idsArray[j].style.display = "flex";
			//$('[id=navId]').hide();
		}
	}
})

$('.sliderz .sliderzBtn *').click(function (arg) {
	var pos = $('.sliderz').scrollLeft();
	var posWidth = $(window).innerWidth();//$('.sliderContentz').width() + 51;
	if (arg.target.matches('#homeAheadb1')) 
	{
		$('.sliderz').scrollLeft(pos + posWidth);
	}
	else if (arg.target.matches('#homeBackb1')) 
	{
		$('.sliderz').scrollLeft(pos - posWidth);
	}
	else
	{ };
});


$('#showCategoryBtnid button').click(function (ele) {
	var z = ele;
	if (ele.target.matches('#epi'))
		z.id = 'epi';
	if (ele.target.matches('#trai'))
		z.id = 'trai';
	if (ele.target.matches('#more'))
		z.id = 'more';
	var ids = document.querySelectorAll("#showEpsId, #clipInfoId, #moreLikeId");
	var idsArray = [...ids];
	var x = document.getElementById('showCategoryBtnid');
	var y = x.getElementsByTagName('button');
	for (var i = 0, j = 0; i < y.length, j < idsArray.length ; i++, j++) 
	{
		y[i].style.backgroundColor = "transparent";
		idsArray[j].style.display = "none";
		if (y[i].id == z.id && i == j) 
		{
			y[i].style.backgroundColor = '#123456';
			idsArray[j].style.display = "flex";
			//$('[id=navId]').hide();
		}
	}
});		

$('[id^=cat] *, [id^=sliderContentz] *').click(function () {
	location.href = 'ProjectBlueBerryShowPage.php';
});


var scrollingElement = (document.documentElement || document.body)
$('#smb2').hide();
$('.extraBtn button, .extraBtn button i').click(function (arg) {
	if (arg.target.matches('#smb1')) 
	{
		document.documentElement.requestFullscreen();
		document.documentElement.webkitRequestFullscreen();
		$('#smb1').hide();
		$('#smb2').show();
	}
	else if (arg.target.matches('#smb2'))
	{
		document.exitFullscreen();
		$('#smb2').hide();
		$('#smb1').show();
	}
	else if (arg.target.matches('#pagescrollup')) 
	{
		scrollingElement.scrollTop = 0;
	}
	else if (arg.target.matches('#pagescrolldown'))
	{
		scrollingElement.scrollTop = scrollingElement.scrollHeight;
	}
	else
	{

	}
});

$('.channels .channelsContainer *').click(function (arg) {
	if (arg.target.matches('.channels .channelsContainer *'))
	{	
		location.href = 'ProjectBlueBerryChannel.php';
	}	
});

