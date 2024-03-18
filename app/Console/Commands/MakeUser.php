<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MakeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new application user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->ask('What is the new user\'s email address?');
        $name = $this->ask('What ist the new user\'s name?') ?: '';
        $password = Hash::make($this->secret('What is the new user\'s password? (blank generates a random one)', Str::random(32)));
        $generateApiKey = $this->confirm('Do you want to generate an API key for this user??');
        $sendReset = $this->confirm('Do you want to send a password reset email?');

        try {
            app('db')->beginTransaction();
            $this->validateEmail($email);
            $user = app(config('auth.providers.users.model'))->create(compact('email', 'name', 'password'));

            if($generateApiKey) {
                $token = Str::random(60);
                $user->forceFill([
                    'api_token' => hash('sha256', $token)
                ])->save();
            }

            if ($sendReset) {
                Password::sendResetLink(compact('email'));
                $this->info("Sent password reset email to {$email}");
            }

            $this->info("Created new user for email {$email}");

            if($generateApiKey) {
                $this->info("Created the following API key for this user: {$token}");
            }

            app('db')->commit();

        } catch (Exception $e) {
            $this->error($e->getMessage());
            $this->error('The user was not created');
            app('db')->rollBack();
        }

        return true;
    }

    /**
     * Determine if the given email address already exists.
     *
     * @param  string  $email
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    private function validateEmail($email)
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Email address not valid');
        }
        if (app(config('auth.providers.users.model'))->where('email', $email)->exists()) {
            throw new \InvalidArgumentException('Email address already in use');
        }
    }
}