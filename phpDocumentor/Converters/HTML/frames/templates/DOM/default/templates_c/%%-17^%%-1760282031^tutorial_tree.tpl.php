<?php /* Smarty version 2.6.0, created on 2004-01-04 18:16:58
         compiled from tutorial_tree.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'tutorial_tree.tpl', 1, false),array('modifier', 'strip_tags', 'tutorial_tree.tpl', 1, false),)), $this); ?>
	var <?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, "-", '_') : smarty_modifier_replace($_tmp, "-", '_')); ?>
node = new WebFXTreeItem('<?php echo ((is_array($_tmp=$this->_tpl_vars['main']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
','<?php echo $this->_tpl_vars['main']['link']; ?>
', parent_node);

<?php if ($this->_tpl_vars['haskids']): ?>
  var <?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, "-", '_') : smarty_modifier_replace($_tmp, "-", '_')); ?>
_old_parent_node = parent_node;
	parent_node = <?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, "-", '_') : smarty_modifier_replace($_tmp, "-", '_')); ?>
node;
	<?php echo $this->_tpl_vars['kids']; ?>

	parent_node = <?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, "-", '_') : smarty_modifier_replace($_tmp, "-", '_')); ?>
_old_parent_node;
<?php endif; ?>
