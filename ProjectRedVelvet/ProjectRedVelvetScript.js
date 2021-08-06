

$(document).ready(function () {
	$('#nsId').slideUp(30);
	$('#wsId').slideDown(30);

	$('#n2').prop('href', 'ProjectRedVelvetLive.php');
	$('#n10').prop('href', 'ProjectRedVelvetMore.php');
	$('#n14').prop('href', 'ProjectRedVelvetTrending.php');

	$('#menuId .menuContent .searchSug section').css({'width': '100%', 'height': '821px', 'background-color': '#3f0d12'});
});

$('#moreCategoriesId').ready(function () {
	$.ajax({
		type: 'GET',
		url: 'ProjectRedVelvetAjaxHandeler.php',
		cache: false,
		dataType: 'json',
		data: { fname: 'bitch' },
		success: function (argument) {
			var x1= [], x2 = [];
			var narr = $('[id^="cTile"]');
			for (var i = 0; i < argument.length; i++) 
			{
				x1[i] = document.createElement('img');
				x1[i].src = argument[i];
				x2[i] = narr[i];
				x2[i].appendChild(x1[i]);
			}
		}
	});
})

$('#navigationId a, #navigationId button').click(function (event) {
	if (event.target.matches('#n11'))
	{
		$('#navigationId, #moreCategoriesId, #liveNewsId').hide(30);
		$('#menuId').slideDown();
	}
	else
	{
		$('#navigationId, #moreCategoriesId, #liveNewsId').show(30);
	}
});

$('#menuCloseId').click(function () {
	$('#menuId').slideUp(30);
	$('#navigationId, #moreCategoriesId, #liveNewsId').show();
});