<?php

function GetRealIp()
{
 if (!empty($_SERVER['HTTP_CLIENT_IP']))
 {
   $ip=$_SERVER['HTTP_CLIENT_IP'];
 }
 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
 {
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
 }
 else
 {
   $ip=$_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}

function GetMAC($ip)
{$output=exec("arp -a ".$ip);
 $output=trim($output);
 if ($output=="No ARP Entries Found") { return "В таблице APR не найдены"; };
 $begin=strpos($output," ");
 $output=trim(substr($output,$begin));
 $end=strpos($output," ");
 $output=trim(substr($output,0,$end));
return trim($output);
}
 

echo"MAC<br />";
echo getRealIp();
$ip=getRealIp();
echo getmac($ip);