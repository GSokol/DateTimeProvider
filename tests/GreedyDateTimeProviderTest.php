<?php

/**
i * @author Grigorii Sokolik <g.sokol99@g-sokol.info>
 */

namespace GSokol\DateTimeProvider;

use PHPUnit\Framework\TestCase;

/**
 * GreedyDateTimeProviderTest
 */
class GreedyDateTimeProviderTest extends TestCase
{
    public function testGreedy()
    {
        GreedyDateTimeProvider::setup();
        sleep(2);
        $this->assertEquals(2, (new \DateTime())->getTimestamp() - (new GreedyDateTimeProvider)->getRequestTime()->getTimestamp());
    }

    public function testGetRequestTime()
    {
        $target = new GreedyDateTimeProvider();
        $this->assertSame($target->getRequestTime(), $target->getRequestTime());
    }

    public function testGetNewRequestTime()
    {
        $target = new GreedyDateTimeProvider();
        $this->assertNotSame($target->getRequestTime(), $target->getNewRequestTime());
        $this->assertNotSame($target->getNewRequestTime(), $target->getNewRequestTime());
        $this->assertEquals($target->getNewRequestTime(), $target->getRequestTime());
    }

    public function testGetCurrentTime()
    {
        $target = new GreedyDateTimeProvider();
        $dt0 = $target->getCurrentTime();
        sleep(1);
        $dt1 = $target->getCurrentTime();
        $this->assertEquals(1, $dt1->getTimestamp() - $dt0->getTimestamp());
    }
}
