function show_awaiting(warehouse)
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("right_box").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../php/construct_awaiting_table.php?warehouse=" + warehouse, true);
        xmlhttp.send();
    }

function collect_shipment(field)
{
    var id = field.attributes["name"].value;
	//var tr = document.getElementsByName(field.attributes["name"].value);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xmlhttp.open("GET", "../php/collect_shipment.php?id=" + id, true);
    xmlhttp.send();

}
