<?php

namespace App\Domain\View\Presenter\ReferenceWorkout;

use App\Domain\DataInteractor\DTO\ReferenceEquipmentDTO;
use App\Domain\DataInteractor\DTO\ReferenceExerciseInWorkoutDTO;
use App\Domain\DataInteractor\DTO\ReferenceWorkoutDTO;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Contracts\View\Model\WorkoutReference\ReferenceWorkout\Nested\ReferenceExerciseEquipmentNestedModel;
use COL\Library\Contracts\View\Model\WorkoutReference\ReferenceWorkout\GetOneReferenceWorkoutViewModel;
use COL\Library\Contracts\View\Model\WorkoutReference\ReferenceWorkout\Nested\ReferenceExerciseInWorkoutNestedModel;
use COL\Library\Infrastructure\Common\DTO\BaseDTOInterface;
use COL\Library\Infrastructure\Common\View\AbstractSingleObjectViewPresenter;

final class GetOneReferenceWorkoutViewPresenter extends AbstractSingleObjectViewPresenter
{
    /**
     * @param ReferenceWorkoutDTO $dto
     *
     * @return BaseViewModelInterface|GetOneReferenceWorkoutViewModel
     */
    public function buildSingleObjectVueModel(BaseDTOInterface $dto, ?string $displayFormat = null): BaseViewModelInterface
    {
        $model = new GetOneReferenceWorkoutViewModel();
        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();
        $model->image = $dto->getImage();
        $model->orderedExercises = $this->buildNestedExercises($dto->getOrderedExercises());

        return $model;
    }

    /**
     * @param ReferenceExerciseInWorkoutDTO[] $exercisesInWorkout
     *
     * @return ReferenceExerciseInWorkoutNestedModel[]
     */
    private function buildNestedExercises(array $exercisesInWorkout): array
    {
        $nestedExercises = [];
        foreach ($exercisesInWorkout as $exerciseInWorkout) {
            $nested = new ReferenceExerciseInWorkoutNestedModel();
            $nested->name = $exerciseInWorkout->getExercise()->getName();
            $nested->canonicalName = $exerciseInWorkout->getExercise()->getCanonicalName();
            $nested->image = $exerciseInWorkout->getExercise()->getVideo();
            $nested->position = $exerciseInWorkout->getPosition();
            $nested->equipments = $this->buildNestedEquipments($exerciseInWorkout->getExercise()->getEquipments());

            $nestedExercises[] = $nested;
        }

        return $nestedExercises;
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
}