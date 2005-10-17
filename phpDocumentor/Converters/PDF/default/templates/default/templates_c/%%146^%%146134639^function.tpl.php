<?php /* Smarty version 2.6.0, created on 2004-04-02 22:29:40
         compiled from function.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'rawurlencode', 'function.tpl', 4, false),)), $this); ?>
<?php ob_start(); ?>Function <?php echo $this->_tpl_vars['intricatefunctioncall']['name'];  $this->_smarty_vars['capture']['flink'] = ob_get_contents(); ob_end_clean(); ?>
<?php ob_start();  echo $this->_tpl_vars['intricatefunctioncall']['name']; ?>
()|||<?php echo $this->_tpl_vars['sdesc'];  $this->_smarty_vars['capture']['findex'] = ob_get_contents(); ob_end_clean(); ?>
<pdffunction:addDestination arg="<?php echo $this->_tpl_vars['dest']; ?>
" arg="FitH" arg=$this->y />
<text size="10" justification="left"><i><?php echo $this->_tpl_vars['return']; ?>
</i> function <?php echo $this->_tpl_vars['intricatefunctioncall']['name']; ?>
(<?php if (isset($this->_sections['params'])) unset($this->_sections['params']);
$this->_sections['params']['name'] = 'params';
$this->_sections['params']['loop'] = is_array($_loop=$this->_tpl_vars['intricatefunctioncall']['params']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['params']['show'] = true;
$this->_sections['params']['max'] = $this->_sections['params']['loop'];
$this->_sections['params']['step'] = 1;
$this->_sections['params']['start'] = $this->_sections['params']['step'] > 0 ? 0 : $this->_sections['params']['loop']-1;
if ($this->_sections['params']['show']) {
    $this->_sections['params']['total'] = $this->_sections['params']['loop'];
    if ($this->_sections['params']['total'] == 0)
        $this->_sections['params']['show'] = false;
} else
    $this->_sections['params']['total'] = 0;
if ($this->_sections['params']['show']):

            for ($this->_sections['params']['index'] = $this->_sections['params']['start'], $this->_sections['params']['iteration'] = 1;
                 $this->_sections['params']['iteration'] <= $this->_sections['params']['total'];
                 $this->_sections['params']['index'] += $this->_sections['params']['step'], $this->_sections['params']['iteration']++):
$this->_sections['params']['rownum'] = $this->_sections['params']['iteration'];
$this->_sections['params']['index_prev'] = $this->_sections['params']['index'] - $this->_sections['params']['step'];
$this->_sections['params']['index_next'] = $this->_sections['params']['index'] + $this->_sections['params']['step'];
$this->_sections['params']['first']      = ($this->_sections['params']['iteration'] == 1);
$this->_sections['params']['last']       = ($this->_sections['params']['iteration'] == $this->_sections['params']['total']);
 if ($this->_sections['params']['index'] > 0): ?>, <?php endif;  if ($this->_tpl_vars['intricatefunctioncall']['params'][$this->_sections['params']['index']]['default'] != ''): ?>[<?php endif;  echo $this->_tpl_vars['intricatefunctioncall']['params'][$this->_sections['params']['index']]['name'];  if ($this->_tpl_vars['intricatefunctioncall']['params'][$this->_sections['params']['index']]['default'] != ''): ?> = <?php echo $this->_tpl_vars['intricatefunctioncall']['params'][$this->_sections['params']['index']]['default']; ?>
]<?php endif;  endfor; endif; ?>) <i>[line <?php if ($this->_tpl_vars['slink']):  echo $this->_tpl_vars['slink'];  else:  echo $this->_tpl_vars['linenumber'];  endif; ?>]</i><C:rf:3<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['flink'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
><C:index:<?php echo ((is_array($_tmp=$this->_smarty_vars['capture']['findex'])) ? $this->_run_mod_handler('rawurlencode', true, $_tmp) : smarty_modifier_rawurlencode($_tmp)); ?>
></text>
