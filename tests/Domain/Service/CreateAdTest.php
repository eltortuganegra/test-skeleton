<?php

namespace App\Domain\Service;

use App\Domain\Entity\Ad;
use App\infrastructure\persistence\AdRepositoryFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CreateAdTest extends KernelTestCase
{
    private $entityManager;

    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testCreateAdWithoutComponents()
    {
        // Arrange
        $adRepository = AdRepositoryFactory::createDoctrine($this->entityManager);
        $createAdService = new CreateAdService($adRepository);
        $data = [
            'name' => 'Stark Industries Ad'
        ];

        $createAdServiceRequest = new CreateAdServiceRequest($data);

        // Act
        $responseCreateAdService = $createAdService->execute($createAdServiceRequest);

        // Assert
        $this->assertTrue($responseCreateAdService->getAd() instanceof Ad, 'Response must be instance of Ad');
    }


}