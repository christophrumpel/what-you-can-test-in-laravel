<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MergeAccountsCommand extends Command
{
    protected $signature = 'merge:accounts {userId} {userToBeMergedId}';

    protected $description = 'Merge two accounts';

    public function handle(): void
    {
        // Check if both users given
        $user = User::findOrFail($this->argument('userId'));
        $userToBeMerged = User::findOrFail($this->argument('userToBeMergedId'));
    }
}
