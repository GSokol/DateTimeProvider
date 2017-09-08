<?php

/**
 * @author Grigorii Sokolik <g.sokol99@g-sokol.info>
 */

namespace GSokol\DateTimeProvider;

/**
 * GreedyDateTimeProvider
 */
class GreedyDateTimeProvider implements DateTimeProviderInterface
{
    private static $dateTime;

    public static function setup()
    {
        self::$dateTime = new \DateTime();
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestTime(): \DateTime
    {
        return self::$dateTime;
    }

    /**
     * {@inheritdoc}
     */
    public function getNewRequestTime(): \DateTime
    {
        return clone(self::$dateTime);
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentTime(): \DateTime
    {
        return new \DateTime();
    }
}

