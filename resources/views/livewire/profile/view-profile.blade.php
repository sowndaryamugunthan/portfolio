<div style="max-width: 600px; margin: auto; padding-top: 40px;">
    <h2>{{ Auth::user()->profile->full_name }}</h2>

    <ul style="list-style: none; padding: 0; font-size: 16px;">
        <li><strong>Email:</strong> {{ Auth::user()->profile->email }}</li>
        <li><strong>Mobile:</strong> {{ Auth::user()->profile->mobile ?? '-' }}</li>
        <li><strong>Gender:</strong> {{ Auth::user()->profile->gender ?? '-' }}</li>
        <li><strong>DOB:</strong> {{ Auth::user()->profile->dob ?? '-' }}</li>
        <li><strong>Education:</strong> {{ Auth::user()->profile->education ?? '-' }}</li>
        <li><strong>Profession:</strong> {{ Auth::user()->profile->profession ?? '-' }}</li>
        <li><strong>Family Details:</strong> {{ Auth::user()->profile->family_details ?? '-' }}</li>
        <li><strong>Partner Preferences:</strong> {{ Auth::user()->profile->partner_preferences ?? '-' }}</li>
    </ul>

    <a href="/matches" style="display: inline-block; margin-top: 20px; text-decoration: none; color: #4CAF50;">
        ← Back to Matches
    </a>
</div>
