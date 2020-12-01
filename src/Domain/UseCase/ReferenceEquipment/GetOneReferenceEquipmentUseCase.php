<?php

namespace App\Domain\UseCase\ReferenceEquipment;

use App\Domain\DataInteractor\DTOProvider\ReferenceEquipmentDTOProvider;
use App\Domain\View\Presenter\ReferenceEquipment\GetOneReferenceEquipmentViewPresenter;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Contracts\View\Model\Reference\ReferenceEquipment\GetOneReferenceEquipmentViewModel;

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

    /**
     * @param string $canonicalName
     *
     * @return BaseViewModelInterface|GetOneReferenceEquipmentViewModel
     */
    public function execute(string $canonicalName): ?GetOneReferenceEquipmentViewModel
    {
        $viewModel = $this->provider->getOneByCriteria(['canonicalName' => $canonicalName], ['shop']);
        if (null === $viewModel) {
            return null;
        }

        return $this->presenter->buildSingleObjectVueModel($viewModel);
    }
}