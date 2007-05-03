<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'ParserClassTests::main');
}
 
require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';

/* You must add each method-level test suite file here */
require_once 'Documentation/tests/ParserClassGetSourceLocationTests.php';

class Documentation_tests_ParserClassTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }
 
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('ParserClass Unit Test Suites');
        /* You must add each method-level test suite name here */ 
        $suite->addTestSuite('Documentation_tests_ParserClassGetSourceLocationTests');
        return $suite;
    }
}
 
if (PHPUnit_MAIN_METHOD == 'ParserClassTests::main') {
    Documentation_tests_ParserClassTests::main();
}
?>
