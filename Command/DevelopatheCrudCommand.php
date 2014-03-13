<?php

namespace Developathe\CrudBundle\Command;

use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Developathe\CrudBundle\Generator\DevelopatheCrudGenerator;
use Sensio\Bundle\GeneratorBundle\Command\GenerateDoctrineCrudCommand;

class DevelopatheCrudCommand extends GenerateDoctrineCrudCommand
{

    protected function configure()
    {
        parent::configure();
        $this->setName('developathe:generate:crud');
    }

    protected function getGenerator(BundleInterface $bundle = null)
    {
        $generator = new DevelopatheCrudGenerator($this->getContainer()->get('filesystem') );
        $generator->setSkeletonDirs(__DIR__ . '/../Resources/skeleton');
        $this->setGenerator($generator);
        return parent::getGenerator($bundle);
    }
    
    
    protected function createGenerator($bundle = null)
    {
        return new DevelopatheCrudGenerator($this->getContainer()->get('filesystem'));
    }

}
