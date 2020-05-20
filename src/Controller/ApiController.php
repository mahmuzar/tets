<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Customers;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController {

    use \App\Traits\ApiResponseHelper;

    public $data = array(
        'status' => '',
        'message' => '',
        'data' => array()
    );

    public function create() {
        
    }

    /**
     * @Route("/phones/{phone}")
     */
    public function read($phone = null) {
        $repository = $this->getDoctrine()->getManager()->getRepository(Customers::class);
        if (!empty($phone)) {
            $data = $repository->findBy(array('phone' => $phone));
            if (!empty($data)) {
                $this->setStatus(200);
                $this->setData($data);
            } else {
                $this->setStatus(404);
                $this->setMessage('Телефон в базе не найден');
            }
        } else {
            $this->setStatus(200);
            $data = $repository->findAll();
            $this->setData(json_decode(json_encode($data)));
        }
        return new JsonResponse($this->data);
    }

    public function update() {
        
    }

    public function delete() {
        
    }

}
