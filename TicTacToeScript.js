

window.onclick = function (event) 
{
	if (event.target.matches('#menu'))
	{
		$('.menuOp').show();
		$('#menu').css('background','crimson');
	}
	else if(event.target.matches('#AboutBtn')) 
	{
		$('#aboutModal').show();
	}
	else if (event.target.matches('#LevelBtn')) 
	{
		$('#levelModal').show();
	}
	else
	{
		$('.menuOp').hide();
		$('#menu').css('background','none');
	}
};

function selection(element) 
{
	var x = element;
	var id = x.id;
	$('[id='+ id +']').css("background","none");
	if (id == "cross") 
	{
		selection = 1;
		$('[id='+ id +']').css("background","coral");
	}
	else
	{
		selection = -1;
		$('[id='+ id +']').css("background","indianred");
	}
}

function move(element) 
{
	var ids = $('[id^=cell]');
	var idsArray = [...ids];
	var len = idsArray.length;
	var x = element;
	var id = x.id;
	var res;

	if (selection == 1 || selection == -1) 
	{
		if ($('[id='+ id +']').text() == "" && selection == -1) 
		{
			for (var i = 0; i < idsArray.length; i++) 
			{
				if (id == idsArray[i].id) 
				{
					$('[id='+ id +']').css("background","indianred").html('<i class="material-icons-outlined">circle</i>');
					//$('[id='+ id +']').html('<i class="material-icons-outlined">circle</i>');
					res = winingCondition();
					if (res) 
					{
						//$("#res").show();
						$("#resultModal").css("display", "block");
						setTimeout(rel,3000);
						break;
					}
					break;
				}
			}
		}
		if ($('[id='+ id +']').text() == "" && selection == 1) 
		{
			for (var i = 0; i < idsArray.length; i++) 
			{
				if (id == idsArray[i].id) 
				{
					$('[id='+ id +']').css("background","coral").html('<i class="material-icons">close</i>');
					//$('[id='+ id +']').html('<i class="material-icons">close</i>');
					res = winingCondition();
					if (res) 
					{
						//$("#res").show();
						$("#resultModal").css("display", "block");
						setTimeout(rel,3000);
						break;
					}
					break;
				}
			}
		}
		setTimeout(nextMove,4000);
	}
	else
		alert("Please make a selection first");
}

function nextMove() 
{
	var ids = $('[id^=cell]');
	var idsArray = [...ids];
	var len = idsArray.length;
	for (var i = 0; i < len; i++) 
	{
		if ($('[id='+ idsArray[i].id +']').text() == "" && selection == -1) 
		{
			rand = getId();
			if ($('[id='+ rand +']').text() == "") 
			{
				$('[id='+ rand +']').html('<i class="material-icons">close</i>');
				res = winingCondition();
				if (res) 
				{
					//$("#res").show();
					$("#resultModal").css("display", "block");
					setTimeout(rel,3000);
					break;
				}
				break;
			}
		}
		if ($('[id='+ idsArray[i].id +']').text() == "" && selection == 1) 
		{
			rand = getId();
			if ($('[id='+ rand +']').text() == "") 
			{
				$('[id='+ rand +']').html('<i class="material-icons-outlined">circle</i>');
				res = winingCondition();
				if (res) 
				{
					//$("#res").show();
					$("#resultModal").css("display", "block");
					setTimeout(rel,3000);
					break;
				}
				break; 
			}
		}
	}
}

function getId() 
{
	var ids = $('[id^=cell]');
	var idsArray = [...ids];
	var idsArray2 = [];
	for (var i = 0; i < idsArray.length; i++) 
	{
		if ($('[id='+ idsArray[i].id +']').text() == "") 
		{
			y = idsArray[i].id;
			idsArray2.push(y);
		}
	}
	var len = idsArray2.length;
	var r = Math.floor(Math.random() * len);
	return idsArray2[r];
}

