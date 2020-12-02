<?php

namespace App\Domain\View\Presenter\ReferenceExercise;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use App\Domain\DataInteractor\DTO\ReferenceExerciseDTO;
use App\Domain\DataInteractor\DTO\ReferenceMuscleDTO;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Contracts\View\Model\Reference\ReferenceEquipment\GetOneReferenceExerciseViewModel;
use COL\Library\Contracts\View\Model\Reference\ReferenceExercise\Nested\ReferenceExerciseEquipmentNestedModel;
use COL\Library\Contracts\View\Model\Reference\ReferenceExercise\Nested\ReferenceExerciseMuscleNestedModel;
use COL\Library\Infrastructure\Common\DTO\BaseDTOInterface;
use COL\Library\Infrastructure\Common\View\SingleObjectViewPresenterInterface;

final class GetOneReferenceExerciseViewPresenter implements SingleObjectViewPresenterInterface
{
    /**
     * @param BaseDTOInterface|ReferenceExerciseDTO $dto
     *
     * @return BaseViewModelInterface|GetOneReferenceExerciseViewModel
     */
    public function buildSingleObjectVueModel(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetOneReferenceExerciseViewModel();
        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();
        $model->equipments = $this->buildNestedEquipments($dto->getEquipments());
        $model->muscles = $this->buildNestedMuscles($dto->getMuscles());

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
            $nested->image = $equipment->getImage();

            $nestedEquipments[] = $nested;
        }

        return $nestedEquipments;
    }

    /**
     * @param ReferenceMuscleDTO[] $muscles
     *
     * @return ReferenceExerciseMuscleNestedModel
     */
    private function buildNestedMuscles(array $muscles): array
    {
        $nestedMuscles = [];
        foreach ($muscles as $muscle) {
            $nested = new ReferenceExerciseMuscleNestedModel();
            $nested->name = $muscle->getName();
            $nested->canonicalName = $muscle->getCanonicalName();
            $nested->image = $muscle->getImage();

            $nestedMuscles[] = $nested;
        }

        return $nestedMuscles;
    }
}