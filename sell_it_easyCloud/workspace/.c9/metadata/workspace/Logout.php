{"changed":false,"filter":false,"title":"Logout.php","tooltip":"/Logout.php","value":"<?php\nsession_start();\nsession_unset();\nunset($_SESSION['username']);\nunset($_SESSION['logged_in']);\nsession_destroy();\n//echo \"Logged out\";\nheader(\"Location:welcome.html\");\n?>","undoManager":{"mark":-1,"position":-1,"stack":[]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":0,"column":0},"end":{"row":0,"column":0},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1492469553072}