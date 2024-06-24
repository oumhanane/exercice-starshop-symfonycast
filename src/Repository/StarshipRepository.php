<?php   

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;
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
                'under construction',
            ),
            new Starship(
                2,
                'USS LeafyCruiser (NCC-001)',
                'Garden',
                'Jean-Luc Pickles',
                'under construction',
            ),
            new Starship(
                3,
                'USS LeafyCruiser (NCC-001)',
                'Garden',
                'Jean-Luc Pickles',
                'under construction',
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