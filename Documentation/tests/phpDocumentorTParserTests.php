<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'phpDocumentorTParserTests::main');
}
 
require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
 
require_once 'Documentation/tests/phpDocumentorTParserGetInlineTagsTests.php';
class Documentation_tests_phpDocumentorTParserTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }
 
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('phpDocumentorTParser Unit Test Suites');
        $suite->addTestSuite('Documentation_tests_phpDocumentorTParserGetInlineTagsTests');
        return $suite;
    }
}
 
if (PHPUnit_MAIN_METHOD == 'phpDocumentorTParserTests::main') {
    Documentation_tests_phpDocumentorTParserTests::main();
}
?>
