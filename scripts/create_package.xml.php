<?php
set_time_limit(0);
require_once('PEAR/PackageFileManager.php');
require_once('PEAR/PackageFileManager2.php');
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$packagedir = dirname(dirname(__FILE__));
$notes = '
Includes these PEAR items:
Req #10670: Don&apos;t Die on Empty Tag Descriptions
Bug #10864: PhpDocumentor dies when parsing illegal page-level docblock
Bug #10870: Dead links generated with HTML:Smarty:PHP
Bug #10871: Wrong rendering of inline {@internal}}
Bug #10910: DOM templates create incorrect trees
Bug #11409: PHP Notices accompany Global Never Found errors
Doc #10675: Clear some errors.html items
Doc #10730: Replace Sourceforge Trackers with PEAR
Doc #10914: Can&apos;t use nested tags inside &lt;kbd&gt; or &lt;samp&gt;
Doc #10972: @method does not work
Doc #11032: param type1|type2 not documented
Doc #11143: Provide a Minimal Tutorial File Setup Example

Includes these Sourceforge items:
- [1733938] regression: &quot;-&quot; not allowed anymore in converter (file)name
- [1733936] &quot;phpdoc&quot; does not return with error code &quot;0&quot; on success
- [1733345] inline @link tag renders wrong way
- [1724990] @static tag example
- [1724884] object return parameter value
- [1722096] DocBlock template example does not work
- [1720764] documentation update needed
- [1672589] missing elements, bad links with HTML:Smarty:HandS
- [1647423] memory_limit: bad if-clause
- [1634153] require/include with concatenated file name
- [1632496] {@internal}} becomes wrong on documentation
- [1622538] List undocumented classes/functions
- [1602988] Added --ignore-symlinks option
- [1588942] Allow memory_limit setting in phpdoc.ini
- [1588936] Show INI Path at Startup
- [1585840] Refactored RETURNs #3
- [1574047] Refactored RETURNs #2
- [1574043] Refactored RETURNs #1
- [1543289] Apply ignore patterns to subdir of dir, instead of full path
- [1543287] Use predefined PHP env var in phpdoc script
- [1540666] patch for @property, @property-read and @property-write tags
- [1124133] &lt;code&gt; and @include....
- [1044752] List undocumented classes/functions

';
$version = '1.4.0';
$release_stability = 'stable';
$api = '1.4.0';
$api_stability = 'stable';
$options = array(
'baseinstalldir' => 'PhpDocumentor',
'version' => $version,
'packagedirectory' => $packagedir,
'filelistgenerator' => 'cvs',
'notes' => $notes,
'package' => 'PhpDocumentor',
'dir_roles' => array(
    'Documentation' => 'doc',
    'Documentation/tests' => 'test',
    'docbuilder' => 'data',
    'HTML_TreeMenu-1.1.2' => 'data',
    'tutorials' => 'doc',
    ),
'simpleoutput' => true,
'exceptions' =>
    array(
        'index.html' => 'data',
        'README' => 'doc',
        'ChangeLog' => 'doc',
        'LICENSE' => 'doc',
        'poweredbyphpdoc.gif' => 'data',
        'INSTALL' => 'doc',
        'FAQ' => 'doc',
        'Authors' => 'doc',
        'Release-1.2.0beta1' => 'doc',
        'Release-1.2.0beta2' => 'doc',
        'Release-1.2.0beta3' => 'doc',
        'Release-1.2.0rc1' => 'doc',
        'Release-1.2.0rc2' => 'doc',
        'Release-1.2.0' => 'doc',
        'Release-1.2.1' => 'doc',
        'Release-1.2.2' => 'doc',
        'Release-1.2.3' => 'doc',
        'Release-1.2.3.1' => 'doc',
        'Release-1.3.0' => 'doc',
        'Release-1.3.1' => 'doc',
        'Release-1.3.2' => 'doc',
        'Release-1.4.0alpha1' => 'doc',
        'Release-1.4.0alpha2' => 'doc',
        'Release-1.4.0rc1' => 'doc',
        'Release-1.4.0rc2' => 'doc',
        'Release-1.4.0' => 'doc',
        'pear-phpdoc' => 'script',
        'pear-phpdoc.bat' => 'script',
        'HTML_TreeMenu-1.1.2/TreeMenu.php' => 'php',
        'phpDocumentor/Smarty-2.6.0/libs/debug.tpl' => 'php',
        'new_phpdoc.php' => 'data',
        'phpdoc.php' => 'data',
        ),
'ignore' =>
    array('package.xml',
          'package2.xml',
          '*templates/PEAR/*',
          'publicweb-PEAR-1.2.1.patch.txt',
          ),
'installexceptions' => array('pear-phpdoc' => '/', 'pear-phpdoc.bat' => '/', 'scripts/makedoc.sh' => '/'),
);
$pfm2 = PEAR_PackageFileManager2::importOptions(dirname(dirname(__FILE__))
    . DIRECTORY_SEPARATOR . 'package.xml', array_merge($options, array('packagefile' => 'package.xml')));
