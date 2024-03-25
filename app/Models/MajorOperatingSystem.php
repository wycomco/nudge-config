<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajorOperatingSystem extends Model
{
    use HasFactory;

    public function minorOperatingSystems()
    {
        return $this->hasMany(MinorOperatingSystem::class);
    }

    public function hardwareModels()
    {
        return $this->hasMany(HardwareModel::class);
    }

    public function configurations()
    {
        return $this->hasMany(Configuration::class);
    }

    public function getLatestMinorRelease(?int $deferralDays = 0): ?MinorOperatingSystem
    {
        return $this->minorOperatingSystems()
            ->where('release_date', '<=', now()->subDays($deferralDays))
            ->orderByDesc('release_date')
            ->first();
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
