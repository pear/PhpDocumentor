<?php

/**
 * Master Unit Test Suite file for PhpDocumentor
 * 
 * This top-level test suite file organizes 
 * all class test suite files, 
 * so that the full suite can be run 
 * by PhpUnit or via "pear run-tests -u". 
 *
 * PHP versions 4 and 5
 *
 * @category Tools and Utilities
 * @package  PhpDocumentor
 * @subpackage UnitTesting
 * @author   Chuck Burgess <ashnazg@php.net>
 * @license  http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @version  CVS: $Id$
 * @link     http://pear.php.net/PhpDocumentor
 * @since    1.4.0a2
 */


/**
 * Derive the "main" method name
 */
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'AllTests::main');
}


/*
 * Files needed by PhpUnit
 */
require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';


/*
 * You must add each additional class-level test suite file here
 */
require_once 'tests/phpDocumentorSetupTests.php';
require_once 'tests/phpDocumentorTParserTests.php';
require_once 'tests/IntermediateParserTests.php';
require_once 'tests/HighlightParserTests.php';
require_once 'tests/ParserClassTests.php';
require_once 'tests/ParserPageTests.php';


/**
 * Base directory of code being PhpDoc'd
 * 
 * Needed by some of the objects being tested in the suites
 * @since 1.4.0a2
 */
define("PHPDOCUMENTOR_BASE", '.');


/**
 * Master Unit Test Suite class for PhpDocumentor
 * 
 * This top-level test suite class organizes 
 * all class test suite files, 
 * so that the full suite can be run 
 * by PhpUnit or via "pear run-tests -u". 
 *
 * @category Tools and Utilities
 * @package  PhpDocumentor
 * @subpackage UnitTesting
 * @author   Chuck Burgess <ashnazg@php.net>
 * @license  http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @version  Release: @package_version@
 * @link     http://pear.php.net/PhpDocumentor
 * @since    1.4.0a2
 */
class AllTests
{

    /**
     * Launches the TextUI test runner
     *
     * @return void
     * @uses PHPUnit_TextUI_TestRunner
     */
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }


    /**
     * Adds all class test suites into the master suite
     *
     * @return PHPUnit_Framework_TestSuite a master test suite
     *                                     containing all class test suites
     * @uses PHPUnit_Framework_TestSuite
     */ 
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite(
            'PhpDocumentor Full Suite of Unit Tests');

        /*
         * You must add each additional class-level test suite name here
         */
        $suite->addTest(tests_phpDocumentorSetupTests::suite());
        $suite->addTest(tests_phpDocumentorTParserTests::suite());
        $suite->addTest(tests_IntermediateParserTests::suite());
        $suite->addTest(tests_HighlightParserTests::suite());
        $suite->addTest(tests_ParserClassTests::suite());
        $suite->addTest(tests_ParserPageTests::suite());
        return $suite;
    }
}

/**
 * Call the main method if this file is executed directly
 */
if (PHPUnit_MAIN_METHOD == 'AllTests::main') {
    AllTests::main();
}

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
?>
