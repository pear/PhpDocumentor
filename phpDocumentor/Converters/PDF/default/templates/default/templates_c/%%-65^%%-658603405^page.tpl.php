<?php /* Smarty version 2.6.0, created on 2003-12-18 01:58:41
         compiled from page.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'rawurlencode', 'page.tpl', 7, false),)), $this); ?>
<?php ob_start();  echo $this->_tpl_vars['name'];  $this->_smarty_vars['capture']['pagelink'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start();  echo $this->_tpl_vars['name']; ?>
|||<?php echo $this->_tpl_vars['sdesc'];  $this->_smarty_vars['capture']['pageindex'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>Package <?php echo $this->_tpl_vars['package']; ?>
 Procedural Elements<?php $this->_smarty_vars['capture']['classeslink'] = ob_get_contents(); ob_end_clean(); ?>
<newpage />
<?php if ($this->_tpl_vars['includeheader']):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "newpackage_header.tpl", 'smarty_include_vars' => array('isclass' => false)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>
<pdffunction:addDestination arg="<?php echo $this->_tpl_vars['dest']; ?>
" arg="FitH" arg=$this->y />
<text size="18" justification="center"><?php echo $this->_tpl_vars['name']; ?>
<C:rf:2<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['pagelink'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
><C:index:<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['pageindex'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
></text>