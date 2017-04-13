<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    header('Cache-Control: no-cache, must-revalidate');
    
    // Unregister wrappers
    foreach(stream_get_wrappers() as $wp) stream_wrapper_unregister($wp);
	
    $code=isset($_POST['phpcode'])?$_POST['phpcode']:'';
    eval(' ?>'.$code.'<?php ');