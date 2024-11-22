<?php
error_reporting(0);


//Docs https://github.com/Medium/medium-api-docs

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
$title= $_POST['post_title'];
$contentx= $_POST['post_desc'];
$contentx2 = str_replace('*', ' ', $contentx);
//$content = trim($contentx2);
$medium_status= $_POST['medium_status'];
$medium_api_token= $_POST['medium_api_token'];


if($title ==''){
echo "<div  style='background:red;color:white;padding:10px;border:none;' class='alerts_medium' >Post Title Cannot be Empty</div><br>";
exit();
}

if($contentx == ''){
echo "<div style='background:red;color:white;padding:10px;border:none;' class='alerts_medium'>Post Content Cannot be Empty</div><br>";
exit();
}

if($medium_api_token == ''){
echo "<div style='background:red;color:white;padding:10px;border:none;' class='alerts_medium'>Medium API TOKEN Cannot be Empty</div><br>";
exit();
}

$url ="https://api.medium.com/v1/me";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', "Authorization: Bearer $medium_api_token"));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);


// catch error message before closing
if (curl_errno($ch)) {
$error_msg = curl_error($ch);
echo "<div style='color:white;background:red;padding:10px;' class='alerts_medium'><b>Curl Error: $error_msg</b></div>";
exit();
}
curl_close($ch);
$json = json_decode($output, true);

if($http_status==0){
echo "<div style='color:white;background:red;padding:10px;' class='alerts_medium'>There is an Issue Making API Call to API. Please Check Internet Connections</div>";
exit();
}

if($http_status==401){
echo "<div style='color:white;background:red;padding:10px;' class='alerts_medium'>The Medium accessToken is invalid, or has been revoked.</div>";
exit();
}


if($http_status==403){
echo "<div style='color:white;background:red;padding:10px;' class='alerts_medium'>Medium Forbidden. The request attempts to list publications for another user..</div>";
exit();
}


if($http_status==404){
echo "<div style='color:white;background:red;padding:10px;' class='alerts_medium'>Medium The requested resources Not Found</div>";
exit();
}



if($http_status==200){
//echo "<div style='color:white;background:green;padding:10px;'><h4> Success.</h4></div><br>";
$id = $json['data']['id'];
$username = $json['data']['username'];
}




// make post request to Medium API
$payload ='{
  "title": "'.$title.'",
  "contentFormat": "html",
  "content": "'.$contentx2.'",
  "canonicalUrl": "",
  "tags": ["Sambanova AI Post"],
  "publishStatus": "'.$medium_status.'"
}';




$url ="https://api.medium.com/v1/users/$id/posts";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', "Authorization: Bearer $medium_api_token"));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);


// catch error message before closing
if (curl_errno($ch)) {
 $error_msg = curl_error($ch);
echo "<div style='color:white;background:red;padding:10px;'  class='alerts_medium'><b>Curl Error: $error_msg</b></div>";
exit();
}

curl_close($ch);
$json = json_decode($output, true);

if($http_status==0){
echo "<div style='color:white;background:red;padding:10px;' class='alerts_medium'>There is an Issue Making API Call to API. Please Check Internet Connections</div>";
exit();
}

if($http_status==401){
echo "<div style='color:white;background:red;padding:10px;' class='alerts_medium'>The Medium accessToken is invalid, or has been revoked.</div>";
exit();
}


if($http_status==403){
echo "<div style='color:white;background:red;padding:10px;' class='alerts_medium'>Medium Forbidden 	The request attempts to list publications for another user..</div>";
exit();
}


if($http_status==404){
echo "<div style='color:white;background:red;padding:10px;' class='alerts_medium'>The Medium requested resources Not Found</div>";
exit();
}



if($http_status==201){
echo "<div style='color:white;background:green;padding:10px;'><h4> Post Successfully Sent to Medium.</h4></div><br>";
$id = $json['data']['id'];
echo "<script>alert('Data Successfully Sent to Medium. Scroll Down the Page..');</script>";
}




}
else{
echo "<div id='' style='background:red;color:white;padding:10px;border:none;'>Direct Page Access not Allowed<br></div>";
} 

?>
