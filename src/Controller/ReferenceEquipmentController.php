<?php

namespace App\Controller;

use App\Domain\UseCase\ReferenceEquipment\GetManyReferenceEquipmentUseCase;
use App\Domain\UseCase\ReferenceEquipment\GetOneReferenceEquipmentUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/api/workouts-reference/equipments", name="workouts_reference_equipment_")
 */
final class ReferenceEquipmentController extends AbstractBaseReferenceController
{
    /**
     * @Route(name="get_many", path="", methods={"GET"})
     */
    public function getMany(Request $request, GetManyReferenceEquipmentUseCase $getManyReferenceEquipmentUseCase): JsonResponse
    {
        return $this->buildResponse($getManyReferenceEquipmentUseCase->execute(
            $this->getFormat($request),
            [],
            $this->getPageNumber($request),
            $this->getNbPerPage($request)
        ));
    }
    /**
     * @Route(name="get_one", path="/{canonicalName}", methods={"GET"})
     */
    public function getOne(Request $request, string $canonicalName, GetOneReferenceEquipmentUseCase $getOneReferenceEquipmentUseCase): JsonResponse
    {
        return $this->buildResponse($getOneReferenceEquipmentUseCase->execute($canonicalName));
    }
}