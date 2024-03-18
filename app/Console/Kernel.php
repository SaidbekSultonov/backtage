<?php

namespace App\Console;

use Modules\ForTheBuilder\Entities\ActionLogs;
use Modules\ForTheBuilder\Entities\Booking;
use Modules\ForTheBuilder\Entities\Notification_;
use Modules\ForTheBuilder\Entities\HouseFlat;
use App\Console\Commands\DeleteParsingCommand;
use App\Console\Commands\DeleteMonthlyCommand;
use App\Console\Commands\WebSocketServer;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    //        Commands\DemoCron::class,

    protected $commands = [
        DeleteParsingCommand::class,
        DeleteMonthlyCommand::class,
        WebSocketServer::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $models = Booking::orderBy('id','desc')->get();
            if (!empty($models) && count($models) > 0) {
                foreach ($models as $key => $value) {
                    if ($value->expire_dates != NULL) {
                        $json = json_decode($value->expire_dates);
                        if (isset($json[0]->date)) {
                            $today = date('Y-m-d');
                            if ($today == $json[0]->date && $value->status == 1) {
                                
                                $value->status = 0;
                                if ($value->save()) {
                                    $house_flat = HouseFlat::where('id',$value->house_flat_id)->where('status',1)->first();
                                    if (isset($house_flat) && !empty($house_flat)) {
                                        $house_flat->status = 0;
                                        $house_flat->save();
                                    }

                                    // notification
                                    $notification = new Notification_();
                                    $expire_date = json_decode($value->expire_dates);
                                    
                                    $booking_array = [
                                        'id' => $value->id,
                                        'first_name' => $value->client->first_name,
                                        'last_name' => $value->client->last_name,
                                        'middle_name' => $value->client->middle_name,
                                        'expire_dates' => strtotime(end($expire_date)->date),
                                        'updated_at' => $value->updated_at
                                    ];
                                    $notification->data = json_encode($booking_array);
                                    $notification->notifiable_id = $value->id;
                                    $notification->type = 'BookingDelete';
                                    $notification->user_id = $value->user_id;
                                    $notification->save();
                                }
                            }
                        }
                    }
                }    
            }
        })->everyMinute();

        $schedule->call(function(){

            

        })->everyMinute();
        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
