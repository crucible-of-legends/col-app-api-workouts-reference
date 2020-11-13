<?php

namespace App\Domain\UseCase\ReferenceExercise;

use App\Domain\DataInteractor\DTOProvider\ReferenceExerciseDTOProvider;
use App\Domain\UseCase\GetManyUserCaseInterface;
use App\Domain\View\Presenter\ReferenceExercise\GetManyReferenceExerciseViewPresenter;
use COL\Library\Contracts\View\Model\Reference\GetManyReferenceExerciseViewModel;

final class GetManyReferenceExerciseUseCase implements GetManyUserCaseInterface
{

    private const DEFAULT_PAGE_NUMBER = 1;
    private const DEFAULT_NB_PER_PAGE = 50;

    private ReferenceExerciseDTOProvider $provider;
    private GetManyReferenceExerciseViewPresenter $presenter;

    public function __construct(
        ReferenceExerciseDTOProvider $provider,
        GetManyReferenceExerciseViewPresenter $presenter
    )
    {
        $this->provider = $provider;
        $this->presenter = $presenter;
    }

    /**
     * @return GetManyReferenceExerciseViewModel[]
     */
    public function execute(array $criteria = [], ?int $pageNumber = null, ?int $nbPerPage = null): array
    {
        $pageNumber = $pageNumber ?? self::DEFAULT_PAGE_NUMBER;
        $nbPerPage = $nbPerPage ?? self::DEFAULT_NB_PER_PAGE;

        return $this->presenter->buildMultipleObjectVueModel(
            $this->provider->getManyByCriteria($criteria, [], [], $pageNumber, $nbPerPage),
            $this->provider->countByCriteria($criteria),
            $pageNumber,
            $nbPerPage
        );
    }
}