$pfm2->setReleaseVersion($version);
$pfm2->setReleaseStability($release_stability);
$pfm2->setAPIVersion($api);
$pfm2->setAPIStability($api_stability);
$pfm2->setLicense('LGPL', 'http://www.opensource.org/licenses/lgpl-license.php');
$pfm2->setNotes($notes);
$pfm2->clearDeps();
$pfm2->setPhpDep('4.2.0');
$pfm2->setPearinstallerDep('1.4.6');
$pfm2->addPackageDepWithChannel('optional', 'XML_Beautifier', 'pear.php.net', '1.1');
$pfm2->addReplacement('pear-phpdoc', 'pear-config', '@PHP-BIN@', 'php_bin');
$pfm2->addReplacement('pear-phpdoc.bat', 'pear-config', '@PHP-BIN@', 'php_bin');
$pfm2->addReplacement('pear-phpdoc.bat', 'pear-config', '@BIN-DIR@', 'bin_dir');
$pfm2->addReplacement('pear-phpdoc.bat', 'pear-config', '@PEAR-DIR@', 'php_dir');
$pfm2->addReplacement('pear-phpdoc.bat', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('README', 'package-info', '@VER@', 'version');
$pfm2->addReplacement('README', 'package-info', '@STABILITY@', 'state');
$pfm2->addReplacement('docbuilder/includes/utilities.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/builder.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/file_dialog.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/file_dialog.php', 'pear-config', '@WEB-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/actions.php', 'pear-config', '@WEB-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/top.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/config.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('docbuilder/config.php', 'pear-config', '@WEB-DIR@', 'data_dir');
$pfm2->addReplacement('phpDocumentor/Setup.inc.php', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('phpDocumentor/Converter.inc', 'pear-config', '@DATA-DIR@', 'data_dir');
$pfm2->addReplacement('phpDocumentor/Classes.inc', 'package-info', '@VER@', 'version');
$pfm2->addReplacement('phpDocumentor/Errors.inc', 'package-info', '@VER@', 'version');
$pfm2->addReplacement('phpDocumentor/EventStack.inc', 'package-info', '@VER@', 'version');
$pfm2->addReplacement('phpDocumentor/common.inc.php', 'package-info', '@VER@', 'version');
$pfm2->addReplacement('phpDocumentor/common.inc.php', 'pear-config', '@PEAR-DIR@', 'php_dir');
$pfm2->addReplacement('phpDocumentor/IntermediateParser.inc', 'package-info', '@VER@', 'version');
$pfm2->addReplacement('phpDocumentor/IntermediateParser.inc', 'pear-config', '@PEAR-DIR@', 'php_dir');
$pfm2->addReplacement('phpDocumentor/Publisher.inc', 'package-info', '@VER@', 'version');
$pfm2->addReplacement('user/pear-makedocs.ini', 'pear-config', '@PEAR-DIR@', 'php_dir');
$pfm2->addReplacement('user/pear-makedocs.ini', 'pear-config', '@DOC-DIR@', 'doc_dir');
$pfm2->addReplacement('user/pear-makedocs.ini', 'package-info', '@VER@', 'version');
$pfm2->addRole('inc', 'php');
$pfm2->addRole('sh', 'script');
$pfm2->addUnixEol('pear-phpdoc');
$pfm2->addUnixEol('phpdoc');
$pfm2->addWindowsEol('pear-phpdoc.bat');
$pfm2->addWindowsEol('phpdoc.bat');
$pfm2->generateContents();
$pfm2->setPackageType('php');
$pfm2->addRelease();
$pfm2->setOsInstallCondition('windows');
// these next two files are only used if the archive is extracted as-is
// without installing via "pear install blah"
$pfm2->addIgnoreToRelease("phpdoc");
$pfm2->addIgnoreToRelease('phpdoc.bat');
$pfm2->addIgnoreToRelease('user/makedocs.ini');
$pfm2->addIgnoreToRelease('scripts/makedoc.sh');
$pfm2->addInstallAs('pear-phpdoc', 'phpdoc');
$pfm2->addInstallAs('pear-phpdoc.bat', 'phpdoc.bat');
$pfm2->addInstallAs('user/pear-makedocs.ini', 'user/makedocs.ini');
$pfm2->addRelease();
// these next two files are only used if the archive is extracted as-is
// without installing via "pear install blah"
$pfm2->addIgnoreToRelease("phpdoc");
$pfm2->addIgnoreToRelease('phpdoc.bat');
$pfm2->addIgnoreToRelease('user/makedocs.ini');
$pfm2->addIgnoreToRelease('pear-phpdoc.bat');
$pfm2->addInstallAs('pear-phpdoc', 'phpdoc');
$pfm2->addInstallAs('user/pear-makedocs.ini', 'user/makedocs.ini');
if (isset($_GET['make']) || (isset($_SERVER['argv'][1]) && $_SERVER['argv'][1] == 'make')) {
    $pfm2->writePackageFile();
} else {
    $pfm2->debugPackageFile();
}
if (!isset($_GET['make']) && !(isset($_SERVER['argv'][1]) && $_SERVER['argv'][1] == 'make')) {
    echo '<a href="' . $_SERVER['PHP_SELF'] . '?make=1">Make this file</a>';
}
?>
