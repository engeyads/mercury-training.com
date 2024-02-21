<?php
require("../functions.php");
	
url_to_alias($the_get);
$sql_course = "SELECT * FROM `course_c` ";
$result_course = mysql_query($sql_course, $conn);
if ($result_course && (mysql_num_rows($result_course) > 0)) {
	while ($row_course = mysql_fetch_assoc($result_course)){
		$the_get = "&Categories_{$row_course[id]}=1";
		echo $the_get; echo '<br>';
		url_to_alias($the_get);

		$the_get = "&Categories_{$row_course[id]}=1&online=online";
		echo $the_get; echo '<br>';
		url_to_alias_online($the_get);

	}
}

$sql_cities = "SELECT * FROM `cities` ";
$result_cities = mysql_query($sql_cities, $conn);
if ($result_cities && (mysql_num_rows($result_cities) > 0)) {
	while ($row_cities = mysql_fetch_assoc($result_cities)){
		$the_get = "&Cities_{$row_cities[id]}=1";
		echo $the_get; echo '<br>';
		url_to_alias($the_get);
	}
}
?>