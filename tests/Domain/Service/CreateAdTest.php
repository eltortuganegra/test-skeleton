<?php

namespace App\Domain\Service;

use App\Domain\Entity\Ad;
use App\infrastructure\persistence\AdRepositoryFactory;
use App\infrastructure\persistence\TextComponentRepositoryFactory;
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

    public function testCreateAdWithOneComponent()
    {
        // Arrange
        $adRepository = AdRepositoryFactory::createDoctrine($this->entityManager);


        $createAdService = new CreateAdService($adRepository);
        $textComponentRepository = TextComponentRepositoryFactory::createDoctrine($this->entityManager);
        $createAdService->setTextComponentRepository($textComponentRepository);

        $data = [
            'name' => 'Stark Industries Ad',
            'components' => [
                [
                    'type' => 'TextComponent',
                    'name' => 'Stark Industries slogan',
                    'position' => '1,2,3',
                    'width' => 100,
                    'height' => 300,
                    'text' => 'Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro.',
                ]
            ]
        ];

        $createAdServiceRequest = new CreateAdServiceRequest($data);
        $responseCreateAdService = $createAdService->execute($createAdServiceRequest);
        $ad = $responseCreateAdService->getAd();
        $components = $ad->getComponents();

        // Act
        $amountComponents = count($components);

        // Assert
        $this->assertEquals( 1, $amountComponents, 'Ad must have one component.');
    }

}