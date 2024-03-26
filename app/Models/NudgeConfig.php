<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NudgeConfig extends Model
{
    use HasFactory;

    var $optionalFeatures = [
        "acceptableApplicationBundleIDs" => [],
        "acceptableAssertionUsage" => false,
        "acceptableCameraUsage" => false,
        "acceptableScreenSharingUsage" => true,
        "aggressiveUserExperience" => true,
        "aggressiveUserFullScreenExperience" => true,
        "asynchronousSoftwareUpdate" => true,
        "attemptToBlockApplicationLaunches" => false,
        "attemptToFetchMajorUpgrade" => false,
        "blockedApplicationBundleIDs" => [],
        "enforceMinorUpdates" => true,
        "terminateApplicationsOnLaunch" => false
    ];

    var $osVersionRequirements = [
        "aboutUpdateURL_disabled" => "https://support.apple.com/en-us/HT201222",
        "aboutUpdateURLs" => [
            [
                "_language" => "en",
                "aboutUpdateURL" => "https://support.apple.com/en-us/HT201222"
            ],
            [
                "_language" => "es",
                "aboutUpdateURL" => "https://support.apple.com/es-es/HT201222"
            ],
            [
                "_language" => "fr",
                "aboutUpdateURL" => "https://support.apple.com/fr-fr/HT201222"
            ],
            [
                "_language" => "de",
                "aboutUpdateURL" => "https://support.apple.com/de-de/HT201222"
            ]
        ],
        "actionButtonPath" => "munki://detail-app_macos",
        "majorUpgradeAppPath" => "",
        "requiredInstallationDate" => "T18:00:00Z",
        "requiredMinimumOSVersion" => "",
        "targetedOSVersionsRule" => "default"
    ];

    var $userExperience = [
        "allowGracePeriods" => false,
        "allowLaterDeferralButton" => true,
        "allowUserQuitDeferrals" => true,
        "allowedDeferrals" => 1000000,
        "allowedDeferralsUntilForcedSecondaryQuitButton" => 14,
        "approachingRefreshCycle" => 6000,
        "approachingWindowTime" => 72,
        "calendarDeferralUnit" => "imminentWindowTime",
        "elapsedRefreshCycle" => 300,
        "gracePeriodInstallDelay" => 23,
        "gracePeriodLaunchDelay" => 1,
        "gracePeriodPath" => "/private/var/db/.AppleSetupDone",
        "imminentRefreshCycle" => 600,
        "imminentWindowTime" => 24,
        "initialRefreshCycle" => 18000,
        "launchAgentIdentifier" => "com.github.macadmins.Nudge",
        "loadLaunchAgent" => false,
        "maxRandomDelayInSeconds" => 1200,
        "noTimers" => false,
        "nudgeRefreshCycle" => 60,
        "randomDelay" => false
    ];

    var $userInterface = [
        "actionButtonPath" => "munki://detail-app_macos",
        "fallbackLanguage" => "en",
        "forceFallbackLanguage" => false,
        "forceScreenShotIcon" => false,
        "iconDarkPath" => "/somewhere/logoDark.png",
        "iconLightPath" => "/somewhere/logoLight.png",
        "screenShotDarkPath" => "/somewhere/screenShotDark.png",
        "screenShotLightPath" => "/somewhere/screenShotLight.png",
        "showDeferralCount" => true,
        "simpleMode" => false,
        "singleQuitButton" => false,
        "updateElements" => [
            [
                "_language" => "en",
                "actionButtonText" => "Update Device",
                "customDeferralButtonText" => "Custom",
                "customDeferralDropdownText" => "Defer",
                "informationButtonText" => "More Info",
                "mainContentHeader" => "Your device will restart during this update",
                "mainContentNote" => "Important Notes",
                "mainContentSubHeader" => "Updates can take around 60 minutes to complete",
                "mainContentText" => "A fully up-to-date device is required to ensure that IT can accurately protect your device.\n\nIf you do not update your device, you may lose access to some items necessary for your day-to-day tasks.\n\nTo begin the update, simply click on the Update Device button and follow the provided steps.",
                "mainHeader" => "Your device requires a security update",
                "oneDayDeferralButtonText" => "One Day",
                "oneHourDeferralButtonText" => "One Hour",
                "primaryQuitButtonText" => "Later",
                "secondaryQuitButtonText" => "I understand",
                "subHeader" => "A friendly reminder from your wycomco IT team"
            ],
            [
                "_language" => "es",
                "actionButtonText" => "Actualizar dispositivo",
                "informationButtonText" => "Más información",
                "mainContentHeader" => "Su dispositivo se reiniciará durante esta actualización",
                "mainContentNote" => "Notas importantes",
                "mainContentSubHeader" => "Las actualizaciones pueden tardar unos 60 minutos en completarse",
                "mainContentText" => "Se requiere un dispositivo completamente actualizado para garantizar que IT pueda proteger su dispositivo con precisión.\n\nSi no actualiza su dispositivo, es posible que pierda el acceso a algunos elementos necesarios para sus tareas diarias.\n\nPara comenzar la actualización, simplemente haga clic en el botón Actualizar dispositivo y siga los pasos proporcionados.",
                "mainHeader" => "Tu dispositivo requiere una actualización de seguridad",
                "primaryQuitButtonText" => "Más tarde",
                "secondaryQuitButtonText" => "Entiendo",
                "subHeader" => "Un recordatorio amistoso de su equipo de IT wycomco"
            ],
            [
                "_language" => "fr",
                "actionButtonText" => "Mettre à jour l'appareil",
                "informationButtonText" => "Plus d'informations",
                "mainContentHeader" => "Votre appareil redémarrera pendant cette mise à jour",
                "mainContentNote" => "Notes Importantes",
                "mainContentSubHeader" => "Les mises à jour peuvent prendre environ 60 minutes.",
                "mainContentText" => "Un appareil entièrement à jour est nécessaire pour garantir que le service informatique puisse protéger votre appareil efficacement.\n\n Si vous ne mettez pas à jour votre appareil, vous risquez de perdre l'accès à certains outils nécessaires à vos tâches quotidiennes.\n\nPour commencer la mise à jour, cliquez simplement sur le bouton Mettre à jour le périphérique et suivez les étapes fournies.",
                "mainHeader" => "Votre appareil nécessite une mise à jour de sécurité.",
                "primaryQuitButtonText" => "Plus tard",
                "secondaryQuitButtonText" => "Je comprends",
                "subHeader" => "Un rappel amical de votre équipe informatique wycomco"
            ],
            [
                "_language" => "de",
                "actionButtonText" => "Gerät aktualisieren",
                "informationButtonText" => "Mehr Informationen",
                "mainContentHeader" => "Ihr Gerät wird während dieses Updates neu gestartet",
                "mainContentNote" => "Wichtige Hinweise",
                "mainContentSubHeader" => "Aktualisierungen können ca. 60 Minuten dauern.",
                "mainContentText" => "Ein vollständig aktualisiertes Gerät ist erforderlich, um sicherzustellen, dass die IT-Abteilung Ihr Gerät effektiv schützen kann.\n\nWenn Sie Ihr Gerät nicht aktualisieren, verlieren Sie möglicherweise den Zugriff auf einige Werkzeuge, die Sie für Ihre täglichen Aufgaben benötigen.\n\nUm das Update zu starten, klicken Sie auf die Schaltfläche Gerät aktualisieren und befolgen Sie die angegebenen Schritte.",
                "mainHeader" => "Ihr Gerät benötigt ein Sicherheitsupdate",
                "primaryQuitButtonText" => "Später",
                "secondaryQuitButtonText" => "Ich verstehe",
                "subHeader" => "Eine freundliche Erinnerung von Ihrem wycomco-IT-Team"
            ]
        ]
    ];


}