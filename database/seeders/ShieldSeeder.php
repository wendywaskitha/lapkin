<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_laporan::kinerja","view_any_laporan::kinerja","create_laporan::kinerja","update_laporan::kinerja","restore_laporan::kinerja","restore_any_laporan::kinerja","replicate_laporan::kinerja","reorder_laporan::kinerja","delete_laporan::kinerja","delete_any_laporan::kinerja","force_delete_laporan::kinerja","force_delete_any_laporan::kinerja","view_bidang","view_any_bidang","create_bidang","update_bidang","restore_bidang","restore_any_bidang","replicate_bidang","reorder_bidang","delete_bidang","delete_any_bidang","force_delete_bidang","force_delete_any_bidang","view_eselon","view_any_eselon","create_eselon","update_eselon","restore_eselon","restore_any_eselon","replicate_eselon","reorder_eselon","delete_eselon","delete_any_eselon","force_delete_eselon","force_delete_any_eselon","view_jabatan","view_any_jabatan","create_jabatan","update_jabatan","restore_jabatan","restore_any_jabatan","replicate_jabatan","reorder_jabatan","delete_jabatan","delete_any_jabatan","force_delete_jabatan","force_delete_any_jabatan","view_pangkat","view_any_pangkat","create_pangkat","update_pangkat","restore_pangkat","restore_any_pangkat","replicate_pangkat","reorder_pangkat","delete_pangkat","delete_any_pangkat","force_delete_pangkat","force_delete_any_pangkat","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_seksi","view_any_seksi","create_seksi","update_seksi","restore_seksi","restore_any_seksi","replicate_seksi","reorder_seksi","delete_seksi","delete_any_seksi","force_delete_seksi","force_delete_any_seksi","view_stpjm","view_any_stpjm","create_stpjm","update_stpjm","restore_stpjm","restore_any_stpjm","replicate_stpjm","reorder_stpjm","delete_stpjm","delete_any_stpjm","force_delete_stpjm","force_delete_any_stpjm","view_tanda::tangan","view_any_tanda::tangan","create_tanda::tangan","update_tanda::tangan","restore_tanda::tangan","restore_any_tanda::tangan","replicate_tanda::tangan","reorder_tanda::tangan","delete_tanda::tangan","delete_any_tanda::tangan","force_delete_tanda::tangan","force_delete_any_tanda::tangan","view_unit::kerja","view_any_unit::kerja","create_unit::kerja","update_unit::kerja","restore_unit::kerja","restore_any_unit::kerja","replicate_unit::kerja","reorder_unit::kerja","delete_unit::kerja","delete_any_unit::kerja","force_delete_unit::kerja","force_delete_any_unit::kerja","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user"]},{"name":"pegawai","guard_name":"web","permissions":["view_laporan::kinerja","view_any_laporan::kinerja","create_laporan::kinerja","update_laporan::kinerja","restore_laporan::kinerja","restore_any_laporan::kinerja","replicate_laporan::kinerja","reorder_laporan::kinerja","delete_laporan::kinerja","delete_any_laporan::kinerja","force_delete_laporan::kinerja","force_delete_any_laporan::kinerja"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
