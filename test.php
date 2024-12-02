<?php
// Get the values of upload_max_filesize and post_max_size
/*$uploadMaxFileSize = ini_get('upload_max_filesize');
$postMaxSize = ini_get('post_max_size');

echo "upload_max_filesize = $uploadMaxFileSize<br>";
echo "post_max_size = $postMaxSize<br>" . '\n';*/


$array = ['name' => 'naoufal'];

echo !empty($array['name']['naoufal']);