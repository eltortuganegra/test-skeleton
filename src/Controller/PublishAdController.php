<?php

namespace App\Controller;


use App\Domain\Service\PublishAdService;
use App\Domain\Service\PublishAdServiceRequest;
use App\Domain\Service\ServiceResponse;
use App\Domain\ValueObject\AdStatusFactory;
use App\infrastructure\persistence\AdRepositoryFactory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublishAdController extends Controller
{
    private $entityManager;
    private $adRepository;

    /**
     * @Route("/ad/publish", name="ad-publish")
     */
    public function publish(Request $resquest)
    {
        try {
            $serviceResponse = $this->executePublishAdService($resquest);
            $ad = $serviceResponse->getAd();
            if ($ad->getStatus()->getValue() == AdStatusFactory::AD_STATUS_PUBLISHED) {
                $output = json_encode([
                    'message' => 'ok'
                ]);

                return new Response($output);
            } else {
                $output = json_encode([
                    'message' => 'fail'
                ]);
                $response = new Response($output);
                $response->setStatusCode(400);

                return $response;
            }
        } catch(\Exception $exception) {
            $response = $this->getResponseForException($exception);

            return $response;
        }
    }

    private function executePublishAdService(Request $resquest): ServiceResponse
    {
        $data = json_decode($resquest->getContent(), true);
        $this->entityManager = $this->getDoctrine()->getManager();
        $this->adRepository = AdRepositoryFactory::createDoctrine($this->entityManager);
        $serviceRequest = new PublishAdServiceRequest($data['AdId']);
        $service = new PublishAdService($this->adRepository);
        $serviceResponse = $service->execute($serviceRequest);

        return $serviceResponse;
    }

    private function getResponseForException($exception): Response
    {
        $output = [
            'message' => $exception->getMessage()
        ];
        $response = new Response(json_encode($output));
        $response->setStatusCode(400);

        return $response;
    }
}