<?php
/**
 * Project form template
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

JHtml::_('formbehavior.chosen', 'select');

$document = JFactory::getDocument();

$document->addScript(JUri::root() . '/media/com_timeworked/scripts/switch_background.js');
$document->addScriptDeclaration("
	Joomla.submitbutton = function (task) {
		if (task == 'project.cancel' || document.formvalidator.isValid(document.id('item-form'))) {
			Joomla.submitform(task, document.getElementById('item-form'));
		}
		else {
			alert('" . $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')) . "');
		}
	}
");
?>
<?php if (!empty($this->sidebar)): ?>
<div id="j-sidebar-container" class="span2">
	<?php echo $this->sidebar; ?>
</div>
<?php endif; ?>
<div id="j-main-container" class="<?php if (!empty($this->sidebar)): ?>span10<?php endif; ?>">
    <form action="<?php echo JRoute::_('index.php'); ?>" method="post" name="adminForm" id="item-form" class="form-validate form-horizontal">
        <fieldset class="adminform">
            <legend>
                <?php echo ($this->item->id == 0 ? JText::_('JTOOLBAR_NEW') : JText::_('JTOOLBAR_EDIT')) . ' ' . JText::_('COM_TIMEWORKED_PROJECT'); ?>
            </legend>
            <?php
            foreach ($this->form->getFieldset('project_details') as $field)
            {
                $name  = $field->getAttribute('name');
                echo $this->form->getControlGroup($name);
            }
            ?>
        </fieldset>
            <fieldset id="project_users" class="adminform">
                <legend><?php echo JText::_('COM_TIMEWORKED_STAFF'); ?></legend>
                <?php if ($this->form->getValue('id') == 0): ?>
                    <div class="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo JText::_('COM_TIMEWORKED_SAVE_PROJECT_BEFORE_ASSIGNING_USERS'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->form->getValue('id') > 0): ?>
                    <?php echo $this->loadTemplate('staff'); ?>
                <?php else: ?>
            </fieldset>
            <input type="hidden" name="jform[staff_update][]" value="" />
        <?php endif; ?>

        <input type="hidden" name="option" value="com_timeworked" />
        <input type="hidden" name="task" value="project" />
        <input type="hidden" name="id" value="<?php echo $this->form->getValue('id'); ?>" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>