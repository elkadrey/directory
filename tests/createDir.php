<?php
include_once 'load.php';
$dir = "temp/creating/dir_to_delete_later/anything";
echo "Creating directory $dir \n";

$status = $src->create($dir);

if($status) echo "Dir $status has been created successfully";
else echo "Can't create the dir ".__DIR__."/$dir";

