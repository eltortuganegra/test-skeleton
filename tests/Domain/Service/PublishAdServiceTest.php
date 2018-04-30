<?php

namespace App\Domain\Service;


use App\Domain\Entity\AdFactory;
use App\infrastructure\persistence\AdRepositoryFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PublishAdServiceTest extends KernelTestCase
{
    private $entityManager;
    private $adRepository;

    protected function setUp()
    {
        $this->loadDoctrineEntityManager();
        $this->loadAdRepository();
    }

    protected function loadDoctrineEntityManager(): void
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    protected function loadAdRepository(): void
    {
        $this->adRepository = AdRepositoryFactory::createDoctrine($this->entityManager);
    }

    public function testPublishAd()
    {
        // Arrange
        $adData =[
            'name' => 'Publish ad service test -> Test Publish Ad',
            'status' => 'publishing'
        ];
        $ad = AdFactory::create($adData);
        $this->adRepository->create($ad);

        $request = new PublishAdServiceRequest($ad->getId());
        $service = new PublishAdService($this->adRepository);
        $response = $service->execute($request);
        $responseAd = $response->getAd();

        // Act
        $status = $responseAd->getStatus();

        // Assert
        $this->assertEquals('published', $status);
    }

}