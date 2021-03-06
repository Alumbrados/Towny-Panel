<?php
namespace Alumbrados\TownyBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'root'));
        $menu->addChild('Worlds', array('route' => 'world_index'));

        return $menu;
    }
}