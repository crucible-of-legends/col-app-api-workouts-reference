<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(path="/api/references/modules", name="module_")
 */
class ReferenceModuleController extends AbstractBaseController
{
    /**
     * @Route(name="get_many", path="", methods={"GET"})
     */
    public function getMany(Request $request): JsonResponse
    {
        return new JsonResponse(['status' => 'ok']);
    }
    /**
     * @Route(name="get_one", path="/{canonicalName}", methods={"GET"})
     */
    public function getOne(Request $request, string $canonicalName): JsonResponse
    {
        return new JsonResponse(['status' => $canonicalName]);
    }
}