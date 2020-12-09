<?php

namespace App\Controller;

use COL\Library\Infrastructure\Common\Controller\ApiResponseTrait;
use COL\Library\Infrastructure\Common\Registry\DisplayFormatRegistry;
use COL\Library\Infrastructure\Common\View\MultipleObjectViewPresenterInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractBaseReferenceController
{
    use ApiResponseTrait;

    public function getFormat(Request $request): string
    {
        return $request->query->get('format', DisplayFormatRegistry::DISPLAY_FORMAT_SMALL);
    }

    public function getPageNumber(Request $request): int
    {
        return $request->query->get('page', MultipleObjectViewPresenterInterface::DEFAULT_PAGE_NUMBER);
    }

    public function getNbPerPage(Request $request): int
    {
        return $request->query->get('nbPerPage', MultipleObjectViewPresenterInterface::DEFAULT_NB_PER_PAGE);
    }
}