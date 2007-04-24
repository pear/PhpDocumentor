<?php
// Call ParserPageTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "ParserPageTest::main");
}

require_once "PHPUnit/Framework/TestCase.php";
require_once "PHPUnit/Framework/TestSuite.php";

require_once 'phpDocumentor/ParserData.inc';
require_once 'phpDocumentor/ParserElements.inc';
require_once 'phpDocumentor/Converter.inc';
require_once 'phpDocumentor/Setup.inc.php';

/**
 * ParserClass->getSourceLocation refactoring of RETURN statements
 */
class Documentation_tests_bug1574047 extends PHPUnit_Framework_TestCase {

    private $ps;
    private $pc;

    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main() {
        require_once "PHPUnit/TextUI/TestRunner.php";

        $suite  = new PHPUnit_Framework_TestSuite("Documentation_tests_bug1574047");
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

        $this->pc = new parserClass;
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown() {
        unset($pc);
        unset($ps);
    }


    /**
     * normal, expected cases
     */
     
    // sourceLocation not set yet
    public function testWhenLocationNotSetAndPearizeNull() {
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), false);
    }
    public function testWhenLocationNotSetAndPearizeFalse() {
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), false);
    }
    public function testWhenLocationNotSetAndPearizeTrue() {
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), false);
    }

    // absolute path, but not a PEAR location    
    public function testWhenNonPearLocationSetAndPearizeNull() {
        $this->pc->setSourceLocation('/where/on/earth/are/we');        
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), '/where/on/earth/are/we');
    }
    public function testWhenNonPearLocationSetAndPearizeFalse() {
        $this->pc->setSourceLocation('/where/on/earth/are/we');        
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), '/where/on/earth/are/we');
    }
    public function testWhenNonPearLocationSetAndPearizeTrue() {
        $this->pc->setSourceLocation('/where/on/earth/are/we');        
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), '/where/on/earth/are/we');
    }
    
    // absolute path, and IS a PEAR location
    public function testWhenPearLocationSetAndPearizeNull() {
        $this->pc->sourceLocation = '/outside/pear/inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), '/outside/pear/inside');
    }
    public function testWhenPearLocationSetAndPearizeFalse() {
        $this->pc->sourceLocation = '/outside/pear/inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), '/outside/pear/inside');
    }
    public function testWhenPearLocationSetAndPearizeTrue() {
        $this->pc->sourceLocation = '/outside/pear/inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), 'inside');
    }
    
    /**
     * odd, edge cases
     */

    // include a ".." in an absolute, non-PEAR path
    public function testWhenNonPearLocationSetIncludingDotsAndPearizeNull() {
        $this->pc->sourceLocation = '/outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), '/outside/plum/inside/../inside');
    }
    public function testWhenNonPearLocationSetIncludingDotsAndPearizeFalse() {
        $this->pc->sourceLocation = '/outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), '/outside/plum/inside/../inside');
    }
    public function testWhenNonPearLocationSetIncludingDotsAndPearizeTrue() {
        $this->pc->sourceLocation = '/outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), '/outside/plum/inside/../inside');
    }

    // include a ".." in a relative, non-PEAR path
    public function testWhenNonPearRelativeLocationSetAndPearizeNull() {
        $this->pc->sourceLocation = 'outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), 'outside/plum/inside/../inside');
    }
    public function testWhenNonPearRelativeLocationSetAndPearizeFalse() {
        $this->pc->sourceLocation = 'outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), 'outside/plum/inside/../inside');
    }
    public function testWhenNonPearRelativeLocationSetAndPearizeTrue() {
        $this->pc->sourceLocation = 'outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), 'outside/plum/inside/../inside');
    }

    // include a ".." in an absolute, PEAR path
    public function testWhenPearLocationSetIncludingDotsAndPearizeNull() {
        $this->pc->sourceLocation = '/outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), '/outside/pear/inside/../inside');
    }
    public function testWhenPearLocationSetIncludingDotsAndPearizeFalse() {
        $this->pc->sourceLocation = '/outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), '/outside/pear/inside/../inside');
    }
    public function testWhenPearLocationSetIncludingDotsAndPearizeTrue() {
        $this->pc->sourceLocation = '/outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), 'inside/../inside');
    }

    // include a ".." in a relative, PEAR path
    public function testWhenPearRelativeLocationSetAndPearizeNull() {
        $this->pc->sourceLocation = 'outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), 'outside/pear/inside/../inside');
    }
    public function testWhenPearRelativeLocationSetAndPearizeFalse() {
        $this->pc->sourceLocation = 'outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), 'outside/pear/inside/../inside');
    }
    public function testWhenPearRelativeLocationSetAndPearizeTrue() {
        $this->pc->sourceLocation = 'outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), 'inside/../inside');
    }
}

// Call ParserPageTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "Documentation_tests_bug1574047::main") {
    ParserPageTest::main();
}
?>
