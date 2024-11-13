<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanKinerja extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tanggal',
        'jam_kerja',
        'uraian',
        'target',
        'realisasi',
        'capaian',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'tanggal' => 'datetime',
        'target' => 'double',
        'realisasi' => 'double',
        'capaian' => 'double',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
