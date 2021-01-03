<?php

namespace App\Controller;

use App\Domain\UseCase\ReferenceWorkout\GetManyReferenceWorkoutUseCase;
use App\Domain\UseCase\ReferenceWorkout\GetOneReferenceWorkoutUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/api/workouts", name="workouts_reference_workout_")
 */
final class ReferenceWorkoutController extends AbstractBaseReferenceController
{
    /**
     * @Route(name="get_many", path="", methods={"GET"})
     */
    public function getMany(Request $request, GetManyReferenceWorkoutUseCase $getManyReferenceWorkoutUseCase): JsonResponse
    {
        return $this->buildResponse($getManyReferenceWorkoutUseCase->execute(
            $this->getFormat($request),
            [],
            $this->getPageNumber($request),
            $this->getNbPerPage($request)
        ));
    }

    /**
     * @Route(name="get_one", path="/{canonicalName}", methods={"GET"})
     */
    public function getOne(Request $request, string $canonicalName, GetOneReferenceWorkoutUseCase $getOneReferenceWorkoutUseCase): JsonResponse
    {
        return $this->buildResponse($getOneReferenceWorkoutUseCase->execute($canonicalName));
    }
}