<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 3: switch-case and match Expression [6 marks]
 *
 * @author     [SUNDRA EVANS]
 * @student    [ENE212-0148/2023]
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       [03/04/2026]
 */

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Day of Week Classifier
// ══════════════════════════════════════════════════════════════
// Given $day (integer 1–7, where 1=Monday):
// Use switch-case to print the day name.
// Group Saturday and Sunday under "Weekend".
// All weekdays print their name and "— Lecture day".
// Remember: break is NOT optional. Missing break = fall-through.

$day = 3; // change this to test all cases

switch ($day) {
    case 1:
        echo "Monday — Lecture day";
        break;
    case 2:
        echo "Tuesday — Lecture day";
        break;
    case 3:
        echo "Wednesday — Lecture day";
        break;
    case 4:
        echo "Thursday — Lecture day";
        break;
    case 5:
        echo "Friday — Lecture day";
        break;
    case 6:
    case 7:
        echo "Weekend";
        break;
    default:
        echo "Invalid day";
        break;
}

echo "<br>";
echo "<br>";

// ══════════════════════════════════════════════════════════════
// EXERCISE B — HTTP Status Code Explainer
// ══════════════════════════════════════════════════════════════
// Given $status_code, use switch-case to explain it:
//   200 → "OK — request succeeded"
//   301 → "Moved Permanently — resource relocated"
//   400 → "Bad Request — client error"
//   401 → "Unauthorized — authentication required"
//   403 → "Forbidden — access denied"
//   404 → "Not Found — resource missing"
//   500 → "Internal Server Error — server fault"
// default → "Unknown status code"

$status_code = 200; // change this to test different status codes

switch ($status_code) {
    case 200:
        echo "OK: request succeeded";
        break;
    case 301:
        echo "Moved Permanently: resource relocated";
        break;
    case 400:
        echo "Bad Request: client error";
        break;
    case 401:
        echo "Unauthorized: authentication required";
        break;
    case 403:
        echo "Forbidden: access denied";
        break;
    case 404:
        echo "Not Found: resource missing";
        break;
    case 500:
        echo "Internal Server Error: server fault";
        break;
    default:
        echo "Unknown status code";
        break;
}

echo "<br>";
echo "<br>";

// ══════════════════════════════════════════════════════════════
// EXERCISE C — PHP 8 match Expression
// ══════════════════════════════════════════════════════════════
// Rewrite Exercise B using PHP 8 match instead of switch-case.
// Note: match uses STRICT comparison (===). No break needed.
// Observe the difference in syntax and behaviour.


$status_code = 500;

$explanation = match ($status_code) {
    200 => "OK: Request succeeded.",
    301 => "Moved Permanently: resource relocated.",
    400 => "Bad Request: client error.",
    401 => "Unauthorized: authentication required.",
    403 => "Forbidden: access denied.",
    404 => "Not Found: resource missing.",
    500 => "Internal Server Error: server fault.",
    default => "Unknown Status: Code not recognized.",
};

echo $explanation;


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Rewrite comparison
// ══════════════════════════════════════════════════════════════
// In your PDF report, answer:
// 1. What is the key difference between switch (==) and match (===)?
// 2. Give one example where this difference changes the output.
// 3. When would you prefer switch over match, and why?
