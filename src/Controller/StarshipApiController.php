<?php   

namespace App\Controller;

use App\Model\Starship;
use Psr\Log\LoggerInterface;
use App\Repository\StarshipRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(StarshipRepository $repository):Response
    {
        $starships = $repository->findAll();
        
    return $this->json($starships);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, StarshipRepository $repository) : Response
    {
        $starship = $repository->find($id);

        if(!$starship) {

            throw $this->createNotFoundException('Starship not found');
        }

        return $this->json($starship);
    }
}