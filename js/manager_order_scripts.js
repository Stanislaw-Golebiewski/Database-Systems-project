function show_content(order)
{
    var order_id = order.attributes["name"].value;
    var content = document.getElementById("right_box");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            content.innerHTML = this.responseText;
            put_numbers(content.childNodes[2].childNodes[1].childNodes);
        }
    };
    xmlhttp.open("GET", "../php/construct_order_table.php?order=" + order_id, true);
    xmlhttp.send();
}

//put proper numbers in fillable fields
function put_numbers(child_nodes)
{
	for(i=1; i < child_nodes.length; i++)
	{
		var field_to_fill = child_nodes[i].childNodes[7]
		var quantity = parseInt(child_nodes[i].childNodes[3].innerHTML);
		var in_stock = parseInt(child_nodes[i].childNodes[5].innerHTML);
		if(quantity <= in_stock) field_to_fill.childNodes[0].value = quantity;
		else field_to_fill.childNodes[0].value = in_stock;
	}
}

//create new shipment in database, but first, check if user inserted proper values (row_ok(tr) function)
function createShipment(order_id)
{
    var table_rows = document.getElementById("right_box").childNodes[2].childNodes[1].childNodes;
    var sum = 0;
    for(i = 1; i < table_rows.length; i++)
    {
        if(!row_ok(table_rows[i])) 
        {
            alert("Can't create shipment, wrong numbers in fields");
            return;
        }
        sum += parseInt(table_rows[i].childNodes[7].childNodes[0].value)

    }
    if(sum == 0)
    {
        alert("Can't create shipment, total quantity of products is shipment has to be more than 0");
        return; 
    }

    //alert("Numbers are ok, create shipment");

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var shipment_id = this.responseText;
        console.log(shipment_id);
        udpate_products(order_id, shipment_id, table_rows);
    }
    };
    xmlhttp.open("GET", "../php/insert_new_shipment.php?order=" + order_id, true);
    xmlhttp.send();
}

//check if row have proper value in fillable field after 'create shipment' button is cllickes
function row_ok(table_row)
{
    var input_field = parseInt(table_row.childNodes[7].childNodes[0].value);
    var quantity = parseInt(table_row.childNodes[3].innerHTML);
    var in_stock = parseInt(table_row.childNodes[5].innerHTML);

    if(input_field > quantity || input_field > in_stock || input_field < 0 || input_field == null)
    {
        console.log(table_row.childNodes[7]);
        table_row.childNodes[7].bgColor = "#FF0000";
        return false;  
    }
    else
    {
        table_row.childNodes[7].bgColor = "";
        return true;
    }
}

function udpate_products(order_id, shipment_id, table_rows)
{
    for(i = 1; i < table_rows.length; i++)
    {
        var input_field = parseInt(table_rows[i].childNodes[7].childNodes[0].value);
        var quantity = parseInt(table_rows[i].childNodes[3].innerHTML);
        var in_stock = parseInt(table_rows[i].childNodes[5].innerHTML);
        var product_id = table_rows[i].attributes["name"].value; 

        if(input_field != 0)
        insert_update_products(shipment_id, product_id, order_id, input_field , (quantity - input_field) , (in_stock - input_field));
    }
    location.reload();
}

//insert new product and quantities in shipment-product, update order-product and availibility-warehouse
function insert_update_products(shipment_id, product_id, order_id, new_shipment_quantity, new_order_quantity, new_aval_quantity)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
    }
    };
    var args = "sh_id="+shipment_id+"&p_id="+product_id+"&o_id="+order_id+"&sh_q="+new_shipment_quantity+"&or_q="+new_order_quantity+"&av_q="+new_aval_quantity;
    console.log(args);
    xmlhttp.open("GET", "../php/add_and_update_products.php?"+args, false);
    xmlhttp.send();
}