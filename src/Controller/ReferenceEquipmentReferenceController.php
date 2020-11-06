<?php

namespace App\Controller;

use App\Domain\UseCase\ReferenceEquipment\GetManyReferenceEquipmentUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/api/references/equipments", name="equipment_")
 */
final class ReferenceEquipmentReferenceController extends AbstractBaseReferenceController
{
    /**
     * @Route(name="get_many", path="", methods={"GET"})
     */
    public function getMany(Request $request, GetManyReferenceEquipmentUseCase $getManyReferenceEquipmentUseCase): JsonResponse
    {
        return $this->buildResponse($getManyReferenceEquipmentUseCase->execute());
    }
    /**
     * @Route(name="get_one", path="/{canonicalName}", methods={"GET"})
     */
    public function getOne(Request $request, string $canonicalName): JsonResponse
    {
        return new JsonResponse(['status' => $canonicalName]);
    }
}