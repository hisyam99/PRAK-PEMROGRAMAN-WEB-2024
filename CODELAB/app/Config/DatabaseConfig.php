<?php

namespace app\Config;

class DatabaseConfig
{
    // Setting database
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $databaseName = "pemrograman_web";
    public $port = 3306;

    public function __construct()
    {
        // Optional constructor if you want to initialize something
    }
}