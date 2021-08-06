
var searchHeight = $(document).height() - $('#topnav1').height();
$('.searchDisplay').height(searchHeight);
$('.extraBtn').hide();



$(document).ready(function()
{
	$.ajaxSetup({cache: false}); //default values for future AJAX requests, browser will not cache the requested pages.
	setInterval(displayNextImage,5000);
	setInterval(quotesL, 20000);

	var img1 = document.createElement("img"); 
	img1.src = "Images/YA.png"; 
	var src = document.getElementById('homeImageid');
	img1.id = "hI";
	src.appendChild(img1);


	$('img').bind('contextmenu', function(e){ return false;});
	$('video').bind('contextmenu', function(e){ return false;});
	//$('.extraBtn').hide();
});

function displayNextImage() 
{
    x = (x === images.length - 1) ? 0 : x + 1;
    document.getElementById("hI").src = images[x];
}
function displayPreviousImage() 
{
    x = (x <= 0) ? images.length - 1 : x - 1;
    document.getElementById("hI").src = images[x];
}

var images = [], x = -1;
images[0] = "Images/Yash Agarwal 1.png";
images[1] = "Images/Yash Agarwal 2.png";
images[2] = "Images/Yash Agarwal 3.png";
images[3] = "Images/YA.png";

function quotesL()
{
	$.ajax({
		type: "POST",
		url: "quotes.php",
		data: { get_quote: "quote" },
		success: function(response)
		{
			$('#quotez').html(response);
		}
	});
	//$('#quotez').load('quotes.php');
}

document.getElementById('inf').href = "info.html";

// topnav styling & access function 
function fun(ele)
{
	$('.searchDisplay').slideUp('fast');
	var z = ele;
	var ids = document.querySelectorAll("#homeid, #bioid, #projectsid, #gallid");
	var idsArray = [...ids];
	var x = document.getElementById('nav');
	var y = x.getElementsByTagName('button');
	for (var i = 0, j = 0; i < y.length, j < idsArray.length ; i++, j++) 
	{
		y[i].style.fontWeight = "normal";
		idsArray[j].style.display = "none";
		if (y[i].id == z.id && i == j) 
		{
			y[i].style.fontWeight = "bold";
			idsArray[j].style.display = "flex";
			$('[id=navId]').hide();
			/*if (idsArray[j].id == "homeid")
			{
				document.getElementById('body').style.background = "#c1946a";
			}
			else if (idsArray[j].id == "bioid" )
			{
				document.getElementById('body').style.background = "#c1946a";
			}
			else if (idsArray[j].id == "projectsid") 
			{
				document.getElementById('body').style.background = "#c1946a";
			}
			else
			{
				document.getElementById('body').style.background = "#c1946a";
				//alert("OOPS this page is not ready yet!!!");
			}*/
		}
	}
}

// Date Time Functions 
function display_date() 
{
			var x = new Date();
			//changeMode(x);
			var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
			hours = x.getHours( ) % 12;
			hours = hours ? hours : 12;
			hours = hours.toString().length ==1 ? 0+hours.toString() : hours;

			var minutes = x.getMinutes().toString();
			minutes = minutes.length ==1 ? 0+minutes : minutes;
			
			var seconds = x.getSeconds().toString();
			seconds = seconds.length == 1 ? 0+seconds : seconds;
			
			var month = (x.getMonth()).toString();
			month = month.length == 1 ? 0+month : month;
			
			var dt = x.getDate().toString();
			dt = dt.length == 1 ? 0+dt : dt;
			
			var monthName = [ "January","Februrary","March","April","May","June","July","August","September","October","November","December" ];
			for (var i = 0; i < monthName.length; i++) 
			{
				if (i == month) 
				{
					var x1 = monthName[i] + " " + dt + ", " + x.getFullYear();					
				}
			}

			//var x1 = month + "/" + dt + "/" + x.getFullYear();
			x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
			
			/*document.getElementById('date').innerHTML = x1;
			document.getElementById('date2').innerHTML = x1;*/
			$('[id="date"]').text(x1);
			display_datetime();
}
function display_datetime()
{
			var refresh=1000; // Refresh rate in milli seconds
			mytime=setTimeout('display_date()',refresh);
}
display_datetime();

// function to change mode
function changeMode()
{
	var dateData = new Date();
	if(dateData.getHours() >= '20' || dateData.getHours() <= '6' )//&& dateData.getMinutes() >= '30')
	{	
		document.getElementById('link1').href = "";
		document.getElementById('link2').href = "mynightmode.css";
		/*var ids = document.querySelectorAll("#b1, #b2, #b3, #b5");
		var idsArray = [...ids];
		for (var i = 0; i < idsArray.length; i++) 
		{
			idsArray[i].setAttribute("onclick", "fu(this)");
		}*/

	}	
}

