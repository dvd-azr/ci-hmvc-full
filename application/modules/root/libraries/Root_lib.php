<?php

class Root_lib
{
    public function __construct()
    {
        $CI = &get_instance();

        // Load config file from Libraries
        $CI->config->load('config', TRUE);

        // echo "<br> root lib loaded <br>";
        // $this->test();

    }

    function init()
    {
        // var_dump($this->config->item('config_module', 'tes'));
        return $this->locate(__FILE__);
    }

    function locate($file)
    {
        return  explode(FCPATH, $file)[1];
    }
}