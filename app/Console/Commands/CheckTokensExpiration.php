<?php

namespace App\Console\Commands;

use App\Models\Token;
use Illuminate\Console\Command;

class CheckTokensExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-tokens-expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tokens = Token::query()->get();
        $this->info('Checking tokens expiration...');

        foreach ($tokens as $token) {
            $token->delete();
            $this->info('Token deleted: ' . $token->token);
        }

    }
}
