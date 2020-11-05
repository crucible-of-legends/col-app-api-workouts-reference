<?php

namespace App\Domain\UseCase\ReferenceEquipment;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use App\Domain\DataInteractor\DTOProvider\ReferenceEquipmentDTOProvider;
use App\Domain\View\Presenter\ReferenceEquipment\GetManyReferenceEquipmentViewPresenter;

final class GetManyReferenceEquipmentUseCase
{
    private ReferenceEquipmentDTOProvider $provider;
    private GetManyReferenceEquipmentViewPresenter $presenter;

    public function __construct(
        ReferenceEquipmentDTOProvider $provider,
        GetManyReferenceEquipmentViewPresenter $presenter
    )
    {
        $this->provider = $provider;
        $this->presenter = $presenter;
    }

    /**
     * @return ReferenceEquipmentDTO[]
     */
    public function execute(): array
    {
        return $this->presenter->buildMultipleObjectVueModel($this->provider->getManyByCriteria());
    }
}