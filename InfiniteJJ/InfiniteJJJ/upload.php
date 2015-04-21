<?php

if ((($_FILES["file"]["type"] == "audio/mp3")
|| ($_FILES["file"]["type"] == "audio/mpeg")
|| ($_FILES["file"]["type"] == "audio/mp4")
|| ($_FILES["file"]["type"] == "audio/wav"))
&& ($_FILES["file"]["size"] < 50000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("/usr/local/apache2/htdocs/u/css/tuhq/InfiniteJ/InfiniteJJ/audio2/" . $_POST["key"]))
      {
      echo $_POST["key"] . " The file already exists. ";     
	  }
    else
      {
	  $from = $_FILES["file"]["tmp_name"];
	  $to = "/usr/local/apache2/htdocs/u/css/tuhq/InfiniteJ/InfiniteJJ/" . $_POST["key"];
      move_uploaded_file($from, "$to");
	  echo "from: " . $from . "<br >";
	  echo "Stored in: " .  $_POST["key"]. "<br />";	  
	  }
	$url = $_POST["success_action_redirect"].'?bucket=student.cs.appstate.edu/~tuhq/InfiniteJ/InfiniteJJ/&key='.urlencode($_POST["key"]);
	echo $url. "<br />";
	echo $_POST["success_action_redirect"];
	header('HTTP/1.1 307 Temporary Redirect');
	header('Location: '.$url);
    }
  }
else
  {
  echo "Invalid file";
  }
?> 