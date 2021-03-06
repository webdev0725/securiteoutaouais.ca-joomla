<?php
/**
 * Client view
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
jimport('joomla.application.component.view');

class TimeWorkedViewClient extends JViewLegacy
{
	/**
	 * {@inheritdoc}
	 */
	public function display($tpl = null)
	{
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->user = JFactory::getUser();

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('\n', $errors));

			return false;
		}

		$this->loadHelper('TimeWorkedHelper');
		$this->canDo = TimeWorkedHelper::getActions('client');
		$this->_setToolBar();
		$this->loadHelper('TimeWorkedHelper');
		TimeWorkedHelper::setDocument();
		parent::display($tpl);
	}

	/**
	 * Method to add page title and toolbar
	 *
	 * @return  void
	 */
	protected function _setToolBar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);
		JHTML::_('behavior.tooltip');
		JHTML::_('behavior.keepalive');
		JHTML::_('behavior.formvalidation');
		$isNew = ($this->item->id == 0);
		$canDo = TimeWorkedHelper::getActions('client', $this->item->id);

		JToolBarHelper::title(JText::_('COM_TIMEWORKED') . ': ' . ($isNew ? JText::_('JTOOLBAR_NEW') : JText::_('JTOOLBAR_EDIT')) . ' ' . JText::_('COM_TIMEWORKED_CLIENT'));

		if ($isNew && (count($this->user->getAuthorisedCategories('com_timeworked', 'core.create')) > 0))
		{
			JToolBarHelper::apply('client.apply');
			JToolBarHelper::save('client.save');
			JToolBarHelper::save2new('client.save2new');
			JToolBarHelper::cancel('client.cancel');
		}
		else
		{
			if ($canDo->get('core.edit') || ($canDo->get('core.edit.own') && $this->item->created_by == $this->user->get('id')))
			{
				JToolBarHelper::apply('client.apply');
				JToolBarHelper::save('client.save');

				if ($canDo->get('core.create'))
				{
					JToolBarHelper::save2new('client.save2new');
				}
			}

			if ($canDo->get('core.create'))
			{
				JToolBarHelper::save2copy('client.save2copy');
			}

			JToolBarHelper::cancel('client.cancel');
		}
	}
}
