<?php

namespace App\Domain\View\Presenter\ReferenceExercise;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use App\Domain\DataInteractor\DTO\ReferenceExerciseDTO;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Contracts\View\Model\Reference\ReferenceExercise\GetManyLargeReferenceExerciseViewModel;
use COL\Library\Contracts\View\Model\Reference\ReferenceExercise\GetManyMediumReferenceExerciseViewModel;
use COL\Library\Contracts\View\Model\Reference\ReferenceExercise\GetManySmallReferenceExerciseViewModel;
use COL\Library\Contracts\View\Model\Reference\ReferenceExercise\Nested\ReferenceExerciseEquipmentNestedModel;
use COL\Library\Infrastructure\Common\DTO\BaseDTOInterface;
use COL\Library\Infrastructure\Common\View\AbstractMultipleObjectViewPresenter;

final class GetManyReferenceExerciseViewPresenter extends AbstractMultipleObjectViewPresenter
{
    /**
     * @param BaseDTOInterface|ReferenceExerciseDTO $dto
     *
     * @return BaseViewModelInterface|GetManySmallReferenceExerciseViewModel
     */
    public function buildVueModelSmallFormat(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetManySmallReferenceExerciseViewModel();

        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();

        return $model;
    }

    /**
     * @param BaseDTOInterface|ReferenceExerciseDTO $dto
     *
     * @return BaseViewModelInterface|GetManyMediumReferenceExerciseViewModel
     */
    public function buildVueModelMediumFormat(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetManyMediumReferenceExerciseViewModel();

        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();
        $model->video = $dto->getVideo();

        return $model;
    }

    /**
     * @param BaseDTOInterface|ReferenceExerciseDTO $dto
     *
     * @return BaseViewModelInterface|GetManyLargeReferenceExerciseViewModel
     */
    public function buildVueModelLargeFormat(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetManyLargeReferenceExerciseViewModel();

        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();
        $model->video = $dto->getVideo();
        $model->equipments = $this->buildNestedEquipments($dto->getReferenceEquipments());


        return $model;
    }

    /**
     * @param ReferenceEquipmentDTO[] $equipments
     *
     * @return ReferenceExerciseEquipmentNestedModel[]
     */
    private function buildNestedEquipments(array $equipments): array
    {
        $nestedEquipments = [];
        foreach ($equipments as $equipment) {
            $nested = new ReferenceExerciseEquipmentNestedModel();
            $nested->name = $equipment->getName();
            $nested->canonicalName = $equipment->getCanonicalName();

            $nestedEquipments[] = $nested;
        }

        return $nestedEquipments;
    }
}