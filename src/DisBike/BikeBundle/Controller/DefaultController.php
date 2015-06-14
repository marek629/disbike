<?php

namespace DisBike\BikeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DisBike\BikeBundle\Entity\CreateEvent;
use DisBike\BikeBundle\Form\CreateEventType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/bike/create")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $bike = new CreateEvent();
        
        $form = $this->createForm(new CreateEventType(), $bike);//, action array?
                    
        return array('form' => $form->createView());
    }
}
