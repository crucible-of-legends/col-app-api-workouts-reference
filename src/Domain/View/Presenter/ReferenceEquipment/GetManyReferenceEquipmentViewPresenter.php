<?php

namespace App\Domain\View\Presenter\ReferenceEquipment;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use COL\Library\Contracts\View\Model\Reference\GetManyReferenceEquipmentViewModel;
use COL\Library\Infrastructure\Common\View\MultipleObjectViewPresenterInterface;

final class GetManyReferenceEquipmentViewPresenter implements MultipleObjectViewPresenterInterface
{
    /**
     * @param ReferenceEquipmentDTO[] $dtos
     *
     * @return GetManyReferenceEquipmentViewModel[]
     */
    public function buildMultipleObjectVueModel(array $dtos): array
    {
        $models = [];
        foreach ($dtos as $dto) {
            $models[] = $this->buildReferenceEquipmentModel($dto);
        }

        return $models;
    }

    private function buildReferenceEquipmentModel(ReferenceEquipmentDTO $dto)
    {
        $model = new GetManyReferenceEquipmentViewModel();

        $model->name = $dto->getName();

        return $model;
    }
}