<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use app\Mail\SendBirthdayMail;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Mail;

class AutoBirthDayWish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:birthdaywish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = Enquiry::whereMonth('dob', date('m'))
        ->whereDay('dob', date('d'))
        ->get();

if ($users->count() > 0) {
foreach ($users as $user) {
   
    $data = [
        'reciepent' => $user->email,
        // 'reciepent' => 'priyaswhiteforce@gmail.com',
        'name' => $user->contact_person,
        
      ];
      
      Mail::send('email.new_birthday_template', ["data1" => $data], function ($message) use ($data) {
          $message->from('priyaswhiteforce@gmail.com', 'White-Force');
          $message->subject('Happy Birthday');
          $message->to($data['reciepent']);
      });
}
}


}
    }

   