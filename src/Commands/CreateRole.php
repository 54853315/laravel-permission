<?php

namespace Spatie\Permission\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Contracts\Role as RoleContract;

class CreateRole extends Command
{
    protected $signature = 'permission:create-role
        {tenant_id : The Tenant Id}
        {name : The name of the role}
        {display_name : The display name of the role}
        {guard? : The name of the guard}';

    protected $description = 'Create a role';

    public function handle()
    {
        $roleClass = app(RoleContract::class);

        $role = $roleClass::create([
            'tenant_id' => $this->argument('tenant_id'),
            'name' => $this->argument('name'),
            'display_name' => $this->argument('display_name'),
            'guard_name' => $this->argument('guard'),
        ]);

        $this->info("Role `{$role->name}` created");
    }
}
