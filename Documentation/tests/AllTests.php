<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'AllTests::main');
}
 
require_once 'PHPUnit/Framework.php';
require_once 'PHPUnit/TextUI/TestRunner.php';
 
require_once 'Documentation/tests/phpDocumentorSetupTests.php';
require_once 'Documentation/tests/phpDocumentorTParserTests.php';
require_once 'Documentation/tests/ParserClassTests.php';
require_once 'Documentation/tests/ParserPageTests.php';
 
class Documentation_tests_AllTests
{
    public static function main()
    {
        PHPUnit_TextUI_TestRunner::run(self::suite());
    }
 
    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('PhpDocumentor Full Suite of Unit Tests');
        $suite->addTest(Documentation_tests_phpDocumentorSetupTests::suite());
        $suite->addTest(Documentation_tests_phpDocumentorTParserTests::suite());
        $suite->addTest(Documentation_tests_ParserClassTests::suite());
        $suite->addTest(Documentation_tests_ParserPageTests::suite());
        return $suite;
    }
}
 
if (PHPUnit_MAIN_METHOD == 'AllTests::main') {
    Documentation_tests_AllTests::main();
}
?>
