<?php
// plugins/HelloWorldBundle/Controller/DefaultController.php

namespace MauticPlugin\HelloWorldBundle\Controller;

use Mautic\CoreBundle\Controller\FormController;

class DefaultController extends FormController
{


    /**
     * Display the world view
     *
     * @param string $world
     *
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function activeAction()
    {
        
    }

    /**
     * Contact form
     *
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function contactAction()
    {
        
    }
}