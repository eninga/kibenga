<?php

namespace Media\UserBundle\RPC;

use Ratchet\ConnectionInterface as Conn;

/**
 * Description of MediaService
 *
 * @author eningabiye
 */
class MediaService {

    /**
     * Adds the params together
     *
     * Note: $conn isnt used here, but contains the connection of the person making this request.
     *
     * @param ConnectionInterface $conn
     * @param array $params
     * @return int
     */
    public function addFunc(Conn $conn, $params) {
        return array("result" => array_sum($params));
    }

    public function subFunc(Conn $conn, $params) {
        return array("result2" => array_shift($params));
    }

    public function changeNickname(Conn $conn, $params) {
        if (!isset($params['nickname'])) {
            return false;
        }

        //We can assign any key => value pair to this connection due to the magic getters & setters
        // see more at http://socketo.me/api/class-Ratchet.AbstractConnectionDecorator.html

        $conn->ChatNickname = htmlentities($params['nickname']);
        return true; //this sends a positive result back to the client
    }

}

?>
