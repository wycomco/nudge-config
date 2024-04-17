# Nudge Config

## Overview

This is a small web application for managing [Nudge](https://github.com/macadmins/nudge) configurations for multiple environments.

## Alright. But why?

Assuming you are managing your Nudge config with your MDM of choice. If this MDM does not support the [Jamf JSON scheme](https://github.com/macadmins/nudge/wiki/Jamf-Pro-Guide#configuration-profile) you will need to build the mobileconfig files by hand or utilize tools like [iMazing Profile Editor](https://imazing.com/profile-editor). Now imagine the following scenarios:

- Apple releases a new [security update](https://support.apple.com/en-us/HT201222).
  - You probably want to test the release
  - After a testing period you will need to update your mobileconfig (by hand or using the Jamf interface)
  - Deploy the new mobileconfig to your clients
- Apple releases a new major macOS version
  - You need to check the compatibility of your managed devices
  - You need to make sure that Nudge does not offer this major update to incompatible devices

And now imagine you have to do this not for a single environment, but for a few dozens. And some of those environments have good reasons to stick to a specific macOS version for a bit longer than you would usually recommend. This leads to a significant effort in actively managing all those Nudge configs.

With this web application this whole process may be a set and forget.

## Screenshots

![Configurations](resources/images/screenshots/02_00_Configurations.png?raw=true "Configurations")
![Configurations Settings](resources/images/screenshots/02_10_Edit_Configuration.png?raw=true "Configuration Settings")
![Nudge Options](resources/images/screenshots/02_20_Edit_Configuration_Nudge-Options.png?raw=true "Nudge Options")
![Nudge Options: Optional Features](resources/images/screenshots/02_25_Edit_Configuration_Nudge-Options.png?raw=true "Nudge Options: Optional Features")
![Nudge Options: Update Elements](resources/images/screenshots/02_27_Edit_Configuration_Nudge-Options.png?raw=true "Nudge Options: Update Elements")

## Features

- Manage multiple Nudge configurations:
  - Adjusting all of [Nudge's preferences](https://github.com/macadmins/nudge/wiki/Preferences)
  - Defining a maximum OS version
  - Define deferral dates to ignore specific updates for a given time
  - Inherit settings from other configurations
- Define major and minor macOS versions:
  - Set a custom release date for each update
  - Set an [about update url](https://github.com/macadmins/nudge/wiki/aboutUpdateURLs) for each update, falling back to a given default
  - Automatically create localized urls for all configured locales
- Manage hardware models to define a maximum OS version for each of them

## Installation

Since Nudge Config is based on [Laravel](https://laravel.com) and [Filament](https://filamentphp.com) you find the corresponding information on how to deploy this app in the [Laravel Docs](https://laravel.com/docs/11.x/deployment).

You may seed the database with senseful default values, especially an initial configuration, macOS definitions and hardware models using the Artisan command `db:seed`:

```shell
php artisan db:seed
```

To create a first user account you may use the interactive Artisan command `make:user`:

```shell
php artisan make:user
```

**Important**: When deploying in a local testing environment, please be aware that the database seeder will automatically create a first admin account with a `admin@hostname` as user name and a default password `admin`.

## Updating

We are trying to keep the provided data for operating systems and hardware models up to date. So if you update the application you may want to use the provided seeders to update these database tables in your deployment:

```shell
php artisan db:seed UpdateSeeder --force
```

## Configuration

Beside the common options for a Laravel application there are some app specific configuration you may adjust by defining them in your `.env` file:

```env
# The locales for Nudge's UI elements and the automatically generated About Update URLs
NUDGE_LOCALES="en-us,de-de,fr-fr,es-es"

# URL for installing major macOS releases, look for actionButtonPath in Nudge wiki: https://github.com/macadmins/nudge/wiki/osVersionRequirements#actionbuttonpath---type-string-default-value-nil
NUDGE_MAJOR_ACTION_PATH="munki://detail-app_macos"

# URL for installing minor macOS releases, look for actionButtonPath in Nudge wiki: https://github.com/macadmins/nudge/wiki/osVersionRequirements#actionbuttonpath---type-string-default-value-nil
NUDGE_MINOR_ACTION_PATH="/System/Library/CoreServices/Software Update.app"

# URL to be used if no AboutUpdateUrl is given for a major macOS update
NUDGE_MAJOR_UPDATE_URL="https://www.apple.com/macos/"

# URL to be used if no AboutUpdateUrl is given for a minor macOS update
NUDGE_MINOR_UPDATE_URL="https://support.apple.com/en-us/HT201222"
```

Please make sure to rebuild the [config cache](https://laravel.com/docs/11.x/configuration#configuration-caching) after adjusting these settings:

```shell
php artisan config:clear
```

## Usage

This application is able to dynamically generate a hardware specific JSON file which may be used by Nudge. To use this file Nudge needs to be invoked using the `-json-url` argument, as described in the [Nudge Wiki](https://github.com/macadmins/nudge/wiki/Command-Line-Arguments#json-url--json-url), so please adjust your [LaunchAgent](https://github.com/macadmins/nudge/wiki/Getting-Started#launchagent) accordingly. It may look like this example:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
    <key>AssociatedBundleIdentifiers</key>
    <array>
        <string>com.github.macadmins.Nudge</string>
    </array>
    <key>Label</key>
    <string>com.github.macadmins.Nudge</string>
    <key>LimitLoadToSessionType</key>
    <array>
        <string>Aqua</string>
    </array>
    <key>ProgramArguments</key>
    <array>
        <string>/Applications/Utilities/Nudge.app/Contents/MacOS/Nudge</string>
        <string>-json-url</string>
        <string>https://nudge-config.test/macos/config/generic/model/`sysctl hw.model | awk '{ print \$2 }'`</string>
    </array>
    <key>RunAtLoad</key>
    <true/>
    <key>StartCalendarInterval</key>
    <array>
        <dict>
            <key>Minute</key>
            <integer>0</integer>
        </dict>
        <dict>
            <key>Minute</key>
            <integer>30</integer>
        </dict>
    </array>
</dict>
</plist>
```

The configuration specific JSON url may be copied using the `Copy URL` button in the Configurations table. To review the generated config for your own machine, just run the following command in your Terminal app, replacing the URL with the copied configuration URL:

```shell
curl https://nudge-config.test/macos/config/generic/model/`sysctl hw.model | awk '{ print \$2 }'` > ~/Desktop/nudge-config-test.json
```

This will generate a new file `nudge-config-test.json` on your Desktop, which may be viewed with your prefered text editor or, for example, [Mozilla Firefox](https://www.mozilla.org/firefox/).

## Contributing

Pull requests are welcome!
