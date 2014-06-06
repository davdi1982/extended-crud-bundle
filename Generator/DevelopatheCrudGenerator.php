<?php

namespace Developathe\CrudBundle\Generator;

use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Doctrine\ORM\Mapping\ClassMetadataInfo;

/**
 * Description of DevelopatheCrudGenerator
 *
 * @author jpetit
 */
class DevelopatheCrudGenerator extends DoctrineCrudGenerator
{

    public function generate(BundleInterface $bundle, $entity, ClassMetadataInfo $metadata, $format, $routePrefix, $needWriteActions, $forceOverwrite)
    {
        parent::generate($bundle, $entity, $metadata, $format, $routePrefix, $needWriteActions, $forceOverwrite);

        $dir = sprintf('%s/Resources/views/%s', $this->bundle->getPath(), str_replace('\\', '/', $this->entity));

        $this->copyBasicTemplates();
        
        $this->generateCommonView($dir);

        if (in_array('delete', $this->actions)) {
            $this->generateDeleteView($dir);
        }
    }

    protected function copyBasicTemplates()
    {
        $dir = sprintf('%s/Resources/views', $this->bundle->getPath());
        $base = "$dir/developathe.crud.base.html.twig";
        if (!$this->filesystem->exists($base)) {
            $this->filesystem->copy(__DIR__. '/../Resources/views/base.html.twig', $base);
        }
        $pagination = "$dir/developathe.crud.pagination.html.twig";
        if (!$this->filesystem->exists($pagination)) {
            $this->filesystem->copy(__DIR__. '/../Resources/views/pagination.html.twig', $pagination);
        }
    }

    /**
     * Generates the delete.html.twig template in the final bundle.
     *
     * @param string $dir The path to the folder that hosts templates in the bundle
     */
    protected function generateDeleteView($dir)
    {
        $this->renderFile('crud/views/delete.html.twig.twig', $dir . '/delete.html.twig', array(
            'route_prefix'      => $this->routePrefix,
            'route_name_prefix' => $this->routeNamePrefix,
            'entity'            => $this->entity,
            'bundle'            => $this->bundle->getName(),
            'actions'           => $this->actions,
        ));
    }

    /**
     * Generates the Common.html.twig template in the final bundle.
     *
     * @param string $dir The path to the folder that hosts templates in the bundle
     */
    protected function generateCommonView($dir)
    {
        $this->renderFile('crud/views/common.html.twig.twig', $dir . '/common.html.twig', array(
            'route_prefix'      => $this->routePrefix,
            'route_name_prefix' => $this->routeNamePrefix,
            'entity'            => $this->entity,
            'bundle'            => $this->bundle->getName(),
            'actions'           => $this->actions,
        ));
    }

}
