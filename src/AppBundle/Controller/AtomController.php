<?php

namespace AppBundle\Controller;

use AppBundle\Form\AtomType;
use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use AppBundle\Service\PeriodicTableUtil;

class AtomController extends Controller
{
    /**
     * @Route("/", name="createAtom")
     * @Template()
     * @param Request $request
     * @return string
     */
    public function createAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                'This user does not have access to this section.'
            );
        }
        $form = $this->createForm(AtomType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $atom = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($atom);
            $em->flush();
            return $this->redirect($this->generateUrl('fos_user_profile_show'));
        }

        return array('form'=> $form->createView());
    }

    /**
     * Controller to handle incoming soap requests
     * @Route("/soap/atom", name="soap_request")
     * @param Request $request
     * @return Response $response
     */
    public function serverSoapAction(Request $request)
    {
        if ($request->getMethod() !== 'POST') {
            throw new AccessDeniedException(
                'The requested url cant be accessed'
            );
        }
        $response = $this->get('soap_request')->handleRequest();

        return $response;
    }
}