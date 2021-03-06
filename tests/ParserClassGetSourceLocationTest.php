<?php
/**
 * Unit Tests for the ParserClass->getSourceLocation() method
 * @package tests
 * @subpackage PhpDocumentorUnitTests
 * @author Chuck Burgess
 * @since 1.4.0a1
 * @todo research possibility of refactoring
 *       ParserClass->getSourceLocation() and
 *       ParserPage->getSourceLocation()
 *       into a common method...
 *       also, there might be more occurrences
 *       of similar getSourceLocation() methods
 *       in other classes.
 */

/**
 * Obtain the helper file.
 */
require_once dirname(__FILE__) . '/helper.inc';

/**
 * Unit Testing of the ParserClass's getSourceLocation() method
 * @package tests
 * @subpackage PhpDocumentorUnitTests
 * @author Chuck Burgess
 * @since 1.4.0a1
 */
class ParserClassGetSourceLocationTest extends PHPUnit_Framework_TestCase {

    /**
     * @var phpDocumentor_setup
     * @access private
     * @since 1.4.0a1
     */
    private $ps;
    /**
     * @var parserClass
     * @access private
     * @since 1.4.0a1
     */
    private $pc;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     * @access protected
     * @since 1.4.0a1
     */
    protected function setUp() {
        $GLOBALS['_phpDocumentor_install_dir'] = PHPDOCUMENTOR_BASE;
        $GLOBALS['_phpDocumentor_setting']['quiet'] = "true";
        $this->ps = new phpDocumentor_setup;
        $this->ps->setTitle("Unit Testing");    // this step is necessary to ensure ps->render is instantiated

        $this->pc = new parserClass;
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     * @access protected
     * @since 1.4.0a1
     */
    protected function tearDown() {
        unset($this->pc);
        unset($this->ps);
    }


    /**
     * NOW LIST THE TEST CASES -------------------------------------------------------|
     */

    /**
     * normal, expected cases ------------------------------------------|
     */

    /**
     * demonstrate the correct behavior -----------------------|
     */

    /**
     * Shows correct behavior when
     * sourceLocation is not set yet
     * with no pearize value set
     * @since 1.4.0a1
     */
    public function testWhenLocationNotSetAndPearizeNull() {
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), false);
    }
    /**
     * Shows correct behavior when
     * sourceLocation is not set yet
     * with pearize explicitly false
     * @since 1.4.0a1
     */
    public function testWhenLocationNotSetAndPearizeFalse() {
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), false);
    }
    /**
     * Shows correct behavior when
     * sourceLocation is not set yet
     * with pearize explicitly true
     * @since 1.4.0a1
     */
    public function testWhenLocationNotSetAndPearizeTrue() {
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), false);
    }

    /**
     * Shows correct behavior when
     * sourceLocation is set to an absolute path that is not a "pear" location,
     * with no pearize value set
     * @since 1.4.0a1
     */
    public function testWhenNonPearLocationSetAndPearizeNull() {
        $this->pc->setSourceLocation('/where/on/earth/are/we');
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), '/where/on/earth/are/we');
    }
    /**
     * Shows correct behavior when
     * sourceLocation is set to an absolute path that is not a "pear" location,
     * with pearize explicitly false
     * @since 1.4.0a1
     */
    public function testWhenNonPearLocationSetAndPearizeFalse() {
        $this->pc->setSourceLocation('/where/on/earth/are/we');
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), '/where/on/earth/are/we');
    }
    /**
     * Shows correct behavior when
     * sourceLocation is set to an absolute path that is not a "pear" location,
     * with pearize explicitly true
     * @since 1.4.0a1
     */
    public function testWhenNonPearLocationSetAndPearizeTrue() {
        $this->pc->setSourceLocation('/where/on/earth/are/we');
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), '/where/on/earth/are/we');
    }

    /**
     * Show correct behavior when
     * sourceLocation is set to an absolute path that IS a "pear" location,
     * with pearize not set
     * @since 1.4.0a1
     */
    public function testWhenPearLocationSetAndPearizeNull() {
        $this->pc->sourceLocation = '/outside/pear/inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), '/outside/pear/inside');
    }
    /**
     * Show correct behavior when
     * sourceLocation is set to an absolute path that IS a "pear" location,
     * with pearize explicitly false
     * @since 1.4.0a1
     */
    public function testWhenPearLocationSetAndPearizeFalse() {
        $this->pc->sourceLocation = '/outside/pear/inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), '/outside/pear/inside');
    }
    /**
     * Show correct behavior when
     * sourceLocation is set to an absolute path that IS a "pear" location,
     * with pearize explicitly true
     * @since 1.4.0a1
     */
    public function testWhenPearLocationSetAndPearizeTrue() {
        $this->pc->sourceLocation = '/outside/pear/inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), 'inside');
    }

    /**
     * Include a ".." in an absolute, non-PEAR path,
     * with pearize not set
     * @since 1.4.0a1
     */
    public function testWhenNonPearLocationSetIncludingDotsAndPearizeNull() {
        $this->pc->sourceLocation = '/outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), '/outside/plum/inside/../inside');
    }
    /**
     * Include a ".." in an absolute, non-PEAR path,
     * with pearize explicitly false
     * @since 1.4.0a1
     */
    public function testWhenNonPearLocationSetIncludingDotsAndPearizeFalse() {
        $this->pc->sourceLocation = '/outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), '/outside/plum/inside/../inside');
    }
    /**
     * Include a ".." in an absolute, non-PEAR path,
     * with pearize explicitly true
     * @since 1.4.0a1
     */
    public function testWhenNonPearLocationSetIncludingDotsAndPearizeTrue() {
        $this->pc->sourceLocation = '/outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), '/outside/plum/inside/../inside');
    }

    /**
     * Include a ".." in a relative, non-PEAR path,
     * with pearize not set
     * @since 1.4.0a1
     */
    public function testWhenNonPearRelativeLocationSetAndPearizeNull() {
        $this->pc->sourceLocation = 'outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), 'outside/plum/inside/../inside');
    }
    /**
     * Include a ".." in a relative, non-PEAR path,
     * with pearize explicitly false
     * @since 1.4.0a1
     */
    public function testWhenNonPearRelativeLocationSetAndPearizeFalse() {
        $this->pc->sourceLocation = 'outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), 'outside/plum/inside/../inside');
    }
    /**
     * Include a ".." in a relative, non-PEAR path,
     * with pearize explicitly false
     * @since 1.4.0a1
     */
    public function testWhenNonPearRelativeLocationSetAndPearizeTrue() {
        $this->pc->sourceLocation = 'outside/plum/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), 'outside/plum/inside/../inside');
    }

    /**
     * Include a ".." in an absolute, PEAR path,
     * with pearize not set
     * @since 1.4.0a1
     */
    public function testWhenPearLocationSetIncludingDotsAndPearizeNull() {
        $this->pc->sourceLocation = '/outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), '/outside/pear/inside/../inside');
    }
    /**
     * Include a ".." in an absolute, PEAR path,
     * with pearize explicitly false
     * @since 1.4.0a1
     */
    public function testWhenPearLocationSetIncludingDotsAndPearizeFalse() {
        $this->pc->sourceLocation = '/outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), '/outside/pear/inside/../inside');
    }
    /**
     * Include a ".." in an absolute, PEAR path,
     * with pearize explicitly true
     * @since 1.4.0a1
     */
    public function testWhenPearLocationSetIncludingDotsAndPearizeTrue() {
        $this->pc->sourceLocation = '/outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), 'inside/../inside');
    }

    /**
     * Include a ".." in a relative, PEAR path,
     * with pearize not set
     * @since 1.4.0a1
     */
    public function testWhenPearRelativeLocationSetAndPearizeNull() {
        $this->pc->sourceLocation = 'outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render), 'outside/pear/inside/../inside');
    }
    /**
     * Include a ".." in a relative, PEAR path,
     * with pearize explicitly false
     * @since 1.4.0a1
     */
    public function testWhenPearRelativeLocationSetAndPearizeFalse() {
        $this->pc->sourceLocation = 'outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, false), 'outside/pear/inside/../inside');
    }
    /**
     * Include a ".." in a relative, PEAR path,
     * with pearize explicitly true
     * @since 1.4.0a1
     */
    public function testWhenPearRelativeLocationSetAndPearizeTrue() {
        $this->pc->sourceLocation = 'outside/pear/inside/../inside';
        $this->assertEquals($this->pc->getSourceLocation($this->ps->render, true), 'inside/../inside');
    }

    /**
     * END OF "demonstrate the correct behavior" --------------|
     */

    /**
     * END OF "normal, expected cases" ---------------------------------|
     */


    /**
     * odd, edge cases -------------------------------------------------|
     */
    /**
     * END OF "odd, edge cases" ----------------------------------------|
     * @todo write some "edge" test cases
     */

    /**
     * END OF "NOW LIST THE TEST CASES" ----------------------------------------------|
     */

}
