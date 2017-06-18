<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @since      Class available since Release 2.0.0
 * @covers     PHPUnit_Framework_TestCase
 */
class Framework_TestListenerTest extends PHPUnit_Framework_TestCase implements PHPUnit_Framework_TestListener
{
    protected $endCount;
    protected $errorCount;
    protected $failureCount;
    protected $notImplementedCount;
    protected $riskyCount;
    protected $skippedCount;
    protected $result;
    protected $startCount;

    /**
     * An error occurred.
     *
     * @param PHPUnit_Framework_Test $test
     * @param \Exception|\Throwable  $e
     * @param float                  $time
     */
    public function addError(PHPUnit_Framework_Test $test, $e, $time)
    {
        assert($e instanceof \Exception || $e instanceof \Error);
        $this->errorCount++;
    }

    /**
     * A failure occurred.
     *
     * @param PHPUnit_Framework_Test                 $test
     * @param PHPUnit_Framework_AssertionFailedError $e
     * @param float                                  $time
     */
    public function addFailure(PHPUnit_Framework_Test $test, PHPUnit_Framework_AssertionFailedError $e, $time)
    {
        $this->failureCount++;
    }

    /**
     * Incomplete test.
     *
     * @param PHPUnit_Framework_Test $test
     * @param \Exception|\Throwable  $e
     * @param float                  $time
     */
    public function addIncompleteTest(PHPUnit_Framework_Test $test, $e, $time)
    {
        $this->notImplementedCount++;
    }

    /**
     * Risky test.
     *
     * @param PHPUnit_Framework_Test $test
     * @param \Exception|\Throwable  $e
     * @param float                  $time
     *
     * @since  Method available since Release 4.0.0
     */
    public function addRiskyTest(PHPUnit_Framework_Test $test, $e, $time)
    {
        $this->riskyCount++;
    }

    /**
     * Skipped test.
     *
     * @param PHPUnit_Framework_Test $test
     * @param \Exception|\Throwable  $e
     * @param float                  $time
     *
     * @since  Method available since Release 3.0.0
     */
    public function addSkippedTest(PHPUnit_Framework_Test $test, $e, $time)
    {
        $this->skippedCount++;
    }

    /**
     * A testsuite started.
     *
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function startTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
    }

    /**
     * A testsuite ended.
     *
     * @param PHPUnit_Framework_TestSuite $suite
     *
     * @since  Method available since Release 2.2.0
     */
    public function endTestSuite(PHPUnit_Framework_TestSuite $suite)
    {
    }

    /**
     * A test started.
     *
     * @param PHPUnit_Framework_Test $test
     */
    public function startTest(PHPUnit_Framework_Test $test)
    {
        $this->startCount++;
    }

    /**
     * A test ended.
     *
     * @param PHPUnit_Framework_Test $test
     * @param float                  $time
     */
    public function endTest(PHPUnit_Framework_Test $test, $time)
    {
        $this->endCount++;
    }

    protected function setUp()
    {
        $this->result = new PHPUnit_Framework_TestResult;
        $this->result->addListener($this);

        $this->endCount            = 0;
        $this->failureCount        = 0;
        $this->notImplementedCount = 0;
        $this->riskyCount          = 0;
        $this->skippedCount        = 0;
        $this->startCount          = 0;
    }

    public function testError()
    {
        $test = new TestError;
        $test->run($this->result);

        $this->assertEquals(1, $this->errorCount);
        $this->assertEquals(1, $this->endCount);
    }

    public function testFailure()
    {
        $test = new Failure;
        $test->run($this->result);

        $this->assertEquals(1, $this->failureCount);
        $this->assertEquals(1, $this->endCount);
    }

    public function testStartStop()
    {
        $test = new Success;
        $test->run($this->result);

        $this->assertEquals(1, $this->startCount);
        $this->assertEquals(1, $this->endCount);
    }
}
