<?php

namespace Spatie\Permission\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Contracts\Permission as PermissionContract;

class CreatePermission extends Command
{
    protected $signature = 'permission:create-permission 
                {tenant_id : The Tenant Id}
                {name : The name of the permission}
                {display_name : The display name of the permission} 
                {guard? : The name of the guard}';

    protected $description = 'Create a permission';

    public function handle()
    {
        $permissionClass = app(PermissionContract::class);

        $permission = $permissionClass::create([
            'tenant_id' => $this->argument('tenant_id'),
            'name' => $this->argument('name'),
            'display_name' => $this->argument('display_name'),
            'guard_name' => $this->argument('guard'),
        ]);

        $this->info("Permission `{$permission->name}` created");
    }
}
