<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardwareModel extends Model
{
    use HasFactory;

    public function maxMajorOperatingSystem()
    {
        return $this->belongsTo(MajorOperatingSystem::class, 'max_major_operating_system');
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'model_identifier' => 'array',
            'board_identifier' => 'array',
        ];
    }
}
