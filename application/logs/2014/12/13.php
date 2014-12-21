<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-13 11:54:03 --- EMERGENCY: ErrorException [ 1 ]: Class 'url' not found ~ APPPATH/views/layout.php [ 8 ] in file:line
2014-12-13 11:54:03 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-13 11:55:38 --- EMERGENCY: ErrorException [ 1 ]: Class 'url' not found ~ APPPATH/views/layout.php [ 8 ] in file:line
2014-12-13 11:55:38 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-13 11:56:12 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: story_name ~ APPPATH/views/layout.php [ 23 ] in /var/www/html/mystory/application/views/layout.php:23
2014-12-13 11:56:12 --- DEBUG: #0 /var/www/html/mystory/application/views/layout.php(23): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/m...', 23, Array)
#1 /var/www/html/mystory/system/classes/Kohana/View.php(61): include('/var/www/html/m...')
#2 /var/www/html/mystory/system/classes/Kohana/View.php(348): Kohana_View::capture('/var/www/html/m...', Array)
#3 /var/www/html/mystory/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /var/www/html/mystory/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Story))
#7 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#10 {main} in /var/www/html/mystory/application/views/layout.php:23
2014-12-13 11:57:55 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: timeline ~ APPPATH/views/layout.php [ 45 ] in /var/www/html/mystory/application/views/layout.php:45
2014-12-13 11:57:55 --- DEBUG: #0 /var/www/html/mystory/application/views/layout.php(45): Kohana_Core::error_handler(8, 'Undefined varia...', '/var/www/html/m...', 45, Array)
#1 /var/www/html/mystory/system/classes/Kohana/View.php(61): include('/var/www/html/m...')
#2 /var/www/html/mystory/system/classes/Kohana/View.php(348): Kohana_View::capture('/var/www/html/m...', Array)
#3 /var/www/html/mystory/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /var/www/html/mystory/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Story))
#7 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#10 {main} in /var/www/html/mystory/application/views/layout.php:45
2014-12-13 12:22:16 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Kohana::config() ~ APPPATH/classes/Controller/Story.php [ 10 ] in file:line
2014-12-13 12:22:16 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-13 12:23:21 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Kohana::config() ~ APPPATH/classes/Controller/Story.php [ 11 ] in file:line
2014-12-13 12:23:21 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-13 12:23:31 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Kohana::config() ~ APPPATH/classes/Controller/Story.php [ 16 ] in file:line
2014-12-13 12:23:31 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-13 12:23:43 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Kohana::Config() ~ APPPATH/classes/Controller/Story.php [ 11 ] in file:line
2014-12-13 12:23:43 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-13 12:33:21 --- EMERGENCY: View_Exception [ 0 ]: The requested view common/error could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /var/www/html/mystory/system/classes/Kohana/View.php:137
2014-12-13 12:33:21 --- DEBUG: #0 /var/www/html/mystory/system/classes/Kohana/View.php(137): Kohana_View->set_filename('common/error')
#1 /var/www/html/mystory/system/classes/Kohana/View.php(30): Kohana_View->__construct('common/error', NULL)
#2 /var/www/html/mystory/application/classes/Controller/Story.php(42): Kohana_View::factory('common/error')
#3 /var/www/html/mystory/system/classes/Kohana/Controller.php(84): Controller_Story->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Story))
#6 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#9 {main} in /var/www/html/mystory/system/classes/Kohana/View.php:137
2014-12-13 12:33:49 --- EMERGENCY: View_Exception [ 0 ]: The requested view common/error could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /var/www/html/mystory/system/classes/Kohana/View.php:137
2014-12-13 12:33:49 --- DEBUG: #0 /var/www/html/mystory/system/classes/Kohana/View.php(137): Kohana_View->set_filename('common/error')
#1 /var/www/html/mystory/system/classes/Kohana/View.php(30): Kohana_View->__construct('common/error', NULL)
#2 /var/www/html/mystory/application/classes/Controller/Story.php(42): Kohana_View::factory('common/error')
#3 /var/www/html/mystory/system/classes/Kohana/Controller.php(84): Controller_Story->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Story))
#6 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#9 {main} in /var/www/html/mystory/system/classes/Kohana/View.php:137
2014-12-13 12:34:18 --- EMERGENCY: View_Exception [ 0 ]: The requested view kohana/404 could not be found ~ SYSPATH/classes/Kohana/View.php [ 257 ] in /var/www/html/mystory/system/classes/Kohana/View.php:137
2014-12-13 12:34:18 --- DEBUG: #0 /var/www/html/mystory/system/classes/Kohana/View.php(137): Kohana_View->set_filename('kohana/404')
#1 /var/www/html/mystory/system/classes/Kohana/View.php(30): Kohana_View->__construct('kohana/404', NULL)
#2 /var/www/html/mystory/application/classes/Controller/Story.php(44): Kohana_View::factory('kohana/404')
#3 /var/www/html/mystory/system/classes/Kohana/Controller.php(84): Controller_Story->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Story))
#6 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#8 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#9 {main} in /var/www/html/mystory/system/classes/Kohana/View.php:137
2014-12-13 12:34:41 --- EMERGENCY: ErrorException [ 1 ]: Call to undefined method Request::send_headers() ~ APPPATH/classes/Controller/Story.php [ 42 ] in file:line
2014-12-13 12:34:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-13 12:36:09 --- EMERGENCY: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/views/layout.php [ 32 ] in /var/www/html/mystory/application/views/layout.php:32
2014-12-13 12:36:09 --- DEBUG: #0 /var/www/html/mystory/application/views/layout.php(32): Kohana_Core::error_handler(8, 'Trying to get p...', '/var/www/html/m...', 32, Array)
#1 /var/www/html/mystory/system/classes/Kohana/View.php(61): include('/var/www/html/m...')
#2 /var/www/html/mystory/system/classes/Kohana/View.php(348): Kohana_View::capture('/var/www/html/m...', Array)
#3 /var/www/html/mystory/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /var/www/html/mystory/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Story))
#7 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#10 {main} in /var/www/html/mystory/application/views/layout.php:32