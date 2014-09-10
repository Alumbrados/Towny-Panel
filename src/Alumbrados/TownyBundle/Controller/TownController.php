<?php
namespace Alumbrados\TownyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TownController extends Controller
{
    /**
     * @Route("/town/{id}", name="town_view")
     * @Template()
     */    
    public function viewAction($id)
    {
        $item = $this->getDoctrine()->getManager()->find('AlumbradosTownyBundle:Town', $id);
        if ($item) {
            return array(
                'town' => $item
            );
        }
        throw $this->createNotFoundException('Unknown town');
    }
}
