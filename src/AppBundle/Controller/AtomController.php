<?php
/**
 * Controller to create atom objects
 * and handling requests to the soap service
 * @category  Controller
 * @package   AppBundle
 * @author    Jayraj Arora <jayraja@mindfiresolutions.com>
 */
namespace AppBundle\Controller;

use AppBundle\Entity\Atom;
use AppBundle\Form\AtomType;
use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use AppBundle\Constants\SoapConstants;

/**
 * Class AtomController
 *
 * @category Controller
 * @package  AppBundle
 * @author   Jayraj Arora <jayraja@mindfiresolutions.com>
 */
class AtomController extends Controller
{
    /**
     * Action for creating an atom if user is logged in
     * @Route("/", name="createAtom")
     * @Template()
     * @param Request $request
     * @return mixed
     */
    public function createAction(Request $request)
    {
        // denied access for anonymous users
        $user = $this->get('security.token_storage')->getToken()->getUser();

        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                SoapConstants::ACCESS_DENIED_TO_USER
            );
        }
        // form to create handle data of Atom
        $form = $this->createForm(AtomType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Atom $atom */
            $atom = $form->getData();
            $atom->setOwner($user);
            $em = $this->getDoctrine()->getManager();
            $em->persist($atom);
            $em->flush();
            // flashbag to show user only once
            $request->getSession()
                ->getFlashBag()
                ->add(
                    'success',
                    'Atom Successfully Added. Use this form to add another Element '
                );

            return $this->redirect($request->getUri());
        }

        return array('form'=> $form->createView());
    }

    /**
     * Action to handle incoming soap requests
     * which is send to the soap server
     * and allowing only post requests
     * @Route("/soap/atom", name="soap_request")
     * @param Request $request
     * @return Response $response
     */
    public function serverSoapAction(Request $request)
    {
        if ($request->getMethod() !== 'POST') {
            throw new AccessDeniedException(
                SoapConstants::ACCESS_DENIED_TO_URL
            );
        }

        return $this->get('soap_request')->serveRequest();
    }
}
