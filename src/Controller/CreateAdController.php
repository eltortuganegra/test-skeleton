<?php

namespace App\Controller;

use App\Domain\Service\CreateAdService;
use App\Domain\Service\CreateAdServiceRequest;
use App\infrastructure\persistence\AdRepositoryFactory;
use App\infrastructure\persistence\ImageComponentRepositoryFactory;
use App\infrastructure\persistence\TextComponentRepositoryFactory;
use App\infrastructure\persistence\VideoComponentRepositoryFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CreateAdController extends Controller
{
    private $entityManager;
    private $adRepository;

    /**
     * @Route("/ad/create", name="ad")
     */
    public function create(Request $resquest)
    {
        try {
            $response = $this->executeCreateAdService($resquest);

        } catch(\Exception $exception) {
            $response = $this->getResponseForException($exception);

            return $response;
        }

        return $response;
    }

    private function getCreateAdService(): CreateAdService
    {
        $this->loadAdRepository();
        $service = $this->createNewAdService();
        $this->loadRepositoriestoTheService($service);

        return $service;
    }

    private function getCreateAdServiceRequest(Request $resquest): CreateAdServiceRequest
    {
        $data = json_decode($resquest->getContent(), true);
        $createAdServiceRequest = new CreateAdServiceRequest($data);

        return $createAdServiceRequest;
    }

    private function executeCreateAdService(Request $resquest): Response
    {
        $createAdService = $this->getCreateAdService();
        $createAdServiceRequest = $this->getCreateAdServiceRequest($resquest);
        $serviceResponse = $createAdService->execute($createAdServiceRequest);
        $response = $this->getResponse($serviceResponse);

        return $response;
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

    private function createNewAdService(): CreateAdService
    {
        $service = new CreateAdService($this->adRepository);

        return $service;
    }

    private function loadRepositoriestoTheService($service): void
    {
        $textComponentRepository = TextComponentRepositoryFactory::createDoctrine($this->entityManager);
        $service->setTextComponentRepository($textComponentRepository);
        $imageComponentRepository = ImageComponentRepositoryFactory::createDoctrine($this->entityManager);
        $service->setImageComponentRepository($imageComponentRepository);
        $videoComponentRepository = VideoComponentRepositoryFactory::createDoctrine($this->entityManager);
        $service->setVideoComponentRepository($videoComponentRepository);
    }

    private function getResponse($serviceResponse): Response
    {
        $ad = $serviceResponse->getAd();

        $output = [
            'ad' => $ad->toArray()
        ];
        $response = new Response(json_encode($output));

        return $response;
    }
}
