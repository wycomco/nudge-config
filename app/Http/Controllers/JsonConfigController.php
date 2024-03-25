<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\HardwareModel;
use App\Nudge\Config;

use function Pest\version;

class JsonConfigController extends Controller
{
    public function show(Configuration $config, String $model_identifier)
    {
        $hardwareModel = HardwareModel::whereJsonContains('model_identifier', $model_identifier)->first();

        if(is_null($hardwareModel)) {
            abort(404);
        }

        $nudgeConfig = $config->resolveNudgeConfig($hardwareModel);

        return response()->json(
            data: $nudgeConfig,
            headers: ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            options: JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
    }
}
