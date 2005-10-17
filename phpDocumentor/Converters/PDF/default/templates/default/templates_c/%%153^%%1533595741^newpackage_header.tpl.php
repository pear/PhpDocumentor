<?php /* Smarty version 2.6.0, created on 2003-12-18 01:58:41
         compiled from newpackage_header.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'rawurlencode', 'newpackage_header.tpl', 3, false),)), $this); ?>
<newpage />
<?php if ($this->_tpl_vars['ppage']):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "packagepage.tpl", 'smarty_include_vars' => array('package' => $this->_tpl_vars['package'],'plink' => $this->_smarty_vars['capture']['plink'],'ppage' => $this->_tpl_vars['ppage'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>
<text size="26" justification="centre">Package <?php echo $this->_tpl_vars['package']; ?>
 <?php if ($this->_tpl_vars['isclass']): ?>Classes<?php else: ?>Procedural Elements<?php endif; ?><C:rf:1<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['classeslink'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
>


</text>
