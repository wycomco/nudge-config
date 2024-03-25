<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Action Button Paths
    |--------------------------------------------------------------------------
    |
    | Which paths should be used for the action button in the Nudge.
    |
    */

    'major' => [
        'action_button_path' => env('NUDGE_MAJOR_ACTION_PATH', '/System/Library/CoreServices/Software Update.app'),
        'about_update_url' => env('NUDGE_MAJOR_UPDATE_URL', 'https://www.apple.com/macos/'),
    ],

    'minor' => [
        'action_button_path' => env('NUDGE_MINOR_ACTION_PATH', '/System/Library/CoreServices/Software Update.app'),
        'about_update_url' => env('NUDGE_MINOR_UPDATE_URL', 'https://support.apple.com/en-us/HT201222'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Languages
    |--------------------------------------------------------------------------
    |
    | Determine the languages for the Nudge preference items.
    |
    */

    'locales' => explode(',', env('NUDGE_LOCALES', 'en-us')),

];
