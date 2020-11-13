<?php

namespace App\Domain\UseCase\ReferenceEquipment;

use App\Domain\DataInteractor\DTOProvider\ReferenceEquipmentDTOProvider;
use App\Domain\View\Presenter\ReferenceEquipment\GetManyReferenceEquipmentViewPresenter;
use COL\Library\Contracts\View\Model\Reference\GetManyReferenceEquipmentViewModel;

final class GetManyReferenceEquipmentUseCase
{
    private const DEFAULT_PAGE_NUMBER = 1;
    private const DEFAULT_NB_PER_PAGE = 50;

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
     * @return GetManyReferenceEquipmentViewModel[]
     */
    public function execute(array $criteria = [], ?int $pageNumber = null, ?int $nbPerPage = null): array
    {
        $pageNumber = $pageNumber ?? self::DEFAULT_PAGE_NUMBER;
        $nbPerPage = $nbPerPage ?? self::DEFAULT_NB_PER_PAGE;

        $nbTotalResults = $this->provider->countByCriteria($criteria);
        $results = $this->provider->getManyByCriteria($criteria, [], [], $pageNumber, $nbPerPage);

        return $this->presenter->buildMultipleObjectVueModel($results, $nbTotalResults, $pageNumber, $nbPerPage);
    }
}