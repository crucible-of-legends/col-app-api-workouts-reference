<?php

namespace App\Domain\View\Presenter\ReferenceWorkout;

use App\Domain\DataInteractor\DTO\ReferenceExerciseInWorkoutDTO;
use App\Domain\DataInteractor\DTO\ReferenceWorkoutDTO;
use COL\Library\Contracts\View\Model\BaseViewModelInterface;
use COL\Library\Contracts\View\Model\WorkoutReference\ReferenceWorkout\GetManyLargeReferenceWorkoutViewModel;
use COL\Library\Contracts\View\Model\WorkoutReference\ReferenceWorkout\GetManyMediumReferenceWorkoutViewModel;
use COL\Library\Contracts\View\Model\WorkoutReference\ReferenceWorkout\GetManySmallReferenceWorkoutViewModel;
use COL\Library\Contracts\View\Model\WorkoutReference\ReferenceWorkout\Nested\ReferenceExerciseInManyWorkoutNestedModel;
use COL\Library\Infrastructure\Common\DTO\BaseDTOInterface;
use COL\Library\Infrastructure\Common\View\AbstractMultipleObjectViewPresenter;

final class GetManyReferenceWorkoutViewPresenter extends AbstractMultipleObjectViewPresenter
{
    /**
     * @param ReferenceWorkoutDTO $dto
     *
     * @return BaseViewModelInterface|GetManySmallReferenceWorkoutViewModel
     */
    public function buildVueModelSmallFormat(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetManySmallReferenceWorkoutViewModel();
        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();

        return $model;
    }

    /**
     * @param ReferenceWorkoutDTO $dto
     *
     * @return BaseViewModelInterface|GetManyMediumReferenceWorkoutViewModel
     */
    public function buildVueModelMediumFormat(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetManyMediumReferenceWorkoutViewModel();
        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();
        $model->image = $dto->getImage();

        return $model;
    }

    /**
     * @param ReferenceWorkoutDTO $dto
     *
     * @return BaseViewModelInterface|GetManyLargeReferenceWorkoutViewModel
     */
    public function buildVueModelLargeFormat(BaseDTOInterface $dto): BaseViewModelInterface
    {
        $model = new GetManyLargeReferenceWorkoutViewModel();
        $model->name = $dto->getName();
        $model->canonicalName = $dto->getCanonicalName();
        $model->image = $dto->getImage();
        $model->orderedExercises = $this->buildNestedExercises($dto->getOrderedExercises());

        return $model;
    }

    /**
     * @param ReferenceExerciseInWorkoutDTO[] $exercisesInWorkout
     *
     * @return ReferenceExerciseInManyWorkoutNestedModel[]
     */
    private function buildNestedExercises(array $exercisesInWorkout): array
    {
        $nestedExercises = [];
        foreach ($exercisesInWorkout as $exerciseInWorkout) {
            $nested = new ReferenceExerciseInManyWorkoutNestedModel();
            $nested->name = $exerciseInWorkout->getExercise()->getName();
            $nested->canonicalName = $exerciseInWorkout->getExercise()->getCanonicalName();
            $nested->image = $exerciseInWorkout->getExercise()->getVideo();
            $nested->position = $exerciseInWorkout->getPosition();

            $nestedExercises[] = $nested;
        }

        return $nestedExercises;
    }
}