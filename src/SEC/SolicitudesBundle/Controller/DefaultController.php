<?php

namespace SEC\SolicitudesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SECSolicitudesBundle:Default:index.html.twig');
    }
}
