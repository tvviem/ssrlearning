<?php
namespace App\Permissions;

use App\Permission;
use App\Role;

trait HasPermissionsTrait {
    public function roles() {
        // dd('test roles');
        return $this->belongsToMany(Role::class, 'users_roles');
    }
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
    /***
     *  we’re iterating through the roles and checking by the slug field, 
     *  if that specific role exists.
     *  Check with:
     *      $user = $request->user(); //getting the current logged in user
     *      dd($user->hasRole('admin','editor')); // and so on
     * */
    public function hasRole(...$roles) {
        foreach ($roles as $role) {
           if ($this->roles->contains('slug', $role)) {
              return true;
           }
        }
        return false;
    }

    /* Check a user maybe give permission through their roles or their permission specify*/
    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }
    // Check specify permission
    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }
    // Check permission through role
    protected function hasPermissionThroughRole($permission) {
        foreach ($permission->roles as $role){
           if($this->roles->contains($role)) {
              return true;
           }
        }
        return false;
    }
    /**
     * we want to give a set of permissions to a logged in user, here’s how we can achieve this
     * 
     */
    public function givePermissionsTo(...$permissions) {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
           return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function withdrawPermissionsTo(...$permissions) {
		$permissions = $this->getAllPermissions($permissions);
		$this->permissions()->detach($permissions);
		return $this;
    }
    // Set role to a logged in user
    public function giveRolesTo(...$roles) {
        $roles = $this->getAllRoles($roles);
        if($roles===null)
            return $this;
        // dd($roles);
        $this->roles()->saveMany($roles);
        return $this;
    }
    public function withdrawRolesTo(...$roles) {
        $roles = $this->getAllRoles($roles);
        $this->roles()->detach($roles);
        return $this;
    }
    // reset specification permission for user
    public function refreshPermissions(...$permissions) {
		$this->permissions()->detach();
        $this->givePermissionsTo($permissions);
        return $this;
    }
    // get permission from table permissions
    protected function getAllPermissions(array $permissions) {
		return Permission::whereIn('slug', $permissions)->get();
    }
    protected function getAllRoles(array $roles) {
        return Role::whereIn('slug', $roles)->get();
    }

    public function getPermissionsThroughRole() {
        return $this->roles()->with('permissions');
    }
}