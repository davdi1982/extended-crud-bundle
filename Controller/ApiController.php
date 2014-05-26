<?php

namespace Developathe\CrudBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Symfony\Component\HttpFoundation\Response;

/**
 * Description of ApiController
 *
 * @author _alK13
 */
class ApiController extends Controller
{

    /**
     * Delete any entity.
     * @param string $entity
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function deleteAction($entity, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository($entity)->find($id);

        if (!$entity) {
            throw $this->createNotFoundException("Unable to find $entity entity.");
        }

        $content = json_encode(array(
            'status' => 'deleted',
        ));
        $response = new Response($content, 200);

        return $response;
    }

}
