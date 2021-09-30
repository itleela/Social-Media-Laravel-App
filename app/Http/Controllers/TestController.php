<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TestEnrollment;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Notification;

class TestController extends Controller
{
    public function sendTestNotification()
    {
            $user = User::first();

            $enrollmentData = [
                'body' => 'You are received a new test notification',
                'enrollmentText' => 'You are allowed to enroll',
                'url' => url('http://127.0.0.1:8000/user/home'),
                'thankyou' => 'You are 14 days to enroll'
            ];

           // $user->notify(new TestEnrollment($enrollmentData));
            Notification::send($user, new TestEnrollment($enrollmentData));
    }
}
