<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class Configuration extends Model
{
    use HasFactory;

    public function parentConfiguration()
    {
        return $this->belongsTo(Configuration::class, 'parent_configuration');
    }

    public function maxMajorOperatingSystem()
    {
        return $this->belongsTo(MajorOperatingSystem::class, 'max_major_operating_system');
    }

    protected function hasNudgeConfig(): Attribute {
        return new Attribute(
            get: fn (mixed $value, array $attributes) => (
                !is_null($attributes['nudge_config']) && count(json_decode($attributes['nudge_config'])) > 0
            )
        );
    }

    public function resolveNudgeConfig(?HardwareModel $hardwareModel = null): array
    {
        $hardwareMaxOS = $hardwareModel->maxMajorOperatingSystem()->get()->first();

        if(!is_null($hardwareMaxOS)) {
            $hardwareMaxOS = $hardwareMaxOS->getLatestMinorRelease($this->effective_minor_update_deferral_days);
        }

        $configMaxOS = $this->effective_max_major_operating_system;

        if(!is_null($configMaxOS)) {
            $configMaxOS = $configMaxOS->getLatestMinorRelease($this->effective_minor_update_deferral_days);
        }

        $maxOS = $hardwareMaxOS;

        if (!is_null($configMaxOS) && (is_null($maxOS) || version_compare($configMaxOS->version, $maxOS->version) == -1)) {
            $maxOS = $configMaxOS;
        }

        if(is_null($maxOS)) {
            $maxOS = MajorOperatingSystem::orderBy('version', 'desc')->first()->getLatestMinorRelease($this->effective_minor_update_deferral_days);
        }

        $nudgeConfig = $this->effective_nudge_config;

        $nudgeConfig['osVersionRequirements'] = $this->generateOsVersionRequirement($maxOS);

        return $nudgeConfig;
    }

    private function generateOsVersionRequirement(MinorOperatingSystem $targetVersion): array{

        $minorRequirement['actionButtonPath'] = Config::get('nudge.minor.action_button_path');
        $minorRequirement['majorUpgradeAppPath'] = $targetVersion->majorOperatingSystem->major_upgrade_app_path;
        $minorRequirement['requiredInstallationDate'] = $targetVersion->release_date->addDays($this->effective_minor_update_deferral_days)->format('Y-m-d\\TH:i:s\\Z');
        $minorRequirement['requiredMinimumOSVersion'] = $targetVersion->version;
        $minorRequirement['targetedOSVersionsRule'] = $targetVersion->majorOperatingSystem->version;

        $minorRequirement['aboutUpdateURLs'] = [];

        $minorUpdateUrl = $targetVersion->about_update_url;

        if(is_null($minorUpdateUrl) || $minorUpdateUrl == '') {
            $minorUpdateUrl = Config::get('nudge.minor.about_update_url');
        }

        foreach(Config::get('nudge.locales') as $locale) {
            $minorRequirement['aboutUpdateURLs'][] = [
                '_language' => explode('-', $locale)[0],
                'aboutUpdateURL' => $this->localizeAppleUrl($minorUpdateUrl, $locale),
            ];
        }

        $majorRequirement['actionButtonPath'] = Config::get('nudge.major.action_button_path');
        $majorRequirement['majorUpgradeAppPath'] = $targetVersion->majorOperatingSystem->major_upgrade_app_path;
        $majorRequirement['requiredInstallationDate'] = $targetVersion->release_date->addDays($this->effective_major_update_deferral_days)->format('Y-m-d\\TH:i:s\\Z');
        $majorRequirement['requiredMinimumOSVersion'] = $targetVersion->version;
        $majorRequirement['targetedOSVersionsRule'] = "default";

        $majorRequirement['aboutUpdateURLs'] = [];

        $majorUpdateUrl = $targetVersion->majorOperatingSystem->about_update_url;
        
        if(is_null($majorUpdateUrl) || $majorUpdateUrl == '') {
            $majorUpdateUrl = Config::get('nudge.major.about_update_url');
        }

        foreach(Config::get('nudge.locales') as $locale) {
            $majorRequirement['aboutUpdateURLs'][] = [
                '_language' => explode('-', $locale)[0],
                'aboutUpdateURL' => $this->localizeAppleUrl($majorUpdateUrl, $locale),
            ];
        }

        return [
            $minorRequirement,
            $majorRequirement,
        ];
    }

    private function localizeAppleUrl($url, $locale) {
        if(preg_match('/\/[a-zA-Z]{2}-[a-zA-Z]{2}\//', $url) === 1)
            return preg_replace('/\/[a-zA-Z]{2}-[a-zA-Z]{2}\//', '/'.$locale.'/', $url);

        if(preg_match('/\/[a-zA-Z]{2}\//', $url) === 1)
            return preg_replace('/\/[a-zA-Z]{2}\//', '/'.explode('-', $locale)[0].'/', $url);
        
        if(str_contains($url, 'apple.com/'))
            return str_replace('apple.com/', 'apple.com/'.explode('-', $locale)[0].'/', $url);

        return $url;
    }

    protected function effectiveNudgeConfig(): Attribute {
        return new Attribute(
            get: function (mixed $value, array $attributes) {

                $ownConfig = json_decode($attributes['nudge_config']);

                if(is_null($ownConfig)) {
                    $ownConfig = [];
                }

                $config = [];
                foreach($ownConfig as $item) {
                    if(isset($item->type) && isset($item->data)) {
                        $config[$item->type] = $item->data;
                    }
                }

                $parentConfig = [];
                if(!is_null($attributes['parent_configuration'])) {
                    $parentConfig = Configuration::find($attributes['parent_configuration'])->effective_nudge_config;
                }

                $config = array_merge($parentConfig, $config);

                return $config;
           }
        );
    }

    protected function effectiveMinorUpdateDeferralDays(): Attribute {
        return new Attribute(
            get: function (mixed $value, array $attributes) {
                $deferralDays = $attributes['minor_update_deferral_days'];

                if(!is_null($deferralDays)) {
                    return $deferralDays;
                }

                if(is_null($attributes['parent_configuration'])) {
                    return 0;
                }

                return Configuration::find($attributes['parent_configuration'])->effective_minor_update_deferral_days;
            }
        );
    }

    protected function effectiveMajorUpdateDeferralDays(): Attribute {
        return new Attribute(
            get: function (mixed $value, array $attributes) {
                $deferralDays = $attributes['major_update_deferral_days'];

                if(!is_null($deferralDays)) {
                    return $deferralDays;
                }

                if(is_null($attributes['parent_configuration'])) {
                    return 0;
                }

                return Configuration::find($attributes['parent_configuration'])->effective_major_update_deferral_days;
            }
        );
    }

    protected function effectiveMaxMajorOperatingSystem(): Attribute {

        return new Attribute(
            get: function (mixed $value, array $attributes) {
                $maxOs = $attributes['max_major_operating_system'];

                if(!is_null($maxOs)) {
                    return MajorOperatingSystem::find($maxOs);
                }

                if(is_null($attributes['parent_configuration'])) {
                    return null;
                }

                return Configuration::find($attributes['parent_configuration'])->effective_max_major_operating_system;
            }
        );
    }

    public function generateConfig()
    {
        $builderJson = $this->nudge_config;

        if(is_null($builderJson))
        {
            return null;
        }

        $config = [];

        foreach ($builderJson as $item) {
            //$config[$item->type] = $item->data;
        }
        
        return $config;
    }

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'has_nudge_config',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'nudge_config' => 'array',
        ];
    }
}
