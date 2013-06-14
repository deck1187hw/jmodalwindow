<?php

// no direct access
defined('_JEXEC') or die;

// Include the weblinks functions only once
require_once dirname(__FILE__) . '/helper.php';

//$list = modJmodalwindowHelper::getList($params);

JHTML::_('behavior.modal');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_jmodalwindow', $params->get('layout', 'default'));
