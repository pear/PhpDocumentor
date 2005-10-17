<?php /* Smarty version 2.6.0, created on 2004-04-09 22:16:19
         compiled from ric.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'rawurlencode', 'ric.tpl', 3, false),array('modifier', 'htmlentities', 'ric.tpl', 7, false),)), $this); ?>
<?php ob_start();  echo $this->_tpl_vars['name'];  $this->_smarty_vars['capture']['tlink'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start();  echo $this->_tpl_vars['name']; ?>
|||<?php $this->_smarty_vars['capture']['tindex'] = ob_get_contents(); ob_end_clean(); ?>
<text size="20" justification="centre"><C:rf:3<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['tlink'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
><C:index:<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['tindex'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
><?php echo $this->_tpl_vars['name']; ?>


</text>
<text size="10" justification="left">
<?php echo ((is_array($_tmp=$this->_tpl_vars['contents'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : smarty_modifier_htmlentities($_tmp)); ?>
</text>