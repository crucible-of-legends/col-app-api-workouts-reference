<?php

namespace App\Domain\View\Presenter\ReferenceEquipment;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use App\Domain\DataInteractor\DTO\ReferenceShopDTO;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Contracts\View\Model\WorkoutReference\ReferenceEquipment\GetOneReferenceEquipmentViewModel;
use COL\Library\Contracts\View\Model\WorkoutReference\ReferenceEquipment\Nested\ReferenceEquipmentShopNestedModel;
use COL\Library\Infrastructure\Common\DTO\BaseDTOInterface;
use COL\Library\Infrastructure\Common\View\AbstractSingleObjectViewPresenter;
use COL\Library\Infrastructure\Common\View\SingleObjectViewPresenterInterface;

final class GetOneReferenceEquipmentViewPresenter extends AbstractSingleObjectViewPresenter
{
    /**
     * @param BaseDTOInterface|ReferenceEquipmentDTO $dto
     *
     * @return BaseViewModelInterface|GetOneReferenceEquipmentViewModel
     */
    public function buildSingleObjectVueModel(BaseDTOInterface $dto, ?string $displayFormat = null): BaseViewModelInterface
    {
        $model = new GetOneReferenceEquipmentViewModel();
        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();
        $model->image = $dto->getImage();
        $model->shops = $this->buildNestedShops($dto->getShops());

        return $model;
    }

    /**
     * @param ReferenceShopDTO[] $shops
     *
     * @return ReferenceEquipmentShopNestedModel[]
     */
    private function buildNestedShops(array $shops): array
    {
        $nestedShops = [];
        foreach ($shops as $shop) {
            $nested = new ReferenceEquipmentShopNestedModel();

            $nested->shopName = $shop->getName();
            $nested->shopLogo = $shop->getLogo();
            $nested->shopUrl = $shop->getUrl();

            $nestedShops[] = $nested;
        }

        return $nestedShops;
    }
}