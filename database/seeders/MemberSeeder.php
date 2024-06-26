<?php

namespace Database\Seeders;

use App\Models\Member;
use App\Models\Volunteer;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all volunteer IDs
        $volunteerIds = Volunteer::pluck('id')->toArray();

        // Current timestamp
        $timestamp = Carbon::now();

        $members = [
            ['name' => 'Qistina', 'ic_number' => '020330-05-0500',
                'address' => 'Lot 10, Jalan Mara, 15150 Kota Bharu, Kelantan',
                'phoneNo' => '0111234579'],
            ['name' => 'Ali', 'ic_number' => '950410-01-1234',
                'address' => '123, Jalan Ampang, 50450 Kuala Lumpur, Wilayah Persekutuan',
                'phoneNo' => '0123456789'],
            ['name' => 'Fatimah', 'ic_number' => '870521-14-5678',
                'address' => '456, Taman Tun Dr Ismail, 60000 Kuala Lumpur, Wilayah Persekutuan',
                'phoneNo' => '0132345678'],
            ['name' => 'Azman', 'ic_number' => '760730-08-9123',
                'address' => '789, Jalan Sultan Ismail, 50250 Kuala Lumpur, Wilayah Persekutuan',
                'phoneNo' => '0143456789'],
            ['name' => 'Siti', 'ic_number' => '910101-10-1122',
                'address' => '101, Jalan Raja Chulan, 50200 Kuala Lumpur, Wilayah Persekutuan',
                'phoneNo' => '0154567890'],
            ['name' => 'Ahmad', 'ic_number' => '850505-07-3344',
                'address' => '202, Jalan Bukit Bintang, 55100 Kuala Lumpur, Wilayah Persekutuan',
                'phoneNo' => '0165678901'],
            ['name' => 'Nurul', 'ic_number' => '930909-05-5566',
                'address' => '303, Jalan Pudu, 55100 Kuala Lumpur, Wilayah Persekutuan',
                'phoneNo' => '0176789012'],
            ['name' => 'Hafiz', 'ic_number' => '920202-02-7788',
                'address' => '404, Jalan Klang Lama, 58000 Kuala Lumpur, Wilayah Persekutuan',
                'phoneNo' => '0187890123'],
            ['name' => 'Aisyah', 'ic_number' => '900404-03-9900',
                'address' => '505, Jalan Taman Seputeh, 58000 Kuala Lumpur, Wilayah Persekutuan',
                'phoneNo' => '0198901234'],
            ['name' => 'Zul', 'ic_number' => '880707-04-1112',
                'address' => '606, Jalan Cheras, 56100 Kuala Lumpur, Wilayah Persekutuan',
                'phoneNo' => '0109012345'],
            ['name' => 'Amira', 'ic_number' => '860808-06-2233',
                'address' => '707, Jalan Ipoh, 51200 Kuala Lumpur, Wilayah Persekutuan',
                'phoneNo' => '0110123456'],
        ];

        foreach ($members as &$member) {
            // Assign a random volunteer_id to each member and set created_at to the current timestamp
            $member['volunteer_id'] = $volunteerIds[array_rand($volunteerIds)];
            $member['created_at'] = $timestamp;
        }

        DB::table('members')->insert($members);
    }
}
