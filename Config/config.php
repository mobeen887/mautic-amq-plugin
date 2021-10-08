<?php
// plugins/HelloWorldBundle/Config/config.php

use Doctrine\DBAL\Schema\Schema;
use Mautic\PluginBundle\Bundle\PluginBundleBase;
use Mautic\PluginBundle\Entity\Plugin;
use Mautic\CoreBundle\Factory\MauticFactory;


return array (
    'name'        => 'ActiveMQ with Mautic',
    'description' => 'Connect with ActiveMQ',
    'version'     => '1.0',
    'author'      => 'Dbuglab',
    'routes'   => array(
        'main' => array(),
        'public' => array(),
        'api' => array()
    ),
    'menu'     => array(
        'main' => array(
            'priority' => 4,
            'items'    => array()
        ),
    ),
    'services'    => array(
        'events' => array(),
        'forms'  => array(
            'mautic.form.type.sms' => array(
                'class' => 'MauticPlugin\HelloWorldBundle\Form\Type\ConfigType',
                'arguments' => 'mautic.factory',
                'alias' => 'ActiveMQ'
            )
        ),
        'helpers' => array(
             'mautic.activemq.message_factory' => array(
                'class' => 'MauticPlugin\HelloWorldBundle\Message\MessageFactory',
                'alias' => 'activemq_message_factory',
            ),
        ),
        'other'   => array(
            'mautic.sms.transport.activemq' => array(
                'class' => \MauticPlugin\HelloWorldBundle\Transport\ActiveMqIntegration::class,
                'arguments' => [
                ],
                'tag' => 'mautic.sms_transport',
                'tagArguments' => [
                    'integrationAlias' => 'Activemq',
                ],
            ),
        )
    ),
    
    'parameters' => array(),
     
);