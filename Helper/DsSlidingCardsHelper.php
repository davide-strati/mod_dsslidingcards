<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_foo
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\DsSlidingCards\Site\Helper;

// No direct access to this file
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;

class DsSlidingCardsHelper
{
    public static function getIntro($params)
    {
        $intro = '';
        $intro = $params->get('intro');
        return $intro;
    }
    public static function getCardsData($params)
    {
        $cardElementsObj = $params->get('cardElements');
        $cardsData = [];

        foreach ($cardElementsObj as $cardElements) {
            $iconUrl = $iconWidth = $iconHeight = $buttonLink = $buttonStyled = '';
            $icon = isset($cardElements->cardIcon) ? self::cleanImage($cardElements->cardIcon) : null;

            if ($icon) {
                $iconUrl = $icon->url;
                $iconWidth = $icon->attributes["width"];
                $iconHeight = $icon->attributes["height"];
            }

            $showRetro = $cardElements->showRetro;
            if ($showRetro == 1) {
                // Include button-related data
                $retroContent = $cardElements->retroContent;
            } else {
                $retroContent = '';
            }

            $showButton = $cardElements->showButton;
            if ($showButton == 1) {
                // Include button-related data
                $buttonStyle = $cardElements->buttonStyle;
                $buttonLink = $cardElements->buttonURL;
            } else {
                $buttonStyle = '';
                $buttonLink = '';
            }

            $target = $cardElements->buttonTarget;
            if ($target == 0) {
                $buttonTarget = '_self';
            } else {
                $buttonTarget = '_blank';
            }


            $cardsData[] = [
                'iconUrl' => $iconUrl,
                'iconWidth' => $iconWidth,
                'iconHeight' => $iconHeight,
                'alttext' => $cardElements->alttext,
                'cardTitle' => $cardElements->cardTitle,
                'cardContent' => $cardElements->cardContent,
                'showRetro' => $cardElements->showRetro,
                'retroContent' => $cardElements->retroContent,
                'showButton' => $cardElements->showButton,
                'buttonLink' => $buttonLink,
                'buttonStyle' => $cardElements->buttonStyle,
                'buttonText' => $cardElements->buttonText,
                'buttonTarget' => $buttonTarget,
            ];
        }

        return $cardsData;
    }

    public static function cleanImage($image)
    {
        $cleanedImage = HTMLHelper::cleanImageURL($image);
        return $cleanedImage;
    }
}
