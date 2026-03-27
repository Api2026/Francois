<?php

namespace App\Controller;

use App\Entity\Membership;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Premiere
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function publish(Request $request): Response
    {
        // Check if the user is an admin
        if (!$this->isAdmin($request->getUser())) {
            return new Response('Unauthorized', Response::HTTP_UNAUTHORIZED);
        }

        // Publishing logic here
        // ...

        return new Response('Published', Response::HTTP_OK);
    }

    public function viewProfile(Request $request, $userId): Response
    {
        // Check if the user is following
        if (!$this->isFollowing($request->getUser(), $userId)) {
            return new Response('Forbidden', Response::HTTP_FORBIDDEN);
        }

        // Profile viewing logic here
        // ...

        return new Response('Profile details', Response::HTTP_OK);
    }

    public function monitorMessages(Request $request): Response
    {
        // Admin monitoring logic
        if ($this->isAdmin($request->getUser())) {
            // Retrieve messages
            // Logic to get messages for monitoring
            return new Response('Monitoring messages', Response::HTTP_OK);
        }
        return new Response('Unauthorized', Response::HTTP_UNAUTHORIZED);
    }

    private function isAdmin($user): bool
    {
        // Logic to determine if user is admin
        return in_array($user, ['admin1', 'admin2']); // Example admin users
    }

    private function isFollowing($user, $userId): bool
    {
        // Logic to determine if the user is following
        return true; // Example logic
    }
}
