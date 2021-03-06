<?php
/**
 * Projects belong to task template
 *
 * @package GiantLeapLab.TimeWorked
 * @subpackage com_timeworked
 * @version 1.3.2
 * @date January 18, 2019
 * @author Giant Leap Lab. http://www.giantleaplab.com
 * @copyright Copyright (c) 2014-2019 Giant Leap Lab
 * @license GNU/GPL v3 http://www.gnu.org/licenses/gpl-3.0.html License code: 2QFSEH59TLTKR57KWKN2TJ574BNWOT4H
 */
defined('_JEXEC') or die;
?>

<div class="control-group">
	<div class="control-label"><?php echo $this->form->getLabel('project_add'); ?></div>
	<div class="controls"><?php echo $this->form->getInput('project_add'); ?></div>
</div>
<div class="control-group">
	<div class="control-label"><?php echo $this->form->getLabel('projects_update'); ?></div>
	<div class="controls checkbox"><?php echo $this->form->getInput('projects_update'); ?></div>
</div>