function winingCondition()
{
	var ids = $('[id^=cell]');
	var idsArray = [...ids];
	if (idsArray[0].textContent === idsArray[1].textContent && idsArray[0].textContent === idsArray[2].textContent && idsArray[0].textContent != "")
	{
		if (idsArray[0].textContent == "close") 
		{
			idsArray[0].style.background = idsArray[1].style.background = idsArray[2].style.background = "pink";
			document.getElementById('res').innerHTML = "X wins"; 
		}
		else
		{
			idsArray[0].style.background = idsArray[1].style.background = idsArray[2].style.background = "purple";
			document.getElementById('res').innerHTML = "O wins";
		}
		return 1;
	}
	else if (idsArray[3].textContent === idsArray[4].textContent && idsArray[3].textContent === idsArray[5].textContent && idsArray[3].textContent != "")
	{
		if (idsArray[3].textContent == "close") 
		{
			idsArray[3].style.background = idsArray[4].style.background = idsArray[5].style.background = "pink";
			document.getElementById('res').innerHTML = "X wins"; 
		}
		else
		{
			idsArray[3].style.background = idsArray[4].style.background = idsArray[5].style.background = "purple";
			document.getElementById('res').innerHTML = "O wins";
		}
		return 1;
	}
	else if (idsArray[6].textContent === idsArray[7].textContent && idsArray[6].textContent === idsArray[8].textContent && idsArray[6].textContent != "")
	{
		if (idsArray[6].textContent == "close") 
		{
			idsArray[6].style.background = idsArray[7].style.background = idsArray[8].style.background = "pink";
			document.getElementById('res').innerHTML = "X wins"; 
		}
		else
		{
			idsArray[6].style.background = idsArray[7].style.background = idsArray[8].style.background = "purple";
			document.getElementById('res').innerHTML = "O wins";
		}
		return 1;
	}
	else if (idsArray[0].textContent === idsArray[3].textContent && idsArray[0].textContent === idsArray[6].textContent && idsArray[0].textContent != "")
	{
		if (idsArray[0].textContent == "close") 
		{
			idsArray[0].style.background = idsArray[3].style.background = idsArray[6].style.background = "pink";
			document.getElementById('res').innerHTML = "X wins"; 
		}
		else
		{
			idsArray[0].style.background = idsArray[3].style.background = idsArray[6].style.background = "purple";
			document.getElementById('res').innerHTML = "O wins";
		}
		return 1;
	}
	else if (idsArray[1].textContent === idsArray[4].textContent && idsArray[1].textContent === idsArray[7].textContent && idsArray[1].textContent != "")
	{
		if (idsArray[1].textContent == "close") 
		{
			idsArray[1].style.background = idsArray[4].style.background = idsArray[7].style.background = "pink";
			document.getElementById('res').innerHTML = "X wins"; 
		}
		else
		{
			idsArray[1].style.background = idsArray[4].style.background = idsArray[7].style.background = "purple";
			document.getElementById('res').innerHTML = "O wins";
		}
		return 1;
	}
	else if (idsArray[2].textContent === idsArray[5].textContent && idsArray[2].textContent === idsArray[8].textContent && idsArray[2].textContent != "")
	{
		if (idsArray[2].textContent == "close") 
		{
			idsArray[2].style.background = idsArray[5].style.background = idsArray[8].style.background = "pink";
			document.getElementById('res').innerHTML = "X wins"; 
		}
		else
		{
			idsArray[2].style.background = idsArray[5].style.background = idsArray[8].style.background = "purple";
			document.getElementById('res').innerHTML = "O wins"; 
		}
		return 1;
	}
	else if (idsArray[0].textContent === idsArray[4].textContent && idsArray[0].textContent === idsArray[8].textContent && idsArray[0].textContent != "")
	{
		if (idsArray[0].textContent == "close") 
		{
			idsArray[0].style.background = idsArray[4].style.background = idsArray[8].style.background = "pink";
			document.getElementById('res').innerHTML = "X wins"; 
		}
		else
		{
			idsArray[0].style.background = idsArray[4].style.background = idsArray[8].style.background = "purple";
			document.getElementById('res').innerHTML = "O wins";
		}
		return 1;
	}
	else if (idsArray[2].textContent === idsArray[4].textContent && idsArray[2].textContent === idsArray[6].textContent && idsArray[2].textContent != "")
	{
		if (idsArray[2].textContent == "close") 
		{
			idsArray[2].style.background = idsArray[4].style.background = idsArray[6].style.background = "pink";
			document.getElementById('res').innerHTML = "X wins"; 
		}
		else
		{
			idsArray[2].style.background = idsArray[4].style.background = idsArray[6].style.background = "purple";
			document.getElementById('res').innerHTML = "O wins";
		}
		return 1;
	}
	else
		return 0;
}

function rel() 
{
	location.reload();
}
