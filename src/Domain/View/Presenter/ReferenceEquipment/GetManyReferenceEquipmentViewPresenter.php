<?php

namespace App\Domain\View\Presenter\ReferenceEquipment;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Contracts\View\Model\Reference\ReferenceEquipment\GetManyLargeReferenceEquipmentViewModel;
use COL\Library\Contracts\View\Model\Reference\ReferenceEquipment\GetManyMediumReferenceEquipmentViewModel;
use COL\Library\Contracts\View\Model\Reference\ReferenceEquipment\GetManySmallReferenceEquipmentViewModel;
use COL\Library\Contracts\View\Model\Reference\ReferenceEquipment\Nested\ReferenceEquipmentShopNestedModel;
use COL\Library\Infrastructure\Common\DTO\BaseDTOInterface;
use COL\Library\Infrastructure\Common\View\AbstractMultipleObjectViewPresenter;

final class GetManyReferenceEquipmentViewPresenter extends AbstractMultipleObjectViewPresenter
{
    /**
     * @param BaseDTOInterface|ReferenceEquipmentDTO $dto
     *
     * @return BaseViewModelInterface|GetManySmallReferenceEquipmentViewModel
     */
    public function buildVueModelSmallFormat(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetManySmallReferenceEquipmentViewModel();

        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();

        return $model;
    }

    /**
     * @param BaseDTOInterface|ReferenceEquipmentDTO $dto
     *
     * @return BaseViewModelInterface|GetManyMediumReferenceEquipmentViewModel
     */
    public function buildVueModelMediumFormat(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetManyMediumReferenceEquipmentViewModel();

        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();
        $model->image = $dto->getImage();

        return $model;
    }

    /**
     * @param BaseDTOInterface|ReferenceEquipmentDTO $dto
     *
     * @return BaseViewModelInterface|GetManyLargeReferenceEquipmentViewModel
     */
    public function buildVueModelLargeFormat(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetManyLargeReferenceEquipmentViewModel();

        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();
        $model->image = $dto->getImage();
        $model->shops = $this->buildNestedShops($dto->getShops());

        return $model;
    }

    private function buildNestedShops(array $shops): array
    {
        $nestedShops = [];
        foreach ($shops as $shop) {
            $nested = new ReferenceEquipmentShopNestedModel();

            $nestedShops[] = $nested;
        }

        return $nestedShops;
    }
}