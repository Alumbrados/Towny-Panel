<?php

namespace Alumbrados\TownyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class WorldController extends Controller
{
    /**
     * @Route("/world", name="world_index")
     * @Template()
     */
    public function indexAction()
    {
        return array(
            'worlds' => $this->getDoctrine()->getRepository('AlumbradosTownyBundle:World')->findAll()
        );
    }
    
    /**
     * @Route("/world/{id}", name="world_view")
     * @Template()
     */    
    public function viewAction($id)
    {
        $item = $this->getDoctrine()->getManager()->find('AlumbradosTownyBundle:World', $id);
        if ($item) {
            $towns = $this->getDoctrine()->getManager()->createQueryBuilder()
                ->select(array('t', 'm', 'ml', 'r', 'p'))
                ->from('AlumbradosTownyBundle:Town', 't')
                ->innerJoin('t.residents', 'r')
                ->innerJoin('r.player', 'p')
                ->innerJoin('t.mayor', 'm')
                ->innerJoin('m.player', 'ml')
                ->where('t.world = :world_id')
                ->orderBy('t.name', 'ASC')
                ->setParameter('world_id', $id)
                ->getQuery()->getResult();            
            return array(
                'world' => $item,
                'towns' => $towns
            );
        }
        throw $this->createNotFoundException('Unknown world');
    }
}
