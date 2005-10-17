<?php /* Smarty version 2.6.0, created on 2004-01-04 17:52:55
         compiled from tutorial_tree.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'tutorial_tree.tpl', 1, false),)), $this); ?>
  var <?php echo $this->_tpl_vars['name']; ?>
tree = new WebFXTree<?php if ($this->_tpl_vars['subtree']): ?>Item<?php endif; ?>('<?php echo ((is_array($_tmp=$this->_tpl_vars['main']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
','<?php echo $this->_tpl_vars['main']['link']; ?>
');
<?php if (! $this->_tpl_vars['subtree']): ?>  <?php echo $this->_tpl_vars['name']; ?>
tree.setBehavior('classic');
<?php endif; ?>  <?php echo $this->_tpl_vars['name']; ?>
tree.openIcon = 'media/images/msgInformation.gif';
  <?php echo $this->_tpl_vars['name']; ?>
tree.icon = 'media/images/<?php if ($this->_tpl_vars['subtree']): ?>msgInformation.gif<?php else: ?>FolderClosed.gif<?php endif; ?>';
<?php if ($this->_tpl_vars['kids']): ?>
<?php echo $this->_tpl_vars['kids']; ?>


<?php endif;  if ($this->_tpl_vars['subtree']): ?>  <?php echo $this->_tpl_vars['parent']; ?>
tree.add(<?php echo $this->_tpl_vars['name']; ?>
tree);
<?php else: ?>
  document.write(<?php echo $this->_tpl_vars['name']; ?>
tree);
<?php endif; ?>


