<?php

/**
 * @author Grigorii Sokolik <g.sokol99@g-sokol.info
 */

namespace GSokol\DateTimeProvider;

use PHPUnit\Framework\TestCase;

/**
 * LazyDateTimeProviderTest
 */
class LazyDateTimeProviderTest extends TestCase
{
    public function testLazy()
    {
        $target = new LazyDateTimeProvider();
        sleep(2);
        $this->assertEquals(0, (new \DateTime())->getTimestamp() - $target->getRequestTime()->getTimestamp());
    }

    public function testGetRequestTime()
    {
        $target = new LazyDateTimeProvider();
        $this->assertSame($target->getRequestTime(), $target->getRequestTime());
    }

    public function testGetNewRequestTime()
    {
        $target = new LazyDateTimeProvider();
        $this->assertNotSame($target->getRequestTime(), $target->getNewRequestTime());
        $this->assertNotSame($target->getNewRequestTime(), $target->getNewRequestTime());
        $this->assertEquals($target->getRequestTime(), $target->getNewRequestTime());
    }

    public function testGetCurrentTime()
    {
        $target = new LazyDateTimeProvider();
        $dt0 = $target->getCurrentTime();
        sleep(1);
        $dt1 = $target->getCurrentTime();
        $this->assertEquals(1, $dt1->getTimestamp() - $dt0->getTimestamp());
    }
}
