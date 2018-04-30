<?php

namespace App\Domain\Service;

use App\Domain\Entity\Ad;
use App\Domain\Validator\AllComponentsMustBeValidException;
use App\infrastructure\persistence\AdRepositoryFactory;
use App\infrastructure\persistence\ImageComponentRepositoryFactory;
use App\infrastructure\persistence\TextComponentRepositoryFactory;
use App\infrastructure\persistence\VideoComponentRepository;
use App\infrastructure\persistence\VideoComponentRepositoryFactory;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CreateAdTest extends KernelTestCase
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

    public function testCreateAdWithoutComponents()
    {
        // Arrange
        $createAdService = new CreateAdService($this->adRepository);
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
        $createAdService = new CreateAdService($this->adRepository);
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

    public function testCreateAdWithThreeComponents()
    {
        // Arrange
        $createAdService = new CreateAdService($this->adRepository);
        $textComponentRepository = TextComponentRepositoryFactory::createDoctrine($this->entityManager);
        $createAdService->setTextComponentRepository($textComponentRepository);
        $imageComponentRepository = ImageComponentRepositoryFactory::createDoctrine($this->entityManager);
        $createAdService->setImageComponentRepository($imageComponentRepository);
        $videoComponentRepository = VideoComponentRepositoryFactory::createDoctrine($this->entityManager);
        $createAdService->setVideoComponentRepository($videoComponentRepository);

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
                ],
                [
                    'type' => 'ImageComponent',
                    'name' => 'Stark Industries image',
                    'position' => '1,2,3',
                    'width' => 100,
                    'height' => 300,
                    'linkToExternalImage' => 'http://wanna-joke.com/wp-content/uploads/2015/11/programmers-meme-no-errors.jpg',
                    'format' => 'jpg',
                    'size' => 1000,
                ],
                [
                    'type' => 'VideoComponent',
                    'name' => 'Stark Industries promo video',
                    'position' => '1,2,3',
                    'width' => 100,
                    'height' => 300,
                    'linkToExternalImage' => 'http://wanna-joke.com/wp-content/uploads/2015/11/programmers-meme-no-errors.jpg',
                    'format' => 'webm',
                    'size' => 1000,
                ],
            ]
        ];

        $createAdServiceRequest = new CreateAdServiceRequest($data);
        $responseCreateAdService = $createAdService->execute($createAdServiceRequest);
        $ad = $responseCreateAdService->getAd();
        $components = $ad->getComponents();

        // Act
        $amountComponents = count($components);

        // Assert
        $this->assertEquals( 3, $amountComponents, 'Ad must have three components.');
    }

    public function testIfOneComponentIsNotValidThenServiceMustThrowAComponentIsNotValidException()
    {
        // Assert
        $this->expectException(AllComponentsMustBeValidException::class);

        // Arrange
        $createAdService = new CreateAdService($this->adRepository);
        $textComponentRepository = TextComponentRepositoryFactory::createDoctrine($this->entityManager);
        $createAdService->setTextComponentRepository($textComponentRepository);
        $imageComponentRepository = ImageComponentRepositoryFactory::createDoctrine($this->entityManager);
        $createAdService->setImageComponentRepository($imageComponentRepository);
        $videoComponentRepository = VideoComponentRepositoryFactory::createDoctrine($this->entityManager);
        $createAdService->setVideoComponentRepository($videoComponentRepository);

        $data = [
            'name' => 'Stark Industries Ad',
            'components' => [
                [
                    'type' => 'ImageComponent',
                    'name' => 'Component no valid',
                    'position' => '1,2,3',
                    'width' => 100,
                    'height' => 300,
                    'linkToExternalImage' => 'http://wanna-joke.com/wp-content/uploads/2015/11/programmers-meme-no-errors.jpg',
                    'format' => 'novalid',
                    'size' => 1000,
                ]
            ]
        ];
        $createAdServiceRequest = new CreateAdServiceRequest($data);

        // Act
        $createAdService->execute($createAdServiceRequest);
    }

}