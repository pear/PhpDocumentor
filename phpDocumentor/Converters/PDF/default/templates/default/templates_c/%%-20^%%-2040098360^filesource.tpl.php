<?php /* Smarty version 2.6.0, created on 2003-12-18 01:58:41
         compiled from filesource.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'rawurlencode', 'filesource.tpl', 4, false),)), $this); ?>
<?php ob_start();  echo $this->_tpl_vars['name']; ?>
|||Source code<?php $this->_smarty_vars['capture']['gindex'] = ob_get_contents(); ob_end_clean(); ?>
<newpage />
<pdffunction:addDestination arg="<?php echo $this->_tpl_vars['dest']; ?>
" arg="FitH" arg=$this->y />
<text size="26" justification="centre"><C:index:<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['gindex'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
><C:rf:3source code: <?php echo $this->_tpl_vars['name']; ?>
>File Source for <?php echo $this->_tpl_vars['name']; ?>

</text>
<text size="12"><i>Documentation for this file is available at <?php echo $this->_tpl_vars['docs']; ?>
</i>

</text>
<font face="Courier" />
<text size="8"><?php echo $this->_tpl_vars['source']; ?>
</text>
<font face="Helvetica" />
