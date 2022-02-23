<?php
session_start();
class Db{
    private $host = "localhost"; /* Host name */
    private $user = "africde5_admin"; /* User*/
    private $password = "bb@ATC_HuB"; /* Password */
    private $dbname = "africde5_studentCourseInfo"; /* Database name, tables: courseInfo, studentLoginInfo */
    private $table = "";

    public function __constructor($table){
$this->table = $table;
}

    function dbPrepBind($sql){}
    function dbDelete($sql){}
    function dbInsert($sql){}
    function dbSelect($sql){}
    function dbUpdate($sql){}
}
?>
