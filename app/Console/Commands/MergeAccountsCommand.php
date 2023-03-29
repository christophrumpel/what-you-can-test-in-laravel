<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MergeAccountsCommand extends Command
{
    protected $signature = 'merge:accounts {userId?} {userToBeMergedId?}';

    protected $description = 'Merge two accounts';

    public function handle(): void
    {
        $userId = $this->argument('userId');
        $userToBeMergedId = $this->argument('userToBeMergedId');

        if (! $this->argument('userId')) {
            $userId = $this->ask('Please provide the user ID of the user you want to keep');
        }

        if (! $this->argument('userToBeMergedId')) {
            $userToBeMergedId = $this->ask('Please provide the user ID of the user you want to merge');
        }

        // Check if both users given
        $user = User::findOrFail($userId);
        $userToBeMerged = User::findOrFail($userToBeMergedId);

        // Merge products and delete the second user
        $userToBeMerged->products()->update(['user_id' => $user->id]);

        $userToBeMerged->delete();
    }
}
