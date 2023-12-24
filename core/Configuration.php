<?php

class Configuration
{

    private $config;

    public function __construct($configFile)
    {

        $this->config = include($configFile);

    }

    public function get($key, $default = null)
    {

        return $this->config[$key] ?? $default;

    }

    public function testLogging(){

        $logMessage = "test log entry from config class";
        error_log($logMessage, 3, 'logs/app.log');

    }

}