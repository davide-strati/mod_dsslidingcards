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

$modId = 'mod-custom' . $module->id;
?>


<div id="<?= $modId; ?>"
	class="sliding-cards sliding-cards--servizi">
	<?php if (isset($intro)) { ?>
	<div class="intro">
		<?= $intro; ?>
	</div>
	<?php } ?>
	<div class="sliding-cards__container d-grid">
		<?php foreach ($cardsData as $cardData) :
		    $retroContent = $cardData['retroContent'];
		    ?>
		<div class="sliding-card__container">

			<div class="sliding-card__subcontainer d-flex flex-column align-items-center">
				<img src="<?= $cardData['iconUrl']; ?>"
					width="<?= $cardData['iconWidth']; ?>"
					height="<?= $cardData['iconHeight']; ?>"
					alt="<?= $cardData['alttext']; ?>"
					class="card__image" loading="lazy">
				<h5 class="sliding-card__title">
					<?= $cardData['cardTitle']; ?>
				</h5>
				<div class="sliding-card__content">
					<?= $cardData['cardContent']; ?>
				</div>
				<?php if ($retroContent != '') { ?>
				<button class="ds-btn ds-btn-primary--outline">Vedi i servizi</button>
				<?php } ?>

			</div>
			<?php if ($retroContent != '') { ?>
			<div class="retro-content__container">
				<?= $cardData['retroContent']; ?>
				<?php if ($cardData['showButton'] == 1) : ?>
				<a href="<?= $cardData['buttonLink']; ?>"
					class="sliding-card__btn btn <?= $cardData['buttonStyle']; ?>"
					target="<?= $cardData['buttonTarget'] ?>"><?= $cardData['buttonText']; ?></a>
				<?php endif; ?>
			</div>
			<?php } ?>
		</div>

		<?php endforeach; ?>
	</div>
</div>