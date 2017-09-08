<?php

/**
 * @author Grigorii Sokolik <g.sokol99@g-sokol.info>
 */

namespace GSokol\DateTimeProvider;

/**
 * LazyDateTimeProvider
 */
class LazyDateTimeProvider implements DateTimeProviderInterface
{
    /**
     * @var \DateTime
     */
    private $dateTime;

    /**
     * {@inheritdoc}
     */
    public function getRequestTime(): \DateTime
    {
        return ($this->dateTime ?: $this->setupDateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function getNewRequestTime(): \DateTime
    {
        return clone($this->dateTime ?: $this->setupDateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentTime(): \DateTime
    {
        return new \DateTime();
    }

    private function setupDateTime(): \DateTime
    {
        return ($this->dateTime = new \DateTime());
    }
}
