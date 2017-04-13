<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    header('Cache-Control: no-cache, must-revalidate');

// Unregister wrappers
foreach(stream_get_wrappers() as $wp)
	stream_wrapper_unregister($wp);

// print_r(stream_get_wrappers());
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="keywords" edit="php online test php 7.0">
  <meta name="robots" edit="all">
  <title>FWHIBBIT - Test PHP code online</title>
  <meta name="copyright" content="Skander Software Solutions">
  <meta name="viewport" content="width=device-width, maximum-scale=0.5">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="css/codemirror.css">
</head>

  <script>
document.onkeyup = fkey;

function fkey(e){
       e = e || window.event;
       if (e.keyCode == 115) f.submit();
 }
  </script>
<body onload="f.submit();">
        <div id="content" style="height: 90%; ">
        <form name="f" target="view" method="POST" action="ajax.php">
          <input type="submit" value="Run (F4)">
          <fieldset class="column left">
              <div class="window bottom" id="panel_js" data-panel_type="js">
                  
                  <div style="position: relative; " class="CodeMirror-wrapping">
                      <textarea id="phpcode" name="phpcode">
&lt;?php
echo "Hello my little rabbit!";

?&gt;</textarea>
                      <span class="window_label" style="visibility: visible; zoom: 1; opacity: 0.3; ">PHP</span>
                  </div>
              </div>
              <div class="shim">
              </div>
          </fieldset>
          <div class="handler" id="handler_vertical" style="left: 674px; ">
          </div>
          <fieldset class="column right">
              <div id="result" class="window bottom">
                  <iframe class="result_output" id="view" name="view" src="ajax.php" frameborder="0"></iframe>         
                  <span class="window_label" style="visibility: visible; zoom: 1; opacity: 0.3; ">Result</span>
              </div>
              <div class="shim">
              </div>
          </fieldset>
        </form>
    </div>
        
<script src="lib/codemirror.js"></script>
<script src="lib/php.js"></script>
<script language="Javascript" type="text/javascript" src="lib/jquery-1.9.1.min.js"></script>
<style type="text/css">.CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black; height: 100%;}</style>
<script language="Javascript" type="text/javascript">
    
    var editor = CodeMirror.fromTextArea(document.getElementById("phpcode"), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "keep",
        tabMode: "shift"
      });
    
</script>
</body>
</html>