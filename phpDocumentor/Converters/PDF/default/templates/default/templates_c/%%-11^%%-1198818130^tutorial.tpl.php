<?php /* Smarty version 2.6.0, created on 2004-02-20 11:28:25
         compiled from tutorial.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'tutorial.tpl', 1, false),array('modifier', 'urlencode', 'tutorial.tpl', 5, false),array('modifier', 'rawurlencode', 'tutorial.tpl', 6, false),)), $this); ?>
<?php ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp));  $this->_smarty_vars['capture']['tlink'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start();  echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
|||<?php $this->_smarty_vars['capture']['tindex'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start(); ?>tutorial<?php echo $this->_tpl_vars['package'];  echo $this->_tpl_vars['subpackage'];  echo $this->_tpl_vars['element']->name;  $this->_smarty_vars['capture']['dest'] = ob_get_contents(); ob_end_clean(); ?>
<newpage />
<pdffunction:addDestination arg="<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['dest'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
" arg="FitH" arg=$this->y />
<text size="26" justification="centre"><?php echo $this->_tpl_vars['title']; ?>
<C:rf:<?php if ($this->_tpl_vars['hasparent']): ?>3<?php elseif ($this->_tpl_vars['child']): ?>2<?php else: ?>1<?php endif;  echo ((is_array($_tmp=$this->_smarty_vars['capture']['tlink'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
><C:index:<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['tindex'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
>
</text><?php echo $this->_tpl_vars['contents']; ?>