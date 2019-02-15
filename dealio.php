<?php

// Color
$blue="\033[1;34m";
$cyan="\033[1;36m";
$okegreen="\033[92m";
$lightgreen="\033[1;32m";
$white="\033[1;37m";
$purple="\033[1;35m";
$red="\033[1;31m";
$yellow="\033[1;33m";

function headers($body){
	$headers = array();
	$headers[] = "Content-Type: multipart/form-data; boundary=a05ec475-a759-4822-9009-3672abd8282d";
	$headers[] = "Content-Length: ".strlen($body);
	$headers[] = "Host: api.dealioapps.com";
	$headers[] = "Connection: close";
	$headers[] = "User-Agent: okhttp/3.10.0";
	return $headers;
}
function curl($url, $data){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, headers($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$x = curl_exec($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	return $httpCode;
}
function register($reff){
	$email = json_decode(@file_get_contents("https://api.randomuser.me/"),true)['results'][0]['login']['username'].rand(12345678,99999999)."@gmail.com";
	$provider = array("857","812","813","817","816");
	$phone = $provider[array_rand($provider)].rand(12345678,99999999);
	$arr = array("	","\r");
	$body = str_replace($arr,"",'--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="firstname"
	Content-Length: 9

	 OÄŸuzhan
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="lastname"
	Content-Length: 5

	Durak
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="username"
	Content-Length: 19

	'.$email.'
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="password"
	Content-Length: 0


	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="email"
	Content-Length: 19

	'.$email.'
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="phone"
	Content-Length: 14

	+62'.$phone.'
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="dob"
	Content-Length: 11

	15-Feb-1997
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="smoker"
	Content-Length: 5

	tidak
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="gender"
	Content-Length: 4

	pria
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="roles[]"
	Content-Length: 0


	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="active"
	Content-Length: 1

	1
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="player_id"
	Content-Length: 0


	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="avatar"
	Content-Length: 121

	https://lh4.googleusercontent.com/-TaujxFpzLJc/AAAAAAAAAAI/AAAAAAAAAAA/ACevoQMn4VfgRN9vnm8kSPE1oESS2k9gJw/s96-c/photo.jpg
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="state"
	Content-Length: 11

	DKI Jakarta
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="country_code"
	Content-Length: 3

	+62
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="register_type"
	Content-Length: 6

	google
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="referred_by"
	Content-Length: 7

	'.$reff.'
	--a05ec475-a759-4822-9009-3672abd8282d
	Content-Disposition: form-data; name="app_version"
	Content-Length: 1

	3
	--a05ec475-a759-4822-9009-3672abd8282d--');
	return curl("http://api.dealioapps.com/api/users/edit/0?access_token=no&app=1",$body);
}
@system("clear");
echo "\n\n";
echo "$red    ██████╗ ███████╗ █████╗ ██╗     ██╗ ██████╗   \n";
echo "$red    ██╔══██╗██╔════╝██╔══██╗██║     ██║██╔═══██╗  \n";
echo "$red    ██║  ██║█████╗  ███████║██║     ██║██║   ██║  \n";
echo "$red    ██║  ██║██╔══╝  ██╔══██║██║     ██║██║   ██║  \n";
echo "$red    ██████╔╝███████╗██║  ██║███████╗██║╚██████╔╝  \n";
echo "$red    ╚═════╝ ╚══════╝╚═╝  ╚═╝╚══════╝╚═╝ ╚═════╝   \n\n";
echo "$cyan Reff Code$red >$white ";
$reff = trim(fgets(STDIN));
echo "$cyan Total$red >$white ";
$jum = trim(fgets(STDIN)); $a = 0;
echo "\n";
while($a<$jum){
	if (register($reff) == '200'){
		echo "$cyan [$white Result$cyan ]$red >$okegreen ".register($reff)."\n";
		$a++;
	}
	else{
		echo "$cyan [$white Result$cyan ]$red >$yellow ".register($reff)."\n";
		$a++;
	}
}
