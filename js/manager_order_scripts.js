function show_content(order)
{
    var order_id = order.attributes["name"].value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("right_box").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "../php/construct_order_table.php?order=" + order_id, true);
    xmlhttp.send()
}