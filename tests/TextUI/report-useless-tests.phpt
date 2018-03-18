--TEST--
phpunit --report-useless-tests NothingTest ../_files/NothingTest.php
--FILE--
<?php
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = '--report-useless-tests';
$_SERVER['argv'][3] = 'NothingTest';
$_SERVER['argv'][4] = dirname(dirname(__FILE__)) . '/_files/NothingTest.php';

require __DIR__ . '/../bootstrap.php';
PHPUnit_TextUI_Command::main();
?>
--EXPECTF--
PHPUnit48 %s by Sebastian Bergmann and contributors.  (modified by php5friends)

R

Time: %s, Memory: %s

OK, but incomplete, skipped, or risky tests!
Tests: 1, Assertions: 0, Risky: 1.
