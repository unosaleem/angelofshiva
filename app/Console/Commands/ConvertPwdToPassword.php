<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ConvertPwdToPassword extends Command
{
    protected $signature = 'users:convert-pwd';
    protected $description = 'Convert base64 pwd column to bcrypt password column';

    public function handle()
    {
        $users = User::whereNotNull('pwd')->get();

        foreach ($users as $user) {

            // base64 decode
            $decodedPassword = base64_decode($user->pwd);

            if ($decodedPassword !== false) {

                // bcrypt hash
                $user->password = Hash::make($decodedPassword);

                $user->save();

                $this->info("Converted User ID: {$user->id}");
            }
        }

        $this->info('All passwords converted successfully.');
    }
}
