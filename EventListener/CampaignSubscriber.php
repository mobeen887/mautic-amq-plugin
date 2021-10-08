<?php

namespace MauticPlugin\HelloWorldBundle\EventListener;

use Mautic\CampaignBundle\CampaignEvents;
use Mautic\CampaignBundle\Event\CampaignBuilderEvent;
use Mautic\CampaignBundle\Event\CampaignExecutionEvent;
use Mautic\CoreBundle\EventListener\CommonSubscriber;
use Mautic\CoreBundle\Helper\CoreParametersHelper;
use MauticPlugin\InfoBipSmsBundle\Model\SmsModel;
use Mautic\SmsBundle\SmsEvents;

class CampaignSubscriber extends CI_Controller {

	public function index()
	{
		
	}

}

/* End of file CampaignSubscriber.php */
/* Location: .//C/xampp/htdocs/mautic_new/plugins/HelloWorldBundle/EventListener/CampaignSubscriber.php */


?>