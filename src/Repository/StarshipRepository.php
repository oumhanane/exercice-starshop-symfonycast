<?php   

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;
use App\Model\StarshipStatusEnum;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StarshipRepository extends AbstractController
{
    public function __construct(private LoggerInterface $logger)
    {

    }

    public function findAll(): array
    {
        $this->logger->info('Starship collection retrieved');

        return[
            new Starship(
                1,
                'USS LeafyCruiser (NCC-001)',
                'Garden',
                'Jean-Luc Pickles',
                StarshipStatusEnum::IN_PROGRESS,
            ),
            new Starship(
                2,
                'USS LeafyCruiser (NCC-001)',
                'Garden',
                'Jean-Luc Pickles',
                StarshipStatusEnum::COMPLETED,
            ),
            new Starship(
                3,
                'USS LeafyCruiser (NCC-001)',
                'Garden',
                'Jean-Luc Pickles',
                StarshipStatusEnum::WAITING,
            ),
        ];
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship) {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }

        return null;
    }
}