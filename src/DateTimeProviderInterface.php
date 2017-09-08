<?php

/**
 * @author Grigorii Sokolik <g.sokol99@g-sokol.info>
 */

namespace GSokol\DateTimeProvider;

/**
 * DateTimeProviderInterface
 */
interface DateTimeProviderInterface
{
    /**
     * Returns reference to \DateTime object. Each time the same one.
     * Warning: be carefull, do not change an object by reference. If you want to -- use `getNewRequestTime` instead.
     */
    public function getRequestTime(): \DateTime;

    /**
     * The same as `getRequestTime`, but clones object each time.
     */
    public function getNewRequestTime(): \DateTime;

    /**
     * Each time returns new \DateTime object with currenct time.
     */
    public function getCurrentTime(): \DateTime;
}
