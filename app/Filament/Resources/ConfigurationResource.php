<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Config;
use App\Filament\Resources\ConfigurationResource\Pages;
use App\Filament\Resources\ConfigurationResource\RelationManagers;
use App\Models\Configuration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Arr;
use Webbingbrasil\FilamentCopyActions\Tables\Actions\CopyAction;

class ConfigurationResource extends Resource
{
    protected static ?string $model = Configuration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->autofocus(),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(10),
                Select::make('parent_configuration')
                    ->label('Parent Configuration')
                    ->relationship('parentConfiguration', 'name', ignoreRecord: true)
                    ->searchable()
                    ->preload(),
                Select::make('max_major_operating_system')
                    ->label('Maximum OS')
                    ->relationship('maxMajorOperatingSystem', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('version')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('major_upgrade_app_path')
                            ->required(),
                    ]),
                TextInput::make('major_update_deferral_days')
                    ->label('Defer Major Updates')
                    ->helperText("We will not offer major updates for this many days after they are released")
                    ->integer()
                    ->postfix('days'),
                TextInput::make('minor_update_deferral_days')
                    ->label('Defer Minor Updates')
                    ->helperText("We will not offer minor updates for this many days after they are released")
                    ->integer()
                    ->postfix('days'),
                TextInput::make('major_update_user_deferral_days')
                    ->label('Allow Deferral for Major Updates')
                    ->helperText("The installation of major updates will be enforced after this many days")
                    ->integer()
                    ->postfix('days'),
                TextInput::make('minor_update_user_deferral_days')
                    ->label('Allow Deferral for Minor Updates')
                    ->helperText("The installation of minor updates will be enforced after this many days")
                    ->integer()
                    ->postfix('days'),
                Section::make('Advanced Settings')
                    ->description('Use this section to configure the Nudge settings for this configuration.')
                    ->schema([
                        Forms\Components\Builder::make('nudge_config')
                            ->label('Nudge Configuration')
                            ->blocks([
                                Block::make('optionalFeatures')
                                    ->label('Optional Features')
                                    ->schema([
                                        Checkbox::make('acceptableAssertionUsage')
                                            ->label('Acceptable Assertion Usage'),
                                        Checkbox::make('acceptableCameraUsage')
                                            ->label('Acceptable Camera Usage'),
                                        Checkbox::make('acceptableScreenSharingUsage')
                                            ->label('Acceptable Screen Sharing Usage'),
                                        Checkbox::make('aggressiveUserExperience')
                                            ->label('Aggressive User Experience'),
                                        Checkbox::make('aggressiveUserFullScreenExperience')
                                            ->label('Aggressive User Full Screen Experience'),
                                        Checkbox::make('asynchronousSoftwareUpdate')
                                            ->label('Asynchronous Software Update'),
                                        Checkbox::make('attemptToBlockApplicationLaunches')
                                            ->label('Attempt to Block Application Launches'),
                                        Checkbox::make('attemptToFetchMajorUpgrade')
                                            ->label('Attempt to Fetch Major Upgrade'),
                                        Checkbox::make('enforceMinorUpdates')
                                            ->label('Enforce Minor Updates'),
                                        Checkbox::make('terminateApplicationsOnLaunch')
                                            ->label('Terminate Applications on Launch'),
                                        Repeater::make('acceptableApplicationBundleIDs')
                                            ->label('Acceptable Application Bundle IDs')
                                            ->simple(
                                                TextInput::make('acceptable_application_bundle_id')
                                                    ->label('Acceptable Application Bundle ID')
                                                    ->maxLength(255),
                                            )
                                            ->addActionLabel('Add App Bundle ID'),
                                        Repeater::make('blocked_application_bundle_ids')
                                            ->label('Blocked Application Bundle IDs')
                                            ->simple(
                                                TextInput::make('blockedApplicationBundleIDs')
                                                    ->label('Blocked Application Bundle ID')
                                                    ->maxLength(255),
                                            )
                                            ->addActionLabel('Add App Bundle ID'),
                                        
                                    ])
                                    ->columns(2)
                                    ->maxItems(1),
                                Block::make('userExperience')
                                    ->label('User Experience')
                                    ->schema([
                                        Checkbox::make('allowGracePeriods')
                                            ->label('Allow Grace Periods'),
                                        Checkbox::make('allowLaterDeferralButton')
                                            ->label('Allow Later Deferral Button'),
                                        Checkbox::make('allowUserQuitDeferrals')
                                            ->label('Allow User Quit Deferrals'),
                                        TextInput::make('allowedDeferrals')
                                            ->label('Allowed Deferrals')
                                            ->integer()
                                            ->default(1000000),
                                        TextInput::make('allowedDeferralsUntilForcedSecondaryQuitButton')
                                            ->label('Allowed Deferrals Until Forced Secondary Quit Button')
                                            ->integer()
                                            ->default(14),
                                        TextInput::make('approachingRefreshCycle')
                                            ->label('Approaching Refresh Cycle')
                                            ->integer()
                                            ->default(6000),
                                        TextInput::make('approachingWindowTime')
                                            ->label('Approaching Window Time')
                                            ->integer()
                                            ->default(72),
                                        Select::make('calendarDeferralUnit')
                                            ->label('Calendar Deferral Unit')
                                            ->options([
                                                'imminentWindowTime' => 'Imminent Window Time',
                                                'approachingWindowTime' => 'Approaching Window Time',
                                            ])
                                            ->default('imminentWindowTime'),
                                        TextInput::make('elapsedRefreshCycle')
                                            ->label('Elapsed Refresh Cycle')
                                            ->integer()
                                            ->default(300),
                                        TextInput::make('gracePeriodInstallDelay')
                                            ->label('Grace Period Install Delay')
                                            ->integer()
                                            ->default(23),
                                        TextInput::make('gracePeriodLaunchDelay')
                                            ->label('Grace Period Launch Delay')
                                            ->integer()
                                            ->default(1),
                                        TextInput::make('gracePeriodPath')
                                            ->label('Grace Period Path')
                                            ->default('/private/var/db/.AppleSetupDone'),
                                        TextInput::make('imminentRefreshCycle')
                                            ->label('Imminent Refresh Cycle')
                                            ->integer()
                                            ->default(600),
                                        TextInput::make('imminentWindowTime')
                                            ->label('Imminent Window Time')
                                            ->integer()
                                            ->default(24),
                                        TextInput::make('initialRefreshCycle')
                                            ->label('Initial Refresh Cycle')
                                            ->integer()
                                            ->default(18000),
                                        TextInput::make('launchAgentIdentifier')
                                            ->label('Launch Agent Identifier')
                                            ->default('com.github.macadmins.Nudge'),
                                        Checkbox::make('loadLaunchAgent')
                                            ->label('Load Launch Agent'),
                                        TextInput::make('maxRandomDelayInSeconds')
                                            ->label('Max Random Delay in Seconds')
                                            ->integer()
                                            ->default(1200),
                                        Checkbox::make('noTimers')
                                            ->label('No Timers'),
                                        TextInput::make('nudgeRefreshCycle')
                                            ->label('Nudge Refresh Cycle')
                                            ->integer()
                                            ->default(60),
                                        Checkbox::make('randomDelay')
                                            ->label('Random Delay'),
                                    ])
                                    ->columns(2)
                                    ->maxItems(1),
                                Block::make('userInterface')
                                    ->label('User Interface')
                                    ->schema([
                                        TextInput::make('actionButtonPath')
                                            ->label('Action Button Path')
                                            ->default('/System/Library/CoreServices/Software Update.app'),
                                        Select::make('fallbackLanguage')
                                            ->label('Fallback Language')
                                            ->options(function() {
                                                $locales = [];
                                                foreach (Config::get('nudge.locales') as $locale) {
                                                    $locales[explode('-', $locale)[0]] = explode('-', $locale)[0];
                                                }
                                                return $locales;
                                            }),
                                        Checkbox::make('forceFallbackLanguage')
                                            ->label('Force Fallback Language'),
                                        Checkbox::make('forceScreenShotIcon')
                                            ->label('Force Screen Shot Icon'),
                                        TextInput::make('iconDarkPath')
                                            ->label('Icon Dark Path'),
                                        TextInput::make('iconLightPath')
                                            ->label('Icon Light Path'),
                                        TextInput::make('screenShotDarkPath')
                                            ->label('Screen Shot Dark Path'),
                                        TextInput::make('screenShotLightPath')
                                            ->label('Screen Shot Light Path'),
                                        Checkbox::make('showDeferralCount')
                                            ->label('Show Deferral Count'),
                                        Checkbox::make('simpleMode')
                                            ->label('Simple Mode'),
                                        Checkbox::make('singleQuitButton')
                                            ->label('Single Quit Button'),
                                        Repeater::make('updateElements')
                                            ->label('Update Elements')
                                            ->schema([
                                                Select::make('_language')
                                                    ->label('Language')
                                                    ->options(function() {
                                                        $locales = [];
                                                        foreach (Config::get('nudge.locales') as $locale) {
                                                            $locales[explode('-', $locale)[0]] = explode('-', $locale)[0];
                                                        }
                                                        return $locales;
                                                    })
                                                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                                                    ->required(),
                                                TextInput::make('actionButtonText')
                                                    ->label('Action Button Text')
                                                    ->maxLength(255),
                                                TextInput::make('customDeferralButtonText')
                                                    ->label('Custom Deferral Button Text')
                                                    ->maxLength(255),
                                                TextInput::make('customDeferralDropdownText')
                                                    ->label('Custom Deferral Dropdown Text')
                                                    ->maxLength(255),
                                                TextInput::make('informationButtonText')
                                                    ->label('Information Button Text')
                                                    ->maxLength(255),
                                                TextInput::make('mainContentHeader')
                                                    ->label('Main Content Header')
                                                    ->maxLength(255),
                                                TextInput::make('mainContentNote')
                                                    ->label('Main Content Note')
                                                    ->maxLength(255),
                                                TextInput::make('mainContentSubHeader')
                                                    ->label('Main Content Sub Header')
                                                    ->maxLength(255),
                                                Textarea::make('mainContentText')
                                                    ->label('Main Content Text'),
                                                TextInput::make('mainHeader')
                                                    ->label('Main Header')
                                                    ->maxLength(255),
                                                TextInput::make('oneDayDeferralButtonText')
                                                    ->label('One Day Deferral Button Text')
                                                    ->maxLength(255),
                                                TextInput::make('oneHourDeferralButtonText')
                                                    ->label('One Hour Deferral Button Text')
                                                    ->maxLength(255),
                                                TextInput::make('primaryQuitButtonText')
                                                    ->label('Primary Quit Button Text')
                                                    ->maxLength(255),
                                                TextInput::make('secondaryQuitButtonText')
                                                    ->label('Secondary Quit Button Text')
                                                    ->maxLength(255),
                                                TextInput::make('subHeader')
                                                    ->label('Sub Header')
                                                    ->maxLength(255),
                                            ])
                                            ->grid(2)
                                            ->columnStart(1)
                                            ->columnSpan(2)
                                            ->maxItems(count(Config::get('nudge.locales')))
                                    ])
                                    ->columns(2)
                                    ->maxItems(1),

                            ])
                            ->blockNumbers(false)
                            ->reorderable(false),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('maxMajorOperatingSystem.name')
                    ->label('Maximum OS')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('parent_configuration_exists')->exists('parentConfiguration')
                    ->label('has Parent Config')
                    ->boolean()
                    ->trueColor('info')
                    ->falseColor('gray'),
                Tables\Columns\IconColumn::make('has_nudge_config')
                    ->label('Nudge Configuration')
                    ->boolean()
                    ->trueColor('info')
                    ->falseColor('gray'),
                    
            ])
            ->filters([
                //
            ])
            ->defaultSort('name', 'asc')
            ->persistSortInSession()
            ->actions([
                CopyAction::make()
                    ->label('Copy URL')
                    ->copyable(fn ($record) => str_replace('REPLACE_ME', '`sysctl hw.model | awk \'{ print \$2 }\'`', route('config', ['config' => $record->slug, 'model' => 'REPLACE_ME'])))
                    ->icon('heroicon-s-link'),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConfigurations::route('/'),
            'create' => Pages\CreateConfiguration::route('/create'),
            'edit' => Pages\EditConfiguration::route('/{record}/edit'),
        ];
    }
}
