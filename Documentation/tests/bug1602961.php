<?php
// Call phpDocumentor_setupTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "phpDocumentor_setupTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";

require_once 'phpDocumentor/Setup.inc.php';

/**
 * verify the fuzzy logic that guesses
 * the intent of boolean arg values 
 */
class Documentation_tests_bug1602961 extends PHPUnit_Framework_TestCase {

    private $ps;

    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("Documentation_tests_bug1602961");
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
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown() {
        unset($ps);
    }


    // verify all expected values are interpreted correctly
    public function testBasicOff() {
        $this->assertFalse(decideOnOrOff('off'));
    }
    public function testBasicOn() {
        $this->assertTrue(decideOnOrOff('on'));
    }
        
    /**
     * verify all the fuzzy values we know to recognize
     */
    // no
    public function testFuzzyOffA() {
        $this->assertFalse(decideOnOrOff('Off'));
    }
    public function testFuzzyOffB() {
        $this->assertFalse(decideOnOrOff('OFF'));
    }
    public function testFuzzyNoA() {
        $this->assertFalse(decideOnOrOff('no'));
    }
    public function testFuzzyNoB() {
        $this->assertFalse(decideOnOrOff('No'));
    }
    public function testFuzzyNoC() {
        $this->assertFalse(decideOnOrOff('NO'));
    }
    public function testFuzzyFalseA() {
        $this->assertFalse(decideOnOrOff('false'));
    }
    public function testFuzzyFalseB() {
        $this->assertFalse(decideOnOrOff('False'));
    }
    public function testFuzzyFalseC() {
        $this->assertFalse(decideOnOrOff('FALSE'));
    }
    public function testFuzzyZero() {
        $this->assertFalse(decideOnOrOff(0));
    }

    //   yes
    public function testFuzzyEmpty() {
        $this->assertTrue(decideOnOrOff(''));
    }
    public function testFuzzyOnA() {
        $this->assertTrue(decideOnOrOff('On'));
    }
    public function testFuzzyOnB() {
        $this->assertTrue(decideOnOrOff('ON'));
    }
    public function testFuzzyYesA() {
        $this->assertTrue(decideOnOrOff('y'));
    }
    public function testFuzzyYesB() {
        $this->assertTrue(decideOnOrOff('Y'));
    }
    public function testFuzzyYesC() {
        $this->assertTrue(decideOnOrOff('yes'));
    }
    public function testFuzzyYesD() {
        $this->assertTrue(decideOnOrOff('Yes'));
    }
    public function testFuzzyYesE() {
        $this->assertTrue(decideOnOrOff('YES'));
    }
    public function testFuzzyTrueA() {
        $this->assertTrue(decideOnOrOff('true'));
    }
    public function testFuzzyTrueB() {
        $this->assertTrue(decideOnOrOff('True'));
    }
    public function testFuzzyTrueC() {
        $this->assertTrue(decideOnOrOff('TRUE'));
    }
    public function testFuzzyOne() {
        $this->assertTrue(decideOnOrOff(1));
    }
                
    // unexpected
    public function testUnexpectedSpaces() {
        $this->assertTrue(decideOnOrOff('  '));
    }
    public function testUnexpectedNull() {
        $this->assertFalse(decideOnOrOff());
    }
    public function testUnexpectedNegative() {
        $this->assertFalse(decideOnOrOff(-1));
    }
    public function testUnexpectedLargeNumber() {
        $this->assertFalse(decideOnOrOff(10));
    }
    public function testUnexpectedGreatLiterature() {
        $this->assertFalse(decideOnOrOff("ash nazg durbatuluk"));
    }

}

// Call phpDocumentor_setupTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "Documentation_tests_bug1602961::main") {
    phpDocumentor_setupTest::main();
}
?>

 	  	 
