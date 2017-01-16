function show_destination(shipment)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("right_box").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../php/construct_destination_table.php?shipment=" + shipment, true);
    xmlhttp.send();
}

function deliver_shipment(field)
{
    var id = field.attributes["name"].value;
    //var tr = document.getElementsByName(field.attributes["name"].value);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xmlhttp.open("GET", "../php/deliver_shipment.php?id=" + id, true);
    xmlhttp.send();

}

function show_empty()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("right_box").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../php/construct_empty_right_table.php?message=" + "You have no shipments to deliver at the moment", true);
    xmlhttp.send();
}
