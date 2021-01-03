<?php

namespace App\Domain\UseCase\ReferenceEquipment;

use App\Domain\DataInteractor\DTOProvider\ReferenceEquipmentDTOProvider;
use App\Domain\UseCase\GetManyUseCaseInterface;
use App\Domain\View\Presenter\ReferenceEquipment\GetManyReferenceEquipmentViewPresenter;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Infrastructure\Common\Registry\DisplayFormatRegistry;

final class GetManyReferenceEquipmentUseCase implements GetManyUseCaseInterface
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
     * @return BaseViewModelInterface[]
     */
    public function execute(
        string $displayFormat,
        array $criteria = [],
        ?int $pageNumber = null,
        ?int $nbPerPage = null
    ): array
    {
        $pageNumber = $pageNumber ?? self::DEFAULT_PAGE_NUMBER;
        $nbPerPage = $nbPerPage ?? self::DEFAULT_NB_PER_PAGE;

        $selects = [];
        if (DisplayFormatRegistry::DISPLAY_FORMAT_LARGE === $displayFormat) {
            $selects = ['shop'];
        }

        return $this->presenter->buildMultipleObjectVueModel(
            $this->provider->getManyByCriteria($criteria, $selects, [], $pageNumber, $nbPerPage),
            $displayFormat,
            $this->provider->countByCriteria($criteria),
            $pageNumber,
            $nbPerPage
        );
    }
}