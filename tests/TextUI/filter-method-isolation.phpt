--TEST--
phpunit --process-isolation --filter testBalanceIsInitiallyZero BankAccountTest ../_files/BankAccountTest.php
--FILE--
<?php
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = '--process-isolation';
$_SERVER['argv'][3] = '--filter';
$_SERVER['argv'][4] = 'testBalanceIsInitiallyZero';
$_SERVER['argv'][5] = 'BankAccountTest';
$_SERVER['argv'][6] = dirname(__FILE__) . '/../_files/BankAccountTest.php';

require __DIR__ . '/../bootstrap.php';
PHPUnit_TextUI_Command::main();
?>
--EXPECTF--
PHPUnit48 %s by Sebastian Bergmann and contributors.  (modified by php5friends)

.

Time: %s, Memory: %s

OK (1 test, 1 assertion)
