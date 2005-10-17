<?php /* Smarty version 2.6.0, created on 2004-01-18 23:01:11
         compiled from toc.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'assign', 'toc.tpl', 6, false),)), $this); ?>
<pdffunction:ezStopPageNumbers arg="1" arg="1" />
<pdffunction:ezInsertMode arg="1" arg="1" arg="after" />
<newpage />
<text size="26" justification="centre">Contents
</text>
<?php echo smarty_function_assign(array('var' => 'xpos','value' => '520'), $this);?>

<?php if (count($_from = (array)$this->_tpl_vars['contents'])):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
<?php if ($this->_tpl_vars['v'][2] == '1'): ?>
<text size="16" aright="<?php echo $this->_tpl_vars['xpos']; ?>
"><c:ilink:toc<?php echo $this->_tpl_vars['k']; ?>
><?php echo $this->_tpl_vars['v'][0]; ?>
</c:ilink><C:dots:3<?php echo $this->_tpl_vars['v'][1]; ?>
></text>
<?php elseif ($this->_tpl_vars['v'][2] == '2'): ?>
<text size="12" aright="<?php echo $this->_tpl_vars['xpos']; ?>
" left="30"><c:ilink:toc<?php echo $this->_tpl_vars['k']; ?>
><?php echo $this->_tpl_vars['v'][0]; ?>
</c:ilink><C:dots:3<?php echo $this->_tpl_vars['v'][1]; ?>
></text>
<?php elseif ($this->_tpl_vars['v'][2] == '3'): ?>
<text size="12" aright="<?php echo $this->_tpl_vars['xpos']; ?>
" left="40"><c:ilink:toc<?php echo $this->_tpl_vars['k']; ?>
><?php echo $this->_tpl_vars['v'][0]; ?>
</c:ilink><C:dots:3<?php echo $this->_tpl_vars['v'][1]; ?>
></text>
<?php endif; ?>
<?php endforeach; unset($_from); endif; ?>
