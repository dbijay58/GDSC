<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('bookings')->insert([
        	'customer_id' => 1,
            'lesson_date' => Carbon::today(),
            'lesson_time' => Carbon::parse('20:00:00'),
            'class_no' => 3,
            'instructor_id' => rand(1,2),
            'gcal_id' => Str::random(50),
            'calendar_sync' => (bool)rand(0,1),
            'booking_status' => Str::random(5)
        ]);
    }
}
