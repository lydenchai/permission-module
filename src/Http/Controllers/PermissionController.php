<?php

namespace ModLydenule\Permission\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Lyden\Permission\Repositories\PermissionRepositoryInterface;

class PermissionController extends Controller
{
    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->permissionRepository->all()
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'user_id' => 'required',
            'start_At' => 'required',
            'end_At' => 'required|after:start_At',
            'type' => 'required',
            'description' => 'nullable',
        ]);

        $data = $request->only([
            'user_id',
            'start_At',
            'end_At',
            'type',
            'description',
        ]);

        return response()->json(
            [
                'message' => 'Permission created',
                'data' => $this->permissionRepository->save($data)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');
        return response()->json([
            'data' => $this->permissionRepository->find($id)
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');

        $request->validate([
            'user_id' => 'required',
            'start_At' => 'required',
            'end_At' => 'required|after:start_At',
            'type' => 'required',
            'description' => 'nullable',
        ]);

        $data = $request->only([
            'user_id',
            'start_At',
            'end_At',
            'type',
            'description',
        ]);

        return response()->json([
            'message' => "Permission updated",
            'data' => $this->permissionRepository->update($id, $data)
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $this->permissionRepository->delete($id);
        return response()->json([
            'message' => 'Permission deleted'
        ], Response::HTTP_NO_CONTENT);
    }
}
