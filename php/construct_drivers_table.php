<?php
	function html_form($id, $name, $number, $car, $shipments)
	{
		return "<tr name=\"$id\">
          <td>$id</td>
          <td>$name</td>
          <td>$number</td>
          <td>$car</td>
          <td>$shipments</td>
        </tr>";
	}
	$content="<table class=\"big_table\">
        	  <tr>
          	     <th>ID</th>
          	     <th>Name</th>
          	     <th>Phone</th>
          	     <th>Car</th>
          	     <th>Shipments</th>
              </tr>";

	include("db_connect.php");
	$query = "select e.employee_id, e.name, e.phone, d.car_id, sn.count 
           from employee e, driver d,
              (select d.employee_id, count(sh)
                from driver d
                left join shipment sh
                on d.employee_id = sh.driver_id
                and (sh.status = 'ON THE WAY' or sh.status = 'AWAITING')
                group by d.employee_id) as sn
            where e.employee_id = d.employee_id
            and e.employee_id = sn.employee_id
            order by e.employee_id";
	$rs = pg_query($connection, $query) or die("Cannot execute query: $query\n");
    while ($row = pg_fetch_row($rs)) {
    		$content = $content.html_form($row[0],$row[1],$row[2],$row[3],$row[4]);
     }
     echo $content."</table>";
?>