<?php
require_once 'config/db.php';
require_once 'classes/Login.php';
require_once 'classes/functions.php';

$comics = new comicSearch ();
$comics->seriesList ();
$dropdown = "<select name=\"series_name\">\n";
$dropdown .= "<option value=\"\" selected=\"selected\"></option>\n";
while ( $row = $comics->series_list_result->fetch_assoc () ) {
	$series_id = $row ['series_id'];
	$series_name = $row ['series_name'];
	$dropdown .= "<option value=\"$series_name\" >" . $series_name . "</option>\n";
}

$dropdown .= "</select>";

$last_series_id_query = "select series_id from series ORDER BY series_id DESC LIMIT 1";

// $writer_query = "SELECT writer_name FROM writer_link LEFT JOIN writers ON (writers.writer_id = writer_link.writer_id) WHERE writer_link.comic_id = $_GET[comic_id]";

$last_series_id = mysqli_query ( $connection, $last_series_id_query );
// $writer = mysqli_query($connection,$writer_query);

if (mysqli_num_rows ( $last_series_id ) > 0) {
	while ( $row = mysqli_fetch_assoc ( $last_series_id ) ) {
		$new_series_id = ++ $row ['series_id'];
	}
} else {
	echo "0 results.";
}

mysqli_close ( $connection );

?>
<?php include 'views/head.php';?>
  <title>Comic Search</title>
</head>
<body>
  <form method="post" action="results.php">
    <label>Series</label>
    <?php echo $dropdown?>
    <label>Issue Number</label>
    <input name="issue_number" type="text" size="3" maxlength="4" value=""/>
    <input type="submit" name="submit" value="Submit" />
  </form>
</body>
</html>