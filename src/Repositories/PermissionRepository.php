<?php

namespace Lyden\Permission\Repositories;

use Lyden\Permission\Entities\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function all()
    {
        return Permission::latest()->get();
    }

    public function save(array $data)
    {
        return Permission::create($data);
    }

    public function find($id)
    {
        return Permission::findOrFail($id);
    }

    public function update($id, array $newData)
    {
        return Permission::whereId($id)->update($newData);
    }

    public function delete($id)
    {
        Permission::destroy($id);
    }
}
