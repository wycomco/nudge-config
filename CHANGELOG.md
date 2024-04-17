# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [0.3.0] - 2024-04-17

### Changed

- Enhanced the README with some more information and screenshots

## [0.2.0] - 2024-04-03

### Added

- Added a database seeder to update hardware models and operating system versions after an app update

### Changed

- Adjusted the displayed meta data for minor operating system versions
- Set the alignment of icon columns to center
- Explicitly set a date format (Y-m-d) for the release dates

### Fixed

- Prevent null values for acceptableApplicationBundleIDs and blockedApplicationBundleIDs, what has led to an error in Nudge
- Set correct attribute name for blockedApplicationBundleIDs

## [0.1.1] - 2024-03-27

### Added

- Added previously missing 13.6.3 and 13.6.4 to database seeder

## [0.1.0] - 2024-03-26

### Added

- Added a CHANGELOG to document notable changes
- Allow the definition of days before a new update gets enforced
