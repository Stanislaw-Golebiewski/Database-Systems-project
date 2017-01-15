function addDelivery(button_id)
{
    console.log(document.getElementById("full_box"));
    var table_row = document.getElementById("full_box").childNodes[1].childNodes[1].childNodes[button_id];
    console.log(table_row);

    var delivery_value = table_row.childNodes[9].childNodes[0].value;

    if (!valueOk(delivery_value)) 
    {
        alert("Error: wrong input");
        return;
    }
    
    var old_quantity = table_row.childNodes[7].childNodes[0].data;
    var product_id = table_row.childNodes[1].childNodes[0].data;

    var new_quantity = parseInt(old_quantity) + parseInt(delivery_value);

    //alert("id: " + product_id);

    var args = "p_id="+product_id+"&new_q="+new_quantity;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };

    xmlhttp.open("GET", "../php/add_product_delivery.php?" + args, true);
    xmlhttp.send();
}


function valueOk(value)
{
    if (value == parseInt(value))
    {
        if (value > 0)
        {
            return true;
        }
    }
    return false;
}