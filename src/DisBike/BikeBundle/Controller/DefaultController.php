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
     * @Route("/bike/create", name="bike-create")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $bike = new CreateEvent();

        $form = $this->createForm(new CreateEventType(), $bike);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $createEvent = $form->getData();
            $createEvent->setBikeId(
                strtolower($createEvent->getBrandName()).'-'.
                strtolower($createEvent->getModelName()).'-'.
                number_format(microtime(true), 4, '', ''));
            $createEvent->setCreatedDate(new DateTime());

            $entityManager->persist($createEvent);
            $entityManager->flush();

            return $this->redirectToRoute('bike-list');
        }

        return array('form' => $form->createView());
    }


    /**
     * @Route("/bike/list", name="bike-list")
     * @Template()
     */
    public function listAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('BikeBundle:CreateEvent');

        return array('bikeList' => $repository->findAll());
    }
}
