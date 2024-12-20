<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\UnitKerja;
use App\Models\DetailPegawai;
use App\Models\LaporanKinerja;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function detailPegawai()
    {
        return $this->hasOne(DetailPegawai::class);
    }

    public function laporanKinerja(): HasMany
    {
        return $this->hasMany(LaporanKinerja::class);
    }

    public function unitKerja () : BelongsTo
    {
        return $this->belongsTo(UnitKerja::class);
    }

    public function laporanKinerjas()
    {
        return $this->belongsToMany(LaporanKinerja::class, 'laporan_kinerja_user');
    }
}
