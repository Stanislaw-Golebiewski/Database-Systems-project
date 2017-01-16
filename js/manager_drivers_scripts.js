function fire_employee(field)
{
	console.log(field.attributes["name"].value);
    var id = field.attributes["name"].value;
	var tr = document.getElementsByName(field.attributes["name"].value);
	if(parseInt(tr[0].childNodes[7].innerHTML) > 0)
	{
		alert("Driver is still working!");
	}
    else
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xmlhttp.open("GET", "../php/fire_driver.php?id=" + id, true);
        xmlhttp.send();
    }
}
