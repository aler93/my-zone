<?php

namespace App\Console\Commands;

use App\Models\UserSubscription;
use Illuminate\Console\Command;

class sendSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:subscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications';

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
        $select = [
            "users.email",
            "user_subscription.sent",
            "user_subscription.price_alert",
            "apartaments.price",
        ];
        $pending = UserSubscription::select($select)
                                   ->join("apartaments", "apartaments.id", "=", "user_subscription.id_apartament")
                                   ->join("users", "users.id", "=", "user_subscription.id_user")
                                   ->whereRaw("user_subscription.price_alert <= apartaments.price")
                                   ->where("sent", "=", false)
                                   ->limit(1000)
                                   ->get();

        foreach($pending as $send) {
            echo "Sending mail to " . $send->email . "\n";
            // Send mail logic here
        }

        return Command::SUCCESS;
    }
}
