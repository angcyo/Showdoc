<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


// 应用入口文件

// 检测PHP环境
if (version_compare(PHP_VERSION, '5.3.0', '<')) die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG', true);

// 定义应用目录
define('APP_PATH', './Application/');

//require './test.php';
//include './test.php';

//$_GET['m'] = "home";
//$_GET['c'] = "user";
//$_GET['a'] = "checkLogin";

//$_GET['m'] = "home";
//$_GET['c'] = "user";
//$_GET['a'] = "register";

//$_GET['m'] = "home";
//$_GET['c'] = "item";
//$_GET['a'] = "index";
//
//define('A_SHOW', 'init');
//
////$_SERVER['argv'][1] = "/home/user";
////$_POST['a'] = "login";
////$_GET['a'] = "login";
////$_GET['s'] = "/home/user";
//
//// 引入ThinkPHP入口文件
//require './ThinkPHP/ThinkPHP.php';
//
//echo A_SHOW;
//echo "<br>end.....";

//header("location:./web/#/5");

// 亲^_^ 后面不需要任何代码了 就是如此简单

//use sqlite3;

//class MyDB extends SQLite3
//{
//    function __construct()
//    {
//        $this->open('.Sqlite/showdoc.db.php');
//    }
//}

//$sqlite = new SQLiteDatabase('.Sqlite/showdoc.db.php');
//$result = $db->query('SELECT bar FROM foo');
//var_dump($result->fetchArray());

//if ($db = sqlite_open('.Sqlite/showdoc.db.php', 0666, $sqliteerror)) {
////    sqlite_query($db, 'CREATE TABLE foo (bar varchar(10))');
////    sqlite_query($db, "INSERT INTO foo VALUES ('fnord')");
//    $result = sqlite_query($db, 'select bar from foo');
//    var_dump(sqlite_fetch_array($result));
//} else {
//    die($sqliteerror);
//}

$item_list = array();

$sqlite = new PDO('sqlite:Sqlite/showdoc.db.php', 'admin', 'xhg123456');
foreach ($sqlite->query('SELECT * FROM page') as $item_row) {
    //var_dump($row);
//    print $item_row['item_id'] . "\t";
//    print $row['page_title'] . "\t<br/>";

    if (isset($item_list[$item_row['item_id']])) {
        //print $item_row['item_id'] . "is exist\t";
    } else {
        foreach ($sqlite->query("SELECT * FROM item where item_id = '" . $item_row['item_id'] . "' LIMIT 1") as $item_row) {
//            print $item_row['item_name'] . "\t";
//            print  "<br/>";
            $item_list[$item_row['item_id']] = $item_row['item_name'];
        }
    }
}

include 'xhg_header.html';

foreach ($item_list as $key => $value) {
//    echo $key . "=>" . $value . "<br/>";
    echo '<a class="button" href="./web/#/' . $key . '">' . $value . '</a>';
    //echo '<br/>';
}

echo '</div></div></body></html>';

//echo "end...";