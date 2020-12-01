<?php

namespace App\Controller;

use App\Domain\UseCase\ReferenceEquipment\GetManyReferenceEquipmentUseCase;
use App\Domain\UseCase\ReferenceEquipment\GetOneReferenceEquipmentUseCase;
use COL\Library\Infrastructure\Common\View\MultipleObjectViewPresenterInterface;
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
        $format = $request->query->get('format', MultipleObjectViewPresenterInterface::DISPLAY_FORMAT_SMALL);
        $page = $request->query->get('page', null);
        $nbPerPage = $request->query->get('nbPerPage', null);

        return $this->buildResponse($getManyReferenceEquipmentUseCase->execute($format, [], $page, $nbPerPage));
    }
    /**
     * @Route(name="get_one", path="/{canonicalName}", methods={"GET"})
     */
    public function getOne(Request $request, string $canonicalName, GetOneReferenceEquipmentUseCase $getOneReferenceEquipmentUseCase): JsonResponse
    {
        return $this->buildResponse($getOneReferenceEquipmentUseCase->execute($canonicalName));
    }
}