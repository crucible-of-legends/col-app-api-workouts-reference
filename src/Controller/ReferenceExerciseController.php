<?php

namespace App\Controller;

use App\Domain\UseCase\ReferenceExercise\GetManyReferenceExerciseUseCase;
use App\Domain\UseCase\ReferenceExercise\GetOneReferenceExerciseUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/api/exercises", name="workouts_reference_exercise_")
 */
final class ReferenceExerciseController extends AbstractBaseReferenceController
{
    /**
     * @Route(name="get_many", path="", methods={"GET"})
     */
    public function getMany(Request $request, GetManyReferenceExerciseUseCase $getManyReferenceExerciseUseCase): JsonResponse
    {
        return $this->buildResponse($getManyReferenceExerciseUseCase->execute(
            $this->getFormat($request),
            [],
            $this->getPageNumber($request),
            $this->getNbPerPage($request)
        ));
    }
    /**
     * @Route(name="get_one", path="/{canonicalName}", methods={"GET"})
     */
    public function getOne(Request $request, string $canonicalName, GetOneReferenceExerciseUseCase $getOneReferenceExerciseUseCase): JsonResponse
    {
        return $this->buildResponse($getOneReferenceExerciseUseCase->execute($canonicalName));
    }
}