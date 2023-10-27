<?php 

define('REGEX_TYPES', "/^[a-zA-Zéàù è0-9]*$/");
define('REGEX_BRAND', "/^[a-zA-Zéàùèç\- 0-9]*$/");
define('REGEX_MODEL', "/^[a-zA-Zéàçùè\- 0-9]*$/");
define('REGEX_REGISTRATION', "/^[A-Z0-9-]*$/");
define('REGEX_NAME',"^[A-Za-zéùçàêè\ \-]*$");
define('REGEX_PHONE', "^[0-9]*$");
define('REGEX_ZIPCODE',"^[0-9]{5}*$");
define('REGEX_CITY',"^[a-zA-Z0-9 éè-àûê]*$");