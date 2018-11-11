# Directory

Create / Delete infinity child directory

Install
-------

Install `Directory` using Composer.

```
composer require codesgit/directory
```

Usage
-------
1- include library
```
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
use codesgit\directory;
```

2- Creating Dir
```
$status = (new directory(__DIR__))->create("path/to/create/directory");
```

3- Deleting Dir
```
$status = (new directory(__DIR__))->delete("path/to/delete/directory");
```

4- set the current workspace dir
```
$current_dir = "path/to/directory";
```	

```
$dir = (new directory($current_dir));
```

OR

```
$dir = (new directory());
$dir->set($current_dir);
```

License
-------

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.