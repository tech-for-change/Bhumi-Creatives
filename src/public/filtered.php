<!--
	Title: Bhmui Creatives - Filter (Search) Project Page for Users
-->
<!DOCTYPE html>
<html>
<head>
	<title>Search Results</title>
	<link rel="icon" type="image/png" href="../../assets/img/siteicon.png" />
	<link rel="stylesheet" type="text/css" href="../../assets/css/display.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/gen/projects.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/gen/styles.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/buttons.css">
</head>

<body>
	<?php
		include 'header.php';
    include '../common/connection.php';

    $search = strtolower($_POST['filter']);
    $search = str_replace(" ",",",$search);
    $searcharr = preg_split( "/[,]+/", $search );

		$sql = "SELECT * FROM project;";
		$result = $conn->query($sql);

		if ($result->num_rows > 0)
		{
			$found = 0;
			while($row = $result->fetch_assoc())
			{
				$title = $row["title"];
				$url = $row["image"];
        
        		$tags = strtolower($row['tags']);
        		$tag_all = preg_split( "/[\s,]+/", $tags );
        		
        		foreach($tag_all as $tag)
        		{
          			$flag = 0;
			        for($i=0;$i<count($searcharr);$i++)
			        {
			          	if(strpos($tag, $searcharr[$i]) !== false)
			           	{
			           		echo "<div class='w3-btn w3-col m4 l3'><a onclick='redir()'><img name='".$title."' class='projectImg rounded w3-hover-opacity' id='".$row['pid']."' src='../../".$url."' alt='Not able to display' /><br>";
					        echo "<b>".ucfirst($title)."<br>Tags:</b> ".$row['tags']."</a></div>";
			              
			           		$flag = 1;
			           		$found = 1;
			           		break;
			           	}
			        }
			        if($flag)
			        	break;
				}
			}

      		if( $found == 0 )
            	echo "<center><h4>There's no result for the filter tags. Try something else :)</h4></center>";
		}
		else{
			echo "<h3>No Projects to Display.</h3>";
	 }
	?>

	<script type='text/javascript'>
		function redir() {
			window.open('imgDisplay.php?pid='+event.srcElement.id,'_self');
		}
	</script>
	<!-- Call footer.php for Footer Bar-->
	<!--Footer to be added-->

</body>
</html>
