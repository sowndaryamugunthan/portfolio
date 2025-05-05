<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function save(Request $request)
    {
        $data = $request->json()->all();

        if (isset($data['answers'])) {
        $answers = $data['answers'];

        $profile = new Profile();
        $profile->full_name = $answers[0] ?? '';
        $profile->gender = $answers[1] ?? '';
        $profile->dob = $answers[2] ?? '';
        $profile->education = $answers[3] ?? '';
        $profile->profession = $answers[4] ?? '';
        $profile->mobile = $answers[5] ?? '';
        $profile->email = $answers[6] ?? '';
        $profile->family_details = $answers[7] ?? '';
        $profile->partner_preferences = $answers[8] ?? '';
        $profile->save();

        return response()->json('Profile Saved Successfully!');
    } else {
        return response()->json('No answers received!', 400);
    }
}
}
