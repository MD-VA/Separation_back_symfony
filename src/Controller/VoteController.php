<?php

namespace App\Controller;

use ApiPlatform\OpenApi\Model\Response as ModelResponse;
use App\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoteController extends AbstractController
{

    public function __invoke(Message $message)
    {
        $user = $this->getUser();
        $owner = $message->getOwner();
        if ($user !== $owner) {
            $message->setVotes($message->getVotes() + 1);
        }
        return $message;
    }

    // #[Route('/vote', name: 'app_vote')]
    // public function index(): Response
    // {
    //     return $this->render('vote/index.html.twig', [
    //         'controller_name' => 'VoteController',
    //     ]);
    // }
}
