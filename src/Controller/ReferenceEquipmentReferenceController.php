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
        $page = $request->query->get('page', null);
        $nbPerPage = $request->query->get('nbPerPage', null);

        return $this->buildResponse($getManyReferenceEquipmentUseCase->execute([], $page, $nbPerPage));
    }
    /**
     * @Route(name="get_one", path="/{canonicalName}", methods={"GET"})
     */
    public function getOne(Request $request, string $canonicalName): JsonResponse
    {
        return new JsonResponse(['status' => $canonicalName]);
    }
}