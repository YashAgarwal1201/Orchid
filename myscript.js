

// topnav styling & access function 
function fun(ele)
{
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
			$('[id="tn2btnid2"]').css({"background-color":"none", "color":"grey"});
			if (idsArray[j].id == "homeid")
			{
				document.getElementById('body').style.background = "teal";
			}
			else if (idsArray[j].id == "bioid" )
			{
				document.getElementById('body').style.background = "BurlyWood";
			}
			else if (idsArray[j].id == "projectsid") 
			{
				document.getElementById('body').style.background = "darkseagreen";
			}
			else
			{
				document.getElementById('body').style.background = "yellowgreen";
				//alert("OOPS this page is not ready yet!!!");
			}
			continue;
		}
	}
}

// topnav style & access function for night mode 
function fu(ele)
{
	var z = ele;
	var x = document.getElementById('nav');
	var y = x.getElementsByTagName('button');
	var ids = document.querySelectorAll("#homeid, #bioid, #projectsid, #timelineid, #gallid");
	var idsArray = [...ids];
	for (var i = 0, j = 0; i < y.length, j < idsArray.length; i++, j++) 
	{
		y[i].style.fontWeight = "normal";
		//y[i].style.color = "grey";
		idsArray[j].style.display = "none";
		if (y[i].id == z.id && i == j) 
		{
			y[i].style.fontWeight = "bold";
			//y[i].style.color = "white";
			idsArray[j].style.display = "flex";
			$('[id=navId]').hide();
			$('[id="tn2btnid2"]').css({"background-color":"none", "color":"grey"});
			continue;
		}

	}
}

// TopNav2 Function 
function topnav2(ele) 
{
	var x = ele.id;
	if (x == "tn2btnid") 
	{
		$('[id=navId]').css({"display":"flex", "flex-flow":"column wrap", "justify-content": "flex-start", "align-items": "center"});
		//$('[id=navId]').show(); 
		$('[id='+ x +'], [id='+ x +'].i').css({"background-color":"grey", "color":"black"});
		//x.id = "tn2btnid2";
		//$('[id='+ x +']').prop("id", "tn2btnid");
		$('#tn2btnid').prop("id", "tn2btnid");
	}
	if (x == "tn2btnid2") 
	{
		//$('#navId').css('display', 'none'); 
		$('[id=navId]').hide();
		$('[id='+ x +'],[id='+ x +'].i').css({"background-color":"none", "color":"grey"});
		//x.id = "tn2btnid";
		//$('[id='+ x +']').prop("id", "tn2btnid");
		$('#tn2btnid2').prop("id", "tn2btnid");
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
			/*changeMode(hours);*/
			var minutes = x.getMinutes().toString();
			minutes = minutes.length ==1 ? 0+minutes : minutes;
			
			var seconds = x.getSeconds().toString();
			seconds = seconds.length == 1 ? 0+seconds : seconds;
			
			var month = (x.getMonth()).toString();
			month = month.length == 1 ? 0+month : month;
			
			var dt = x.getDate().toString();
			dt = dt.length == 1 ? 0+dt : dt;
			
			var monthName = [ "January", "Februrary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
			for (var i = 0; i < monthName.length; i++) 
			{
				if (i == month) 
				{
					var x1 = monthName[i] + " " + dt + ", " + x.getFullYear();					
				}
			}

			//var x1 = month + "/" + dt + "/" + x.getFullYear();
			x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
			
			document.getElementById('date').innerHTML = x1;
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
	if(dateData.getHours() >= '18' || dateData.getHours() <= '6' )//&& dateData.getMinutes() >= '30')
	{	
		document.getElementById('link1').href = "";
		document.getElementById('link2').href = "mynightmode.css";
		//document.getElementById('body').setAttribute("style","background: #132020;");
		var ids = document.querySelectorAll("#b1, #b2, #b3, #b5");
		var idsArray = [...ids];
		for (var i = 0; i < idsArray.length; i++) 
		{
			idsArray[i].setAttribute("onclick", "fu(this)");
			//idsArray[i].setAttribute("style", "color: grey; ");
		}

	}	
}

// function for projects display
function projectView(ele)
{
	var t = new Date();
	var x = ele;
	var ids = document.querySelectorAll('#projectTemplateid, #projectTimelineid');
	var idsArray = [...ids];
	var y = document.getElementById('projectCategoryid');
	var z = y.getElementsByTagName('button');
	for (var i = 0, j = 0; i < z.length, j < idsArray.length; i++, j++) 
	{
		z[i].style.fontWeight = "normal";
		idsArray[j].style.display = "none";
		if (t.getHours() >= '18' || t.getHours() <= '6') 
		{
			//z[i].style.color = "grey";
			z[i].style.fontWeight = "bold";
		}
		else
			z[i].style.color = "black";
		if (x.id == z[i].id && i == j) 
		{
			//z[i].style.color = "white";
			z[i].style.fontWeight = "bold";
			if (idsArray[j].id == 'projectTimelineid') 
			{
				//idsArray[j].setAttribute("style", "display: flex; flex-flow: column wrap; justify-content: space-between; align-items: center;");
				idsArray[j].style.display = "inline-block";
			}
			else
			{
				idsArray[j].setAttribute("style", "display:flex; flex-flow: row wrap; justify-content: flex-start; align-items: center;");
			}
			continue;
		}
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
	else
	{
		alert("This is the latest version!!!");
	}
}

// scrollbtn functions
scrollingElement = (document.documentElement || document.body)
$(document).ready(function() {
	window.onscroll = function() { scrollFunction(); }
	function scrollFunction() 
	{
		var z = scrollingElement.scrollHeight - scrollingElement.clientHeight;
		if (scrollingElement.scrollTop <= 500 && scrollingElement.scrollTop >= 0) 
		{
			//$("#pagescrollup").css("display","none");
			$("#pagescrollup").hide();
			$("#pagescrolldown").show();
		}
		else if (scrollingElement.scrollTop > 500) 
  		{
  			//$("#pagescrollup").css("display","block");
  			$("#pagescrollup").show();
  		}
  		else if ((scrollingElement.scrollTop/z) > 0.80) 
  		{
  			$("#pagescrolldown").hide();
  		}
  		else 
  		{
   			//$("#pagescrollup").css("display","none");
   			$("#pagescrollup").hide();
   			$("#pagescrolldown").show();
  		}
	}
});

function scrollbtn2()
{
	scrollingElement.scrollTop = scrollingElement.scrollHeight;
}
function scrollbtn (id) 
{
   scrollingElement.scrollTop = 0;
}


// quote change function

//Form Handling
/*$("#form1").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var Url = form.attr('action');
    $.ajax({
           type: "POST",
           url: Url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert("Form Successfully submitted"); // show response from the php script.
           }
         });
});*/