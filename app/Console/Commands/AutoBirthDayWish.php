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
    // Mail::to($user->email)->send(new SendBirthdayMail($user));
    $data = [
        // 'reciepent' => $user->email,
        'reciepent' => 'priyaswhiteforce@gmail.com',
        'name' => $user->contact_person,
        
      ];
      // $email=$users->email;
      Mail::send('email.birthday_template', ["data1" => $data], function ($message) use ($data) {
          $message->from('priyaswhiteforce@gmail.com', 'White-Force');
          $message->subject('Happy Birthday');
          $message->to($data['reciepent']);
      });
}
}

// return 0;
}
    }

    // foreach ($enquiry_id as $id) {
    //     $recipients = Enquiry::where('id', $id)->first();
    
    //     $data = [
    //       'reciepent' => $recipients->email,
    //       'msg' => $temp,
          
    //     ];
    //     // $email=$users->email;
    //     Mail::send('tempView', ["data1" => $data], function ($message) use ($data) {
    //         $message->from('priyaswhiteforce@gmail.com', 'White-Force');
    //         $message->subject('Are You Looking For Vendors- Contact White Force Group');
    //         $message->to($data['reciepent'], $data['msg']);
    //     });
    // }
