<?php

namespace App\Domain\View\Presenter\ReferenceEquipment;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use COL\Library\Contracts\View\Model\Reference\GetManyReferenceEquipmentViewModel;
use COL\Library\Infrastructure\Common\View\AbstractMultipleObjectViewPresenter;

final class GetManyReferenceEquipmentViewPresenter extends AbstractMultipleObjectViewPresenter
{
    /**
     * @param ReferenceEquipmentDTO[] $dtos
     *
     * @return GetManyReferenceEquipmentViewModel[]
     */
    public function buildMultipleObjectVueModel(array $dtos, ?int $nbTotal = null, ?int $pageNumber = null, ?int $nbPerPage = null): array
    {
        $models = [];
        foreach ($dtos as $dto) {
            $models[] = $this->buildReferenceEquipmentModel($dto);
        }

        return $this->formatWithPagination($models, $nbTotal, $pageNumber, $nbPerPage);
    }

    private function buildReferenceEquipmentModel(ReferenceEquipmentDTO $dto)
    {
        $model = new GetManyReferenceEquipmentViewModel();

        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();
        $model->image = $dto->getImage();

        return $model;
    }
}