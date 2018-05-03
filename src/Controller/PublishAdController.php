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
            $response = $this->executePublishAdService($resquest);
        } catch(\Exception $exception) {
            $response = $this->getResponseForException($exception);

            return $response;
        }

        return $response;
    }

    private function executePublishAdService(Request $resquest): Response
    {
        $this->loadAdRepository();
        $adId = $this->getAdFromRequest($resquest);
        $serviceRequest = new PublishAdServiceRequest($adId);
        $service = new PublishAdService($this->adRepository);
        $serviceResponse = $service->execute($serviceRequest);
        $ad = $serviceResponse->getAd();

        return $this->getResponse($ad);
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

    private function loadAdRepository(): void
    {
        $this->entityManager = $this->getDoctrine()->getManager();
        $this->adRepository = AdRepositoryFactory::createDoctrine($this->entityManager);
    }

    private function getAdFromRequest(Request $resquest): int
    {
        $data = json_decode($resquest->getContent(), true);
        $adId = $data['AdId'];

        return $adId;
    }

    private function getResponse($ad): Response
    {
        if ( ! $this->isStatusPublished($ad)) {
            $response = $this->get404Response();

            return $response;
        }

        $response = $this->getOkResponse();

        return $response;
    }

    private function isStatusPublished($ad): bool
    {
        return $ad->getStatus()->getValue() == AdStatusFactory::AD_STATUS_PUBLISHED;
    }

    private function get404Response(): Response
    {
        $output = json_encode([
            'message' => 'fail'
        ]);
        $response = new Response($output);
        $response->setStatusCode(400);

        return $response;
    }

    private function getOkResponse(): Response
    {
        $output = json_encode([
            'message' => 'ok'
        ]);

        $response = new Response($output);
        return $response;
    }
}