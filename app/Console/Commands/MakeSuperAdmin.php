<?php

namespace App\Console\Commands;

use App\Models\Common\Superadmin;
use Illuminate\Console\Command;

class MakeSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new superadmin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        if (Superadmin::where('email', $email)->exists()) {
            $this->error('A staff with that email already exists');
            return;
        }
        $password = $this->secret('What is the password?');

        if ($this->confirm('Are you sure you want to create this user?')) {
            $user = Superadmin::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
            ]);
            $this->info('Staff user created successfully');
        } else {
            $this->info('Staff user not created');
        }
    }
}
