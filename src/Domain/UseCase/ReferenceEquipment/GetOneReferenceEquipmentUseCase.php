<?php

namespace App\Domain\UseCase\ReferenceEquipment;

use App\Domain\DataInteractor\DTOProvider\ReferenceEquipmentDTOProvider;
use App\Domain\View\Presenter\ReferenceEquipment\GetOneReferenceEquipmentViewPresenter;
use COL\Library\Contracts\View\Model\Reference\GetOneReferenceEquipmentViewModel;

final class GetOneReferenceEquipmentUseCase
{
    private ReferenceEquipmentDTOProvider $provider;
    private GetOneReferenceEquipmentViewPresenter $presenter;

    public function __construct(
        ReferenceEquipmentDTOProvider $provider,
        GetOneReferenceEquipmentViewPresenter $presenter
    )
    {
        $this->provider = $provider;
        $this->presenter = $presenter;
    }

    public function execute(string $canonicalName): GetOneReferenceEquipmentViewModel
    {
        return $this->presenter->buildSingleObjectVueModel($this->provider->getOneByCriteria(['canonicalName' => $canonicalName]));
    }
}