<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'AllTests::main');
}
 
require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

/**
 * You must add each additional class-level test suite file here
 */
require_once 'Documentation/tests/phpDocumentorSetupTests.php';
require_once 'Documentation/tests/phpDocumentorTParserTests.php';
require_once 'Documentation/tests/IntermediateParserTests.php';
require_once 'Documentation/tests/HighlightParserTests.php';
require_once 'Documentation/tests/ParserClassTests.php';
require_once 'Documentation/tests/ParserPageTests.php';
/**
 * Base directory of code being PhpDoc'd
 * 
 * Needed by some of the objects being tested in the suites
 * @since 1.4.0a2
 */
define("PHPDOCUMENTOR_BASE", '.');

class AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }
 
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PhpDocumentor Full Suite of Unit Tests');
        /**
         * You must add each additional class-level test suite name here
         */
        $suite->addTest(Documentation_tests_phpDocumentorSetupTests::suite());
        $suite->addTest(Documentation_tests_phpDocumentorTParserTests::suite());
        $suite->addTest(Documentation_tests_IntermediateParserTests::suite());
        $suite->addTest(Documentation_tests_HighlightParserTests::suite());
        $suite->addTest(Documentation_tests_ParserClassTests::suite());
        $suite->addTest(Documentation_tests_ParserPageTests::suite());
        return $suite;
    }
}
 
if (PHPUnit_MAIN_METHOD == 'AllTests::main') {
    AllTests::main();
}
?>
