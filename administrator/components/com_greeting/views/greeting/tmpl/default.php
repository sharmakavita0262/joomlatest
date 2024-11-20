<?php
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

HTMLHelper::_('behavior.keepalive');
HTMLHelper::_('behavior.formvalidator');
?>

<script>
    Joomla.submitbutton = function(task) {
        if (task == 'cancel' || document.formvalidator.isValid(document.getElementById('adminForm'))) {
            Joomla.submitform(task, document.getElementById('adminForm'));
        }
    }
</script>

<form action="<?php echo Route::_('index.php?option=com_greeting&view=greeting'); ?>" name="adminForm" id="adminForm" method="post" class="form-validate form-horizontal">
    <fieldset>
        <?php foreach ($this->form->getFieldset('greeting_form') as $field) { ?>
            <div class="control-group">
                <div class="control-label">
                    <?php echo $field->label; ?>
                </div>
                <div class="controls">
                    <?php echo $field->input; ?>
                </div>
            </div>
        <?php } ?>
        <input type="hidden" name="task" />
        <?php echo HTMLHelper::_('form.token'); ?>
    </fieldset>
</form>