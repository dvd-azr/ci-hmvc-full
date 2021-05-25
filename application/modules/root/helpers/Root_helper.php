<?php
function helper_init()
{
    $CI = &get_instance();
    return $CI->root_lib->locate(__FILE__);
}