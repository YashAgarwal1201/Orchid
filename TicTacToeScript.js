
function selection(element) 
{
	var x = element;
	var id = x.id;
	$('[id='+ id +']').css("background","none");
	if (id == "cross") 
	{
		selection = 1;
		$('[id='+ id +']').css("background","indianred");
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
	var x = element;
	var id = x.id;
	if (selection == 1 || selection == -1) 
	{
		if ($('[id='+ id +']').text() == "" && selection == -1) 
		{
			for (var i = 0; i < idsArray.length; i++) 
			{
				if (id == idsArray[i].id) 
				{
					$('[id='+ id +']').css("background","indianred");
					$('[id='+ id +']').html('<i class="material-icons-outlined">circle</i>');
					nextMove();
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
					$('[id='+ id +']').css("background","indianred");
					$('[id='+ id +']').html('<i class="material-icons">close</i>');
					nextMove();
					break;
				}
			}
		}
	}
	else
	{
		alert("Please make a selection first");
	}
	//further
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
				break;
			}
		}
		if ($('[id='+ idsArray[i].id +']').text() == "" && selection == 1) 
		{
			rand = getId();
			if ($('[id='+ rand +']').text() == "") 
			{
				$('[id='+ rand +']').html('<i class="material-icons-outlined">circle</i>');
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