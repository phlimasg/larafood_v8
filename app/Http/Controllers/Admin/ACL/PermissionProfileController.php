<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Profile;

class PermissionProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->permission = $permission;
        $this->profile = $profile;
    }
    public function permissions($id)
    {

        if(!$profile = $this->profile->find($id))
            return redirect()->back();
        
        
        
        return view('admin.pages.profiles.permissions.index',[
            'permissions' => $profile->permissions()->paginate()
        ]);
    }
}
