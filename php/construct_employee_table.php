<?php
	function html_form($id, $name, $number, $shipments)
	{
		return "<tr name=\"$id\">
          <td>$id</td>
          <td>$name</td>
          <td>$number</td>
          <td>$shipments</td>
          <td><button name=\"$id\" onclick=\"fire_emplyee(this)\">Fire</button></td> 
        </tr>";
	}
	$content="<table class=\"big_table\">
        	  <tr>
          	     <th>ID</th>
          	     <th>Name</th>
          	     <th>Phone</th>
          	     <th>Shipments</th>
          	     <th> </th>
              </tr>";

	include("db_connect.php");
	$query = "select e.employee_id, e.phone, e.name, pc.count
            from employee e, warehouse w, manager m, packer p, 
              (select p.employee_id, count(pl.packer_id)
               from packer p
               left join packing_line pl
               on p.employee_id = pl.packer_id
               group by p.employee_id) as pc
            where p.employee_id = e.employee_id
            and p.warehouse_id = w.warehouse_id
            and w.warehouse_id = m.warehouse_id
            and m.employee_id = ".$_SESSION["user_id"]."
            and pc.employee_id = p.employee_id";
	$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
    while ($row = pg_fetch_row($rs)) {
    		$content = $content.html_form($row[0],$row[1],$row[2],$row[3]);
     }
     echo $content."</table>";
?>