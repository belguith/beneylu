<?php

namespace Beneylu\BeneyluBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BeneyluBundle:Default:index.html.twig');
    }
}
