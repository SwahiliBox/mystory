<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-21 00:59:20 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: story_id ~ APPPATH/views/layout.php [ 36 ] in /var/www/html/mystory/application/views/layout.php:36
2014-12-21 00:59:20 --- DEBUG: #0 /var/www/html/mystory/application/views/layout.php(36): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/m...', 36, Array)
#1 /var/www/html/mystory/system/classes/Kohana/View.php(61): include('/var/www/html/m...')
#2 /var/www/html/mystory/system/classes/Kohana/View.php(348): Kohana_View::capture('/var/www/html/m...', Array)
#3 /var/www/html/mystory/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /var/www/html/mystory/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Story))
#7 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#10 {main} in /var/www/html/mystory/application/views/layout.php:36
2014-12-21 01:00:15 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes/Controller/Story.php [ 125 ] in /var/www/html/mystory/application/classes/Controller/Story.php:125
2014-12-21 01:00:15 --- DEBUG: #0 /var/www/html/mystory/application/classes/Controller/Story.php(125): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/m...', 125, Array)
#1 /var/www/html/mystory/system/classes/Kohana/Controller.php(84): Controller_Story->action_media()
#2 [internal function]: Kohana_Controller->execute()
#3 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Story))
#4 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/html/mystory/application/classes/Controller/Story.php:125