// function for projects display
function projectView(ele)
{
	var t = new Date();
	var x = ele;
	var ids = document.querySelectorAll('#projectTemplateid, #inspireid, #collectid, #gradientid, #ticTacid');
	var idsArray = [...ids];
	var y = document.getElementById('projectCategoryid');
	var z = y.getElementsByTagName('button');
	for (var i = 0, j = 0; i < z.length, j < idsArray.length; i++, j++) 
	{
		z[i].style.fontWeight = "normal";
		idsArray[j].style.display = "none";
		if (x.id == z[i].id && i == j) 
		{
			z[i].style.fontWeight = "bold";
			if (idsArray[j].id == 'projectTemplateid') 
			{
				idsArray[j].setAttribute("style", "display:flex; flex-flow: row wrap; justify-content: flex-start; align-items: center;");
			}
			else
			{
				idsArray[j].setAttribute('style', 'display: inline-block;');
				if (idsArray[j].id == 'inspireid')
					inspiredContent();
			}
		}
	}
}

function inspiredContent() {

	$('#inspiredAF1id, [id^="inspiredBF"]').empty();
	/*var inspA = document.createElement('iframe');
	inspA.src = 'ProjectBlueBerry.php';
	var inspAvar = document.getElementById('inspiredAF1id');
	inspAvar.appendChild(inspA);*/

	var zeta = $('[id^="inspiredBF"]'), inspaB = [], inspaBvar = [];
	var beta = $('[id^="inspiredAF"]'), inspaA = [], inspaAvar = [];

	for (var i = 0; i < zeta.length; i++) {

		inspaB[i] = document.createElement('iframe');
		if (i == 0)
			inspaB[i].src = 'ProjectLily/Lily01.php';
		if (i == 1)
			inspaB[i].src = 'ProjectLily/Lily01m.php';
		if (i == 2)
			inspaB[i].src = 'ProjectLily/Lily02.php';
		if (i == 3)
			inspaB[i].src = 'ProjectLily/Lily02m.php';
		if (i == 4)
			inspaB[i].src = 'ProjectLily/Lily03s.php';
		if (i == 5)
			inspaB[i].src = 'ProjectLily/Lily03m.php';

		inspaBvar[i] = zeta[i];
		inspaBvar[i].appendChild(inspaB[i]);
	}

	for (var i = 0; i < beta.length; i++) {

		inspaA[i] = document.createElement('iframe');
		if (i == 0)
			inspaA[i].src = 'ProjectBlueBerry.php';//'ProjectLily/Lily01.php';
		if (i == 1)
			inspaA[i].src = 'ProjectRedVelvet/ProjectRedVelvet.php';

		inspaAvar[i] = beta[i];
		inspaAvar[i].appendChild(inspaA[i]);
	}

	var width = $('.inspire').innerWidth() - 75;
	$('[id^=inspiredAF] iframe, [id^="inspiredBF"] iframe').css({'width': width, 'height': '600px'});
}


function timeView(ele)
{
	var x = ele;
	if (x.id == "info") 
	{
		$("#projectTimelineid").css("display","none");
		$(".infoClass3").css("display","inline-block");
		x.style.fontWeight = "bold";
		$('#tml').css("font-weight","normal");
	}
	if (x.id == "tml") 
	{
		$("#projectTimelineid").css("display","inline-block");
		$(".infoClass3").css("display","none");
		x.style.fontWeight = "bold";
		$('#info').css("font-weight","normal");
	}
}

// function for versions
function version(ele)
{
	var x = ele;
	if (x.id == 'v1') 
	{
		document.getElementById('body').style.display = "none";
		location.href = "version1January.html";
	}
	else if (x.id == 'v2') 
	{
		document.getElementById('body').style.display = "none";
		location.href = "version2February.html";
	}
	else if (x.id == 'v3')
	{
		alert("This version is not available for viewing");
	}
	else
	{
		alert("This is the latest version!!!");
	}
}

