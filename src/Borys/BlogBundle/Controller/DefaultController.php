<?php

namespace Borys\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        return $this->render('BorysBlogBundle:Default:index.html.twig');
    }
}
