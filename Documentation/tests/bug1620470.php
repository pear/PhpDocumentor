<?php
// Call phpDocumentor_setupTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "phpDocumentor_setupTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";

require_once 'phpDocumentor/Setup.inc.php';

/**
 * verify the anti-pathing security measures
 * on the various converter name pieces 
 */
class Documentation_tests_bug1620470 extends PHPUnit_Framework_TestCase {

    private $ps;
    private $CHARACTERS_ALLOWED_IN_PRIMARY = '';
    private $CHARACTERS_ALLOWED_IN_SECONDARY = '\/';
    private $CHARACTERS_ALLOWED_IN_TERTIARY = '.\/';

    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("Documentation_tests_bug1620470");
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp() {
        $GLOBALS['_phpDocumentor_install_dir'] = ".";
        $GLOBALS['_phpDocumentor_setting']['quiet'] = "true";
        $this->ps = new phpDocumentor_setup;
        $this->ps->setTitle("Unit Testing");    // this step is necessary to ensure ps->render is instantiated
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown() {
        unset($CHARACTERS_ALLOWED_IN_PRIMARY);
        unset($CHARACTERS_ALLOWED_IN_SECONDARY);
        unset($CHARACTERS_ALLOWED_IN_TERTIARY);
        unset($ps);
    }



    /** 
     * verify all existing converter names are accepted 
     */

    //     CHM, HTML, PDF, XML (called with one arg)
    public function testNormalWithOneArgPrimaryCHM() {
        $this->assertEquals("CHM",              $this->ps->cleanConverterNamePiece("CHM"));
    }
    public function testNormalWithOneArgPrimaryHTML() {
        $this->assertEquals("HTML",             $this->ps->cleanConverterNamePiece("HTML"));
    }
    public function testNormalWithOneArgPrimaryPDF() {
        $this->assertEquals("PDF",              $this->ps->cleanConverterNamePiece("PDF"));
    }
    public function testNormalWithOneArgPrimaryXML() {
        $this->assertEquals("XML",              $this->ps->cleanConverterNamePiece("XML"));
    }

    //     CHM, HTML, PDF, XML (called with two args)
    public function testNormalWithTwoArgsPrimaryCHM() {
        $this->assertEquals("CHM",              $this->ps->cleanConverterNamePiece("CHM",       $this->CHARACTERS_ALLOWED_IN_PRIMARY));
    }
    public function testNormalWithTwoArgsPrimaryHTML() {
        $this->assertEquals("HTML",             $this->ps->cleanConverterNamePiece("HTML",      $this->CHARACTERS_ALLOWED_IN_PRIMARY));
    }
    public function testNormalWithTwoArgsPrimaryPDF() {
        $this->assertEquals("PDF",              $this->ps->cleanConverterNamePiece("PDF",       $this->CHARACTERS_ALLOWED_IN_PRIMARY));
    }
    public function testNormalWithTwoArgsPrimaryXML() {
        $this->assertEquals("XML",              $this->ps->cleanConverterNamePiece("XML",       $this->CHARACTERS_ALLOWED_IN_PRIMARY));
    }

    //     frames, Smarty, default, DocBook/peardoc2
    public function testNormalSecondaryFrames() {
        $this->assertEquals("frames",           $this->ps->cleanConverterNamePiece("frames",    $this->CHARACTERS_ALLOWED_IN_SECONDARY));
    }
    public function testNormalSecondarySmarty() {
        $this->assertEquals("Smarty",           $this->ps->cleanConverterNamePiece("Smarty",    $this->CHARACTERS_ALLOWED_IN_SECONDARY));
    }
    public function testNormalSecondaryDefault() {
        $this->assertEquals("default",          $this->ps->cleanConverterNamePiece("default",   $this->CHARACTERS_ALLOWED_IN_SECONDARY));
    }
    public function testNormalSecondaryDocbookPeardoc2() {
        $this->assertEquals("DocBook/peardoc2", $this->ps->cleanConverterNamePiece("DocBook/peardoc2", $this->CHARACTERS_ALLOWED_IN_SECONDARY));
    }

    //     default, earthli, l0l33t, phpdoc.de, phphtmllib, HandS, PEAR, PHP
    public function testNormalTertiaryDefault() {
        $this->assertEquals("default",          $this->ps->cleanConverterNamePiece("default",   $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryEarthli() {
        $this->assertEquals("earthli",          $this->ps->cleanConverterNamePiece("earthli",   $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryL0l33t() {
        $this->assertEquals("l0l33t",           $this->ps->cleanConverterNamePiece("l0l33t",    $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryPhpdocde() {
        $this->assertEquals("phpdoc.de",        $this->ps->cleanConverterNamePiece("phpdoc.de", $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryPhphtmllib() {
        $this->assertEquals("phphtmllib",       $this->ps->cleanConverterNamePiece("phphtmllib",$this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryHands() {
        $this->assertEquals("HandS",            $this->ps->cleanConverterNamePiece("HandS",     $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryPear() {
        $this->assertEquals("PEAR",             $this->ps->cleanConverterNamePiece("PEAR",      $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryPhp() {
        $this->assertEquals("PHP",              $this->ps->cleanConverterNamePiece("PHP",       $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }

    //     DOM option for default, earthli, l0l33t, phpdoc.de, phphtmllib
    public function testNormalTertiaryDomDefault() {
        $this->assertEquals("DOM/default",      $this->ps->cleanConverterNamePiece("DOM/default",    $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryDomEarthli() {
        $this->assertEquals("DOM/earthli",      $this->ps->cleanConverterNamePiece("DOM/earthli",    $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryDomL0l33t() {
        $this->assertEquals("DOM/l0l33t",       $this->ps->cleanConverterNamePiece("DOM/l0l33t",     $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryDomPhpdocde() {
        $this->assertEquals("DOM/phpdoc.de",    $this->ps->cleanConverterNamePiece("DOM/phpdoc.de",  $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testNormalTertiaryDomPhphtmllib() {
        $this->assertEquals("DOM/phphtmllib",   $this->ps->cleanConverterNamePiece("DOM/phphtmllib", $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }



    /** 
     * verify no up-to-parent pathing is allowed - the resulting converter names are generally invalid
     */
    public function testPreventUpToParentPathingOnPrimaryWithOneArg() {
        $this->assertEquals("HTML",             $this->ps->cleanConverterNamePiece("../../HTML"));
    }
    public function testPreventUpToParentPathingOnPrimaryWithTwoArgs() {
        $this->assertEquals("HTML",             $this->ps->cleanConverterNamePiece("../../HTML",   $this->CHARACTERS_ALLOWED_IN_PRIMARY));
    }
    public function testPreventUpToParentPathingOnSecondary() {
        $this->assertEquals("//frames",         $this->ps->cleanConverterNamePiece("../../frames", $this->CHARACTERS_ALLOWED_IN_SECONDARY));
    }
    public function testPreventUpToParentPathingOnTertiary() {
        //    when '.' is allowed to remain, a '..' always returns false to avoid directory traversal
        $this->assertEquals(false,              $this->ps->cleanConverterNamePiece("../../default",$this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testDoNotAllowTruePathingOnPrimaryWithOneArg() {
        $this->assertEquals("varlogHTML",       $this->ps->cleanConverterNamePiece("/var/log/HTML"));
    }
    public function testDoNotAllowTruePathingOnPrimaryWithTwoArgs() {
        $this->assertEquals("varlogHTML",       $this->ps->cleanConverterNamePiece("/var/log/HTML",   $this->CHARACTERS_ALLOWED_IN_PRIMARY));
    }
    public function testDoNotAllowTruePathingOnSecondary() {
        $this->assertEquals("/var/log/frames",  $this->ps->cleanConverterNamePiece("/var/log/frames", $this->CHARACTERS_ALLOWED_IN_SECONDARY));
    }
    public function testDoNotAllowTruePathingOnTertiary() {
        $this->assertEquals("/var/log/default", $this->ps->cleanConverterNamePiece("/var/log/default",$this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }



    /**
     * extreme examples of messy input - the resulting converter names are valid
     */
    public function testExtremeExampleButValidPrimaryWithOneArg() {
        $this->assertEquals("HTML",             $this->ps->cleanConverterNamePiece("H/.T./M##L"));
    }
    public function testExtremeExampleButValidPrimaryWithTwoArgs() {
        $this->assertEquals("HTML",             $this->ps->cleanConverterNamePiece("H/.T./M##L", $this->CHARACTERS_ALLOWED_IN_PRIMARY));
    }
    public function testExtremeExampleButValidSecondary() {
        $this->assertEquals("frames",           $this->ps->cleanConverterNamePiece("....frames", $this->CHARACTERS_ALLOWED_IN_SECONDARY));
    }



    /**
     * extreme examples of messy input - the resulting converter names are invalid
     */
    public function testExtremeExampleAndInvalidSecondary() {
        $this->assertEquals("//frames",         $this->ps->cleanConverterNamePiece("..//.frames",     $this->CHARACTERS_ALLOWED_IN_SECONDARY));
    }
    public function testExtremeExampleAndInvalidTertiaryA() {
        $this->assertEquals("/./default/./",    $this->ps->cleanConverterNamePiece("/./default/.##/", $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }
    public function testExtremeExampleAndInvalidTertiaryB() {
        $this->assertEquals("//default//",      $this->ps->cleanConverterNamePiece("//default//",     $this->CHARACTERS_ALLOWED_IN_TERTIARY));
    }

}

// Call phpDocumentor_setupTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "Documentation_tests_bug1620470::main") {
    phpDocumentor_setupTest::main();
}
?>
