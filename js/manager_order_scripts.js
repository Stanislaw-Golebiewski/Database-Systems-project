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