<?php

namespace App\Controller;

use App\Domain\UseCase\ReferenceWorkout\GetOneReferenceWorkoutUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/api/references/workouts", name="workout_")
 */
final class ReferenceWorkoutController extends AbstractBaseReferenceController
{
    /**
     * @Route(name="get_many", path="", methods={"GET"})
     */
    public function getMany(Request $request): JsonResponse
    {
        return new JsonResponse(['status' => 'ok']);
    }
    /**
     * @Route(name="get_one", path="/{canonicalName}", methods={"GET"})
     */
    public function getOne(Request $request, string $canonicalName, GetOneReferenceWorkoutUseCase $getOneReferenceWorkoutUseCase): JsonResponse
    {
        return $this->buildResponse($getOneReferenceWorkoutUseCase->execute($canonicalName));
    }
}