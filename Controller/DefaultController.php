<?php

namespace T73Biz\Bundle\FormConductorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('T73BizFormConductorBundle:Default:index.html.twig', array('name' => $name));
    }
}
