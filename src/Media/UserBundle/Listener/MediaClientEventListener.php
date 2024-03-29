<?php

namespace Media\UserBundle\Listener;

use JDare\ClankBundle\Event\ClientErrorEvent;
use JDare\ClankBundle\Event\ClientEvent;

/**
 * Description of MediaClientEventListener
 *
 * @author eningabiye
 */
class MediaClientEventListener {

    /**
     * Called whenever a client connects
     *
     * @param ClientEvent $event
     */
    public function onClientConnect(ClientEvent $event) {
        $conn = $event->getConnection();

        echo $conn->resourceId . " connected" . PHP_EOL;
    }

    /**
     * Called whenever a client disconnects
     *
     * @param ClientEvent $event
     */
    public function onClientDisconnect(ClientEvent $event) {
        $conn = $event->getConnection();

        echo $conn->resourceId . " disconnected" . PHP_EOL;
    }

    /**
     * Called whenever a client errors
     *
     * @param ClientErrorEvent $event
     */
    public function onClientError(ClientErrorEvent $event) {
        $conn = $event->getConnection();
        $e = $event->getException();

        echo "connection error occurred: " . $e->getMessage() . PHP_EOL;
    }

}

?>
