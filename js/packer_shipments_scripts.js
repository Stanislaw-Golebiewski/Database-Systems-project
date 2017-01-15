function addShipment(shipment_id)
{
	var xmlhttp = new XMLHttpRequest();
   	    xmlhttp.onreadystatechange = function() {
   	        if (this.readyState == 4 && this.status == 200) {
   	    		if(this.responseText != "") alert(this.responseText);
   	        	location.reload();
   	        }
   	    };
   	    xmlhttp.open("GET", "../php/packer_update_status.php?shipment=" + shipment_id, true);
   	    xmlhttp.send();
}

function completeShipment(shipment_id)
{
	var xmlhttp = new XMLHttpRequest();
   	xmlhttp.onreadystatechange = function() {
   	    if (this.readyState == 4 && this.status == 200) {
   	    	if(this.responseText != "") alert(this.responseText);
   	        location.reload();
   	    }
   	};
   	xmlhttp.open("GET", "../php/packer_complete_shipment.php?shipment=" + shipment_id, true);
   	xmlhttp.send();
}

function show_content(shipment)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("right_box").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../php/construct_product_table.php?shipment=" + shipment, true);
    xmlhttp.send();
}