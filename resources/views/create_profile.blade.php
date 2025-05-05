<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Profile - Profile Match</title>
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>

    <div class="container">
        <h2>Create Your Profile</h2>

        <div id="chatbox">
            <div id="messages"></div>

            <div id="input-area">
                <input type="text" id="user-input" placeholder="Type your answer..." autofocus>
                <button onclick="sendMessage()">Send</button>
            </div>
        </div>

        <div id="otp-section" style="display: none;">
            <h3>Verify your Mobile and Email</h3>
            <input type="text" id="mobile" placeholder="Enter Mobile Number"><br><br>
            <input type="email" id="email" placeholder="Enter Email Address"><br><br>
            <button onclick="sendOTP()">Send OTP</button>
        </div>

        <div id="otp-verify" style="display: none;">
            <input type="text" id="entered-otp" placeholder="Enter OTP">
            <button onclick="verifyOTP()">Verify OTP</button>
        </div>

    </div>

    <script src="/js/script.js"></script>

</body>
</html>
