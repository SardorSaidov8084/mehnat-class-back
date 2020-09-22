<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (\Illuminate\Support\Facades\Schema::hasTable('permissions')){
            /**
             * Users permissions
             */
            $parent = Permission::firstOrCreate([
                'name'  => 'Пользователь',
            ]);
            Permission::firstOrCreate([
                'name'  => 'Создать пользователя',
                'slug'  => 'users.create',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Обновить пользователя',
                'slug'  => 'users.update',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Показать пользователя',
                'slug'  => 'users.show',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Изменить пользователя',
                'slug'  => 'users.edit',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Показать всех пользователей',
                'slug'  => 'users.index',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Удалить пользователя',
                'slug'  => 'users.delete',
                'parent_id' => $parent->id
            ]);
            /**
             * Permissions permissions
             */
            $parent = Permission::firstOrCreate([
                'name'  => 'Разрешения',
            ]);
            Permission::firstOrCreate([
                'name'  => 'Показать все разрешения',
                'slug'  => 'permissions.index',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Создать разрешение',
                'slug'  => 'permissions.create',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Обновить разрешение',
                'slug'  => 'permissions.update',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Изменить разрешение',
                'slug'  => 'permissions.edit',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Показать разрешение',
                'slug'  => 'permissions.show',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Удалить разрешение',
                'slug'  => 'permissions.delete',
                'parent_id' => $parent->id
            ]);
            /**

            /**
             * Roles permissions
             */
            $parent = Permission::firstOrCreate([
                'name'  => 'Роли',
            ]);
            Permission::firstOrCreate([
                'name'  => 'Показать все роли',
                'slug'  => 'roles.index',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Создать роль',
                'slug'  => 'roles.create',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Изменить роль',
                'slug'  => 'roles.edit',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Обновить роль',
                'slug'  => 'roles.update',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Показать роль',
                'slug'  => 'roles.show',
                'parent_id' => $parent->id
            ]);
            Permission::firstOrCreate([
                'name'  => 'Удалить роль',
                'slug'  => 'roles.delete',
                'parent_id' => $parent->id
            ]);
    	}
    }
}
