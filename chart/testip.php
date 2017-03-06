<?php
$hostname = getHostName();
$ip = gethostbyname($hostname);

echo $hostname.'<br>';
echo $ip.'<br><br><br>';


    echo getenv('HTTP_CLIENT_IP').'<br>';
    echo getenv('HTTP_X_FORWARDED_FOR').'<br>';
    echo getenv('HTTP_X_FORWARDED').'<br>';
    echo getenv('HTTP_FORWARDED_FOR').'<br>';
	echo getenv('HTTP_FORWARDED').'<br>';
    echo getenv('REMOTE_ADDR').'<br><br>';
	
    echo $_SERVER['HTTP_CLIENT_IP'].'<br>';
    echo $_SERVER['HTTP_X_FORWARDED_FOR'].'<br>';
    echo $_SERVER['HTTP_X_FORWARDED'].'<br>';
    echo $_SERVER['HTTP_FORWARDED_FOR'].'<br>';
    echo $_SERVER['HTTP_FORWARDED'].'<br>';
    echo $_SERVER['REMOTE_ADDR'];
?>