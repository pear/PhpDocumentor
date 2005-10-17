<?php /* Smarty version 2.6.0, created on 2004-04-09 22:14:54
         compiled from define.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'rawurlencode', 'define.tpl', 4, false),)), $this); ?>
<?php ob_start(); ?>Define <?php echo $this->_tpl_vars['name'];  $this->_smarty_vars['capture']['dlink'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start();  echo $this->_tpl_vars['name']; ?>
|||<?php echo $this->_tpl_vars['sdesc'];  $this->_smarty_vars['capture']['dindex'] = ob_get_contents(); ob_end_clean(); ?>
<pdffunction:addDestination arg="<?php echo $this->_tpl_vars['dest']; ?>
" arg="FitH" arg=$this->y />
<text size="10" justification="left"><?php echo $this->_tpl_vars['name']; ?>
 = <?php echo $this->_tpl_vars['value']; ?>
 <i>[line <?php if ($this->_tpl_vars['slink']):  echo $this->_tpl_vars['slink'];  else:  echo $this->_tpl_vars['linenumber'];  endif; ?>]</i><C:rf:3<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['dlink'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
><C:index:<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['dindex'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
></text>
