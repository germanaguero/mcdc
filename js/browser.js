var ua = $.browser;
if ( $.browser.msie  && parseInt($.browser.version, 10) < 9 ) { //IE
  window.location="error.php";
}

if ( $.browser.opera  && parseInt($.browser.version, 10) < 10 ) { //opera
  window.location="error.php"; 
}

if ( $.browser.mozilla  && parseInt($.browser.version, 10) < 4 ) { //firefox
  window.location="error.php";
}

if ( $.browser.safari  && parseInt($.browser.version, 10) < 6 ) { //chrome
  window.location="error.php";
}

