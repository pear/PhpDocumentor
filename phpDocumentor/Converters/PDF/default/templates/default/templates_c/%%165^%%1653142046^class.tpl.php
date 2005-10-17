<?php /* Smarty version 2.6.0, created on 2003-12-18 01:58:41
         compiled from class.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'rawurlencode', 'class.tpl', 12, false),)), $this); ?>
<?php ob_start();  if ($this->_tpl_vars['is_interface']): ?>Interface<?php else: ?>Class<?php endif; ?> <?php echo $this->_tpl_vars['name'];  $this->_smarty_vars['capture']['clink'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start();  echo $this->_tpl_vars['name']; ?>
|||<?php echo $this->_tpl_vars['sdesc'];  $this->_smarty_vars['capture']['cindex'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>Package <?php echo $this->_tpl_vars['package']; ?>
 Classes<?php $this->_smarty_vars['capture']['classeslink'] = ob_get_contents(); ob_end_clean(); ?>
<?php if ($this->_tpl_vars['plink']):  ob_start(); ?>Package <?php echo $this->_tpl_vars['package'];  $this->_smarty_vars['capture']['plink'] = ob_get_contents(); ob_end_clean();  endif; ?>
<?php if ($this->_tpl_vars['includeheader']):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "newpackage_header.tpl", 'smarty_include_vars' => array('isclass' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>
<text size="11">



</text>
<pdffunction:addDestination arg="<?php echo $this->_tpl_vars['dest']; ?>
" arg="FitH" arg=$this->y />
<text size="20" justification="centre"><?php if ($this->_tpl_vars['is_interface']): ?>Interface<?php else: ?>Class<?php endif; ?> <?php echo $this->_tpl_vars['name']; ?>
 <i></text><text size="11" justification="centre">[line <?php if ($this->_tpl_vars['slink']):  echo $this->_tpl_vars['slink'];  else:  echo $this->_tpl_vars['linenumber'];  endif; ?>]</i><C:rf:2<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['clink'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
><C:index:<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['cindex'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
></text>
