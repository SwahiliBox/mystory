<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2014-12-14 01:55:01 --- EMERGENCY: Database_Exception [ 8192 ]: mysql_connect(): The mysql extension is deprecated and will be removed in the future: use mysqli or PDO instead ~ MODPATH/database/classes/Kohana/Database/MySQL.php [ 67 ] in /var/www/html/mystory/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-14 01:55:01 --- DEBUG: #0 /var/www/html/mystory/modules/database/classes/Kohana/Database/MySQL.php(171): Kohana_Database_MySQL->connect()
#1 /var/www/html/mystory/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_MySQL->query(1, 'SELECT `mys_mig...', 'Model_Migration', Array)
#2 /var/www/html/mystory/modules/orm/classes/Kohana/ORM.php(1063): Kohana_Database_Query->execute(Object(Database_MySQL))
#3 /var/www/html/mystory/modules/orm/classes/Kohana/ORM.php(1004): Kohana_ORM->_load_result(true)
#4 /var/www/html/mystory/modules/flexiblemigrations/classes/Controller/Flexiblemigrations.php(45): Kohana_ORM->find_all()
#5 /var/www/html/mystory/system/classes/Kohana/Controller.php(84): Controller_Flexiblemigrations->action_index()
#6 [internal function]: Kohana_Controller->execute()
#7 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Flexiblemigrations))
#8 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#9 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#10 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#11 {main} in /var/www/html/mystory/modules/database/classes/Kohana/Database/MySQL.php:171
2014-12-14 01:56:55 --- EMERGENCY: Database_Exception [ 42S02 ]: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'mystory.mys_migrations' doesn't exist [ SELECT mys_migration.id AS id, mys_migration.hash AS hash, mys_migration.name AS name, mys_migration.updated_at AS updated_at, mys_migration.created_at AS created_at FROM mys_migrations AS mys_migration ] ~ MODPATH/database/classes/Kohana/Database/PDO.php [ 151 ] in /var/www/html/mystory/modules/database/classes/Kohana/Database/Query.php:251
2014-12-14 01:56:55 --- DEBUG: #0 /var/www/html/mystory/modules/database/classes/Kohana/Database/Query.php(251): Kohana_Database_PDO->query(1, 'SELECT mys_migr...', 'Model_Migration', Array)
#1 /var/www/html/mystory/modules/orm/classes/Kohana/ORM.php(1063): Kohana_Database_Query->execute(Object(Database_PDO))
#2 /var/www/html/mystory/modules/orm/classes/Kohana/ORM.php(1004): Kohana_ORM->_load_result(true)
#3 /var/www/html/mystory/modules/flexiblemigrations/classes/Controller/Flexiblemigrations.php(45): Kohana_ORM->find_all()
#4 /var/www/html/mystory/system/classes/Kohana/Controller.php(84): Controller_Flexiblemigrations->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Flexiblemigrations))
#7 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#9 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#10 {main} in /var/www/html/mystory/modules/database/classes/Kohana/Database/Query.php:251
2014-12-14 23:58:41 --- EMERGENCY: ErrorException [ 1 ]: Call to a member function get() on a non-object ~ APPPATH/classes/Controller/Story.php [ 50 ] in file:line
2014-12-14 23:58:41 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line
2014-12-14 23:59:42 --- EMERGENCY: ErrorException [ 8 ]: Undefined index: stories ~ APPPATH/classes/Controller/Story.php [ 59 ] in /var/www/html/mystory/application/classes/Controller/Story.php:59
2014-12-14 23:59:42 --- DEBUG: #0 /var/www/html/mystory/application/classes/Controller/Story.php(59): Kohana_Core::error_handler(8, 'Undefined index...', '/var/www/html/m...', 59, Array)
#1 /var/www/html/mystory/system/classes/Kohana/Controller.php(84): Controller_Story->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 /var/www/html/mystory/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Story))
#4 /var/www/html/mystory/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /var/www/html/mystory/system/classes/Kohana/Request.php(986): Kohana_Request_Client->execute(Object(Request))
#6 /var/www/html/mystory/index.php(118): Kohana_Request->execute()
#7 {main} in /var/www/html/mystory/application/classes/Controller/Story.php:59