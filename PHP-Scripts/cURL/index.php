<?php
$url = 'https://jsonplaceholder.typicode.com/posts';

$resource = curl_init($url);
curl_setopt($resource,CURLOPT_RETURNTRANSFER,true);

$result =curl_exec($resource);
$info = curl_getinfo($resource);
$httpcode = curl_getinfo($resource, CURLINFO_HTTP_CODE); // 200 ||404 ||500 etc
echo '<pre>';
//var_dump($info);
echo '<pre>';

curl_close($resource); 
//echo $result;

//Post request

$url2 = 'https://jsonplaceholder.typicode.com/posts';
$resource2 = curl_init();
$post=  [
    "userId"=> 1,
    "title"=> "the title 101",
    "body"=> "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
];

curl_setopt_array($resource2,[
    CURLOPT_URL => $url2,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER=> ['content-type: application/json'],
    CURLOPT_POSTFIELDS => json_encode($post)
]);

$res =curl_exec($resource2);
//curl_close($resource2);
echo $res;