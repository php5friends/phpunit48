<?php
class Issue1330Test extends PHPUnit_Framework_TestCase
{
    /** @suppress PhanUndeclaredConstant */
    public function testTrue()
    {
        $this->assertTrue(PHPUNIT_1330);
    }
}
