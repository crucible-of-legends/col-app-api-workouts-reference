<?php

namespace App\Domain\View\Presenter\ReferenceEquipment;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Contracts\View\Model\Reference\GetOneReferenceEquipmentViewModel;
use COL\Library\Infrastructure\Common\DTO\BaseDTOInterface;
use COL\Library\Infrastructure\Common\View\SingleObjectViewPresenterInterface;

final class GetOneReferenceEquipmentViewPresenter implements SingleObjectViewPresenterInterface
{
    /**
     * @param BaseDTOInterface|ReferenceEquipmentDTO $dto
     *
     * @return BaseViewModelInterface|GetOneReferenceEquipmentViewModel
     */
    public function buildSingleObjectVueModel(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetOneReferenceEquipmentViewModel();
        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();

        return $model;
    }
}