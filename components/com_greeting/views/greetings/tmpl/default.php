<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Language\Text;

// HTMLHelper::_('boostrap.tooltip');
HTMLHelper::_('behavior.multiselect');
HTMLHelper::_('formbehavior.chosen', 'select');

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));

?>
<form action="<?php echo Route::_('index.php?option=com_greeting&c=greeting');?>" method="post" name="adminForm" id="adminForm">
    <div id="j-main-container">
        
        <div id="filter-bar" class="btn-toolbar">
            <div class="filter-search btn-group pull-left">
                <input type="text" name="filter_search" id="filter_search" placeholder="Search" class="form-control" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" />
           </div>
            <div class="btn-group pull-left">
                <button type="submit" class="btn tip" title="<?php echo Text::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
                <button type="button" class="btn tip" onclick="document.getElementById('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
            </div>
        </div>
        <div class="clearfix"></div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="1%" class="nowrap center">
                        #
                    </th>
                    <th width="1%" class="nowrap center">
                       <input type="checkbox" name="checkall-toggle" value="" title="<?php echo Text::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
                    </th>
                    <th class="nowrap center" width="20%">
                        <?php echo HTMLHelper::_('grid.sort', 'Title', 'title', $listDirn, $listOrder); ?>
                    </th>
                    <th class="nowrap center">
                        <?php echo HTMLHelper::_('grid.sort', 'Message', 'message', $listDirn, $listOrder); ?>
                    </th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <td colspan="4">
                        <?php echo $this->pagination->getListFooter(); ?>
                    </td>
                </tr>
            </tfoot>
            
            <tbody>
                <?php 
                foreach ($this->items as $i => $item) {
                    // $url = Route::_('index.php?option=com_greeting&c=greeting&task=edit&cid=' . $item->id);
                    $url = Route::_('index.php?option=com_greeting&view=details&id=' . $item->id);
                    ?>
                <tr class="row<?php echo $i % 2; ?>">
                    <td class="center"><?php echo $i + 1;?></td>
                    <td class="center">
                        <?php echo HTMLHelper::_('grid.id', $i, $item->id); ?>
                    </td>
                    <td class="left">
                        <a href="<?php echo $url; ?>">
                            <?php echo $this->escape($item->title); ?>
                        </a>
                    </td>
                    <td class="center">
                        <?php echo $this->escape($item->message); ?>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        
        <input type="hidden" name="task" value="" />
        <input type="hidden" name="boxchecked" value="0" />
        <input type="hidden" name="c" value="greeting" />
        <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
        <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
        <?php echo HTMLHelper::_('form.token'); ?>
    </div>
</form>