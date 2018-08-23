<?php
/**
 * Created by PhpStorm.
 * User: proox
 * Date: 14/08/18
 * Time: 02:17
 */

namespace CoreBaseBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerBuilder;

class prm
{

    public function getUrl()
    {
        $co = new ContainerBuilder();
        return realpath($co->getParameter('core_base.src_dir')).DIRECTORY_SEPARATOR;
    }

}