<?php
namespace DisBike\BikeBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DisBike\BikeBundle\Entity\CreateEvent;
use DisBike\BikeBundle\Form\CreateEventType;

use DateTime;

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

        $form = $this->createForm(new CreateEventType(), $bike);

        $form->handleRequest($request);

        if ($form->isValid()) {
            echo 'Create request is '.$request->getMethod();

            $entityManager = $this->getDoctrine()->getManager();

            $createEvent = $form->getData();
            $createEvent->setBikeId(
                strtolower($createEvent->getBrandName()).'-'.
                strtolower($createEvent->getModelName()).'-'.
                number_format(microtime(true), 4, '', ''));
            $createEvent->setCreatedDate(new DateTime());

            $entityManager->persist($createEvent);
            $entityManager->flush();

            //return $this->redirectToRoute(...);
        }

        return array('form' => $form->createView());
    }
}