// scrollbtn functions
var scrollingElement = (document.documentElement || document.body)
$('#smb2').hide();
$('.extraBtn button, .extraBtn button i').click(function (arg) 
{
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

//Form Handling
$("#form1").submit(function(e) {
	e.preventDefault(); // avoid to execute the actual submit of the form.
	var badWords = [
		"fuck", "stfu", "crap", "shit", "trash", "bitch", "bc", "bullshit", "cuss", "hell", "curse", "getlost", "moth", "fath", "douche", "abuse"
	];
	var name = $("[name='Name']").val().toLowerCase();
	var msg = $("[name='Message']").val().toLowerCase();
	if ($.inArray(name, badWords) !== -1 || $.inArray(msg, badWords) !== -1) 
	{
		alert("You Message contains bad words, Kindly remove them.");
	}
	else 
	{
		var form = $(this);
    	var Url = form.attr('action');
    	$.ajax({
    		type: "POST",
    		url: Url,
    		data: form.serialize(), // serializes the form's elements.
    		success: function(datal)
    		{
    		       	$(":selected").val('');
    		       	$("#footerid > h2").hide();
    		       	$("#form1").text(datal);
    		}
    	});
    }
});

	window.onclick = function (event) {
		if (event.target.matches('#extraMenu')) 
		{
			$('.extraBtn').show();
			$('.extraMenu').hide();
		}
		else if (event.target.matches('#s, #search1, .searchDisplay *'))
		{	
			$('#search1').show('fast');
			$('#s').css('border-bottom','2px solid white');
			$('#s span').hide();
			$('.searchDisplay').slideDown('fast').css({'z-index':'5', 'position':'sticky'});
			//$('body').css('overflow', 'none');
			$('#projectsid, #bioid, #footerid, #homeid').css('opacity','0.3');
		}
		else
		{
			$('.extraBtn').hide();
			$('#s span').show();
			$('.extraMenu').show();
			$('#search1').hide('fast').val('');
			$('#s').css('border-bottom','none');
			$('.searchDisplay').slideUp('fast');
			//$('body').css('overflow', 'scroll');
			$('#projectsid, #bioid, #footerid, #homeid').css('opacity','1');
		}
	};

$('#inspireid button').click(function (eve) {
			//alert('hi');
			var width = $('.inspire').innerWidth() - 50;
			var pos = $('.inspiredA').scrollLeft();
			var pos2 = $('.inspiredB').scrollLeft();
			//alert(pos2);

			if (eve.target.matches('#Backb1i')) 
			{
				$('.inspiredA').scrollLeft(pos - width);
			}
			else if (eve.target.matches('#Backb2i')) 
			{
				$('.inspiredB').scrollLeft(pos2 - width);
			}
			else if (eve.target.matches('#Aheadb1i'))
			{	
				$('.inspiredA').scrollLeft(pos + width);
			}
			else if (eve.target.matches('#Aheadb2i'))
			{	
				$('.inspiredB').scrollLeft(pos2 + width);
			}
			else if (eve.target.matches('#horzView1i'))
			{
				$('#horzView1i').hide();
				$('#inspiredCont1').removeClass('inspiredContainer2');
				$('#inspiredCont1').addClass('inspiredContainer');
				$('#vertView1i').show();
			}	
			else if (eve.target.matches('#horzView2i'))
			{
				$('#horzView2i').hide();
				$('#inspiredCont2').removeClass('inspiredContainer2');
				$('#inspiredCont2').addClass('inspiredContainer');
				$('#vertView2i').show();
			}
			else if (eve.target.matches('#vertView1i'))
			{
				$('#vertView1i').hide();
				$('#inspiredCont1').addClass('inspiredContainer2');
				$('#inspiredCont1').removeClass('inspiredContainer');
				$('#horzView1i').show();
			}
			else if (eve.target.matches('#vertView2i'))
			{
				$('#vertView2i').hide();
				$('#inspiredCont2').addClass('inspiredContainer2');
				$('#inspiredCont2').removeClass('inspiredContainer');
				$('#horzView2i').show();
			}
			else
			{}
		});


$('#s').keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
});

$('#s').keyup(function (ar) {
	ar.preventDefault();
	var searchRes = $('[name="searchres"]').val().toLowerCase();
	//$('.searchDisplay').css('display', 'block');
	var badWords = [
		"fuck", "stfu", "crap", "shit", "trash", "bitch", "bc", "bullshit", "cuss", "hell", "curse", "getlost", "moth", "fath", "douche", "abuse"
	];
	if (searchRes != "") 
	{
		if ($.inArray(searchRes, badWords) !== -1) 
		{
			$('#searchResultsId').text("Bad Words Alert!");
		}
		else 
		{
			$.ajax({
    			type: "GET",
    			url: 'searchbar.php',
    			data: { searchq : searchRes }, 
    			success: function(datal)
    			{
    			   $("#searchResultsId").html(datal);
    			}
    		});
		}
		//$('#search1').val() = "";
    	//$('#searchResultsId').load('searchbar.php');
	}
	else
	{
		$('#searchResultsId').text('No Suggestions');
	}

});