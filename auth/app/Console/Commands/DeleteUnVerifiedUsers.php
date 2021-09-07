<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteUnVerifiedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        // $this->info('Something!');
        // $name = '';
        // if ($this->confirm('Do you wish to continue?', true)) {
        //     $name = $this->ask('What is your name?');
        // }
        // $name = $this->anticipate('What is your name?', ['Taylor', ''Dayle']);
        // $password = $this->secret('What is the password?');
        // $this->info('You Have Entered Name : ' . $name);
        // $this->info('You Have Entered Password : ' . $password);
        // $defaultIndex = 1;
        // $name = $this->choice(
        //     'What is your name?',
        //     ['Taylor', 'Dayle', 'Shahin', 'Test'],
        //     $defaultIndex
        // );

        // $this->info('You Have Entered Name : ' . $name);
        // info('Command!');
        // $this->error('Something went wrong!');
        // $this->newLine(5);
        // $this->line('Display this on the screen');
        // $this->table(
        //     ['Name'],
        //     User::all(['name'])->toArray()
        // );

        User::WhereNull('email_verified_at')->delete();
        $this->info('Users Has Been Deleted!');
    }
}
