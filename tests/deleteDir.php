<?php
include_once 'load.php';
$dir = "temp/creating/dir_to_delete_later";
echo "Delete directory $dir \n";

$status = $src->delete($dir);

if($status) echo "Dir ".__DIR__."/$dir has been deleted successfully";
else echo "Can't delete the dir ".__DIR__."/$dir";

