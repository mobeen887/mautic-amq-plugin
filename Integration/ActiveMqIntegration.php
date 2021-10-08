<?php 
namespace MauticPlugin\HelloWorldBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;

class ActiveMqIntegration extends AbstractIntegration
{
	const PLUGIN_NAME = 'ActiveMQ';

    public function getName()
    {
        return self::PLUGIN_NAME;
    }

    public function getDisplayName()
    {
        return 'ActiveMQ';
    }

    /**
     * Return's authentication method such as oauth2, oauth1a, key, etc.
     *
     * @return string
     */
    public function getAuthenticationType()
    {
        // Just use none for now and I'll build in "basic" later
        return 'none';
    }
}