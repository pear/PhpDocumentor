<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'ParserPageTests::main');
}
 
require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
 
require_once 'Documentation/tests/ParserPageGetSourceLocationTests.php';
class Documentation_tests_ParserPageTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }
 
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('ParserPage Unit Test Suites');
        $suite->addTestSuite('Documentation_tests_ParserPageGetSourceLocationTests');
        return $suite;
    }
}
 
if (PHPUnit_MAIN_METHOD == 'ParserPageTests::main') {
    Documentation_tests_ParserPageTests::main();
}
?>
