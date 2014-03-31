<?php

namespace Media\UserBundle\Topic;

use JDare\ClankBundle\Topic\TopicInterface;
use Ratchet\ConnectionInterface as Conn;

/**
 * Description of MediaTopic
 *
 * @author eningabiye
 */
class MediaTopic implements TopicInterface {

    /**
     * This will receive any Subscription requests for this topic.
     *
     * @param ConnectionInterface $conn
     * @param $topic
     * @return void
     */
    public function onSubscribe(Conn $conn, $topic) {
        //this will broadcast the message to ALL subscribers of this topic.
        //$topic->broadcast($conn->resourceId . " has joined " . $topic->getId());
        if (!isset($conn->ChatNickname)) {
            $conn->ChatNickname = "VISITOR" . $conn->resourceId;
        }

        $msg = $conn->ChatNickname . " has joined " . $topic->getId();

        $topic->broadcast(array("msg" => $msg, "from" => "System"));
    }

    /**
     * This will receive any UnSubscription requests for this topic.
     *
     * @param ConnectionInterface $conn
     * @param $topic
     * @return void
     */
    public function onUnSubscribe(Conn $conn, $topic) {
        //this will broadcast the message to ALL subscribers of this topic.
        $topic->broadcast(array("msg" => $conn->ChatNickname . " has left " . $topic->getId(), "from" => "System"));
        echo $conn->resourceId . " has left " . $topic->getId() . PHP_EOL;
    }

    /**
     * This will receive any Publish requests for this topic.
     *
     * @param ConnectionInterface $conn
     * @param $topic
     * @param $event
     * @param array $exclude
     * @param array $eligible
     * @return mixed|void
     */
    public function onPublish(Conn $conn, $topic, $event, array $exclude, array $eligible) {
        /*
          $topic->getId() will contain the FULL requested uri, so you can proceed based on that

          e.g.

          if ($topic->getId() == "acme/channel/shout")
          //shout something to all subs.
         */


//        $topic->broadcast(array(
//            "sender" => $conn->resourceId,
//            "topic" => $topic->getId(),
//            "event" => $event
//        ));

        $topic->broadcast(array(
            "from" => $conn->ChatNickname,
            "topic" => $topic->getId(),
            "msg" => $event
        ));
    }

    public static function random() {
        $teams = array("Arsenal", "Aston Villa", "Cardiff",
            "Chelsea", "Crystal Palace", "Everton", "Fulham",
            "Hull", "Liverpool", "Man City", "Man Utd", "Newcastle",
            "Norwich", "Southampton", "Stoke", "Sunderland", "Swansea",
            "Tottenham", "West Brom", "West Ham");

        shuffle($teams);

        for ($i = 0; $i <= count($teams); $i++) {
            $id = uniqid();
            $games[$id] = array(
                'id' => $id,
                'home' => array(
                    'team' => array_pop($teams),
                    'score' => 0,
                ),
                'away' => array(
                    'team' => array_pop($teams),
                    'score' => 0,
                ),
            );
        }

        return $games;
    }

}

?>
