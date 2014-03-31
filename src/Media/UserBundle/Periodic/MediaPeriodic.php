<?php

namespace Media\UserBundle\Periodic;

use JDare\ClankBundle\Periodic\PeriodicInterface;

/**
 * Description of MediaPeriodic
 *
 * @author eningabiye
 */
class MediaPeriodic implements PeriodicInterface {

    /**
     * This function is executed every 2 min.
     *
     * For more advanced functionality, try injecting a Topic Service to perform actions on your connections every x seconds.
     */
    public function tick() {
        echo "Executed once every 2 min" . PHP_EOL;
    }

}

?>
