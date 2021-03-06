<?php
/**
 * TimeWorked Tasks controller
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
jimport('joomla.application.component.controlleradmin');

class TimeWorkedControllerTasks extends JControllerAdmin
{
	/**
	 * {@inheritdoc}
	 */
	public function getModel($name = 'task', $prefix = 'TimeWorkedModel', $config = array('ignore_request' => true))
	{
		return parent::getModel($name, $prefix, $config);
	}

}
