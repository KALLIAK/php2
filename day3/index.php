<?php

use core\DB;
use models\NewsModel;

//// Your custom class dir
define('CLASS_DIR', '');
//// Add your class dir to include path
set_include_path(__DIR__ . DIRECTORY_SEPARATOR . CLASS_DIR . PATH_SEPARATOR. get_include_path());
//// You can use this trick to make autoloader look for commonly used "My.php" type filenames
spl_autoload_extensions('.php');
//// Use default autoload implementation
spl_autoload_register();

//if(!function_exists('classAutoLoader')){
//    function classAutoLoader($class){
//        $class = strtolower($class);
//        $classFile = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
//        if(is_file($classFile) && !class_exists($class))
//            /** @noinspection PhpIncludeInspection */
//            include $classFile;
//    }
//}
//spl_autoload_register('classAutoLoader');
echo get_include_path();

$db = DB::connect();
$news = new NewsModel($db);

$newsAll = $news->getAll();
$newsOne = $news->getById(9);

var_dump($newsAll);
var_dump($newsOne);