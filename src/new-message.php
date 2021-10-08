<?php
require __DIR__.'../stomp-php-client/autoload.php';
/**
 *
 * Copyright (C) 2009 Progress Software, Inc. All rights reserved.
 * http://fusesource.com
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

// include a library

use FuseSource\Stomp\Stomp;
use FuseSource\Stomp\client;
use FuseSource\Stomp\Network\Connection;
use FuseSource\Stomp\StatefulStomp;
use FuseSource\Stomp\Transport\Message;


class NewMessage extends Message
{
    private $user;

    private $time;

    public function __construct($user, DateTime $time)
    {
        $this->user = $user;
        $this->time = $time;
        parent::__construct(
            $this->generateBody(),
            ['content-type' => 'text/NewMessage'] 
        );
    }


    public function getUser()
    {
        return $this->user;
    }

    public function getTime()
    {
        return $this->time;
    }

    private function generateBody()
    {
        return $this->user . '|' . $this->time->getTimestamp() . '|' . $this->time->getTimezone()->getName();
    }

    public function __toString()
    {
        $this->body = $this->generateBody();
        return parent::__toString();
    }
}

// connection setup
$con = new Stomp('tcp://173.212.195.56:61613');

$con->getParser()->getFactory()->registerResolver(
    function ($command, array $headers, $body) {
        
        if ($command === 'MESSAGE' && isset($headers['content-type']) && $headers['content-type'] == 'text/NewMessage') {
            if (preg_match('/^(.+)\|(\d+)\|(.+)$/', $body, $matches)) {
                $date = DateTime::createFromFormat('U', intval($matches[2]), new DateTimeZone($matches[3]));
                $date->setTimezone(new DateTimeZone($matches[3]));
                $user = $matches[1];
                return new NewMessage($user, $date);
            }
        }
        
        return null;
    }
);

$con->connect();

$con->subscribe('/queue/test_two');

$con->send(
    '/queue/test_2',
    new NewMessage('custom msg', new DateTime('Today 1:00', new DateTimeZone('Asia/kolkata')))
);

$message = $con->read();

echo get_class($message), PHP_EOL;
echo sprintf('Message from %s (%s)', $message->getUser(), $message->getTime()->format('Y-m-d H:i:s e'));

$con->unsubscribe();




