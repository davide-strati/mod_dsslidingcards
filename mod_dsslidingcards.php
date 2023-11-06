<?php
/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\Module\DsSlidingCards\Site\Helper\DsSlidingCardsHelper;

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->registerAndUseStyle('mod_dsslidingcards', 'modules/mod_dsslidingcards/tmpl/mod_dsslidingcards.css');

// Get data from the model
$cardsData = DsSlidingCardsHelper::getCardsData($params);
$intro = DsSlidingCardsHelper::getIntro($params);

if ($params->def('prepare_content', 1)) {
    PluginHelper::importPlugin('content');
    $module->content = HTMLHelper::_('content.prepare', $module->content, '', 'mod_custom.content');
}


require ModuleHelper::getLayoutPath('mod_dsslidingcards', $params->get('layout', 'default'));
