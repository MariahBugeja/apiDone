<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT',DS.'Applications'.DS.'MAMP'.DS.'htdocs'.DS.'api1/api');
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core');

require_once(INC_PATH.DS.'config.php');
require_once(CORE_PATH.DS.'Customer.php');
require_once(CORE_PATH.DS.'recipes.php');
require_once(CORE_PATH.DS.'food.php');

