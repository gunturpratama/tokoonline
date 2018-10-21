<?php
/**
 * Created by PhpStorm.
 * User: wahyubaskara
 * Date: 10/06/18
 * Time: 18.05
 */

class DB_Setting {
    public $con;

    function __construct() {
        $this->con = mysqli_connect("localhost", "root","","db_gali");
    }

}