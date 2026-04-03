<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 1: Simple if and if-else — Warm-Up Exercises [5 marks]
 *
 * @author     [SUNDRA EVANS]
 * @student    [ENE212-0148/2023]
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       [03/04/2026]
 */

// ══════════════════════════════════════════════════════════════
// EXERCISE A — Temperature Alert System
// ══════════════════════════════════════════════════════════════
// Declare $temperature = 39.2
// Use separate if statements (not if-else) to print:
//   "Normal"            if temp is between 36.1 and 37.5 inclusive
//   "Fever"             if temp > 37.5
//   "Hypothermia Warning" if temp < 36.1
// Test with: 36.8, 39.2, 34.5 — screenshot each

$temperature = 36.8;
echo "Temperature: $temperature °C<br>";
if ($temperature >= 36.1 && $temperature <= 37.5) {
    echo "Normal<br>";
}
if ($temperature > 37.5) {
    echo "Fever<br>";
}
if ($temperature < 36.1) {
    echo "Hypothermia Warning<br>";
}

echo "<br>";

// ══════════════════════════════════════════════════════════════
// EXERCISE B — Even or Odd
// ══════════════════════════════════════════════════════════════
// Declare $number = 47
// Use if-else to print "$number is EVEN" or "$number is ODD"
// Also check divisibility by 3, by 5, and by both 3 and 5 — one line each

$number = 47;

// Even or Odd
if ($number % 2 == 0) {
    echo "$number is EVEN<br>";
} else {
    echo "$number is ODD<br>";
}

// Divisible by 3
if ($number % 3 == 0) {
    echo "$number is divisible by 3<br>";
} else {
    echo "$number is NOT divisible by 3<br>";
}

// Divisible by 5
if ($number % 5 == 0) {
    echo "$number is divisible by 5<br>";
} else {
    echo "$number is NOT divisible by 5<br>";
}

// Divisible by both 3 and 5
if ($number % 3 == 0 && $number % 5 == 0) {
    echo "$number is divisible by BOTH 3 and 5<br>";
} else {
    echo "$number is NOT divisible by BOTH 3 and 5<br>";
}

echo "<br>";

// ══════════════════════════════════════════════════════════════
// EXERCISE C — Comparison Chain
// ══════════════════════════════════════════════════════════════
// Run this code EXACTLY as written.
// Record all six outputs in your report and explain each result.

$x = 10; $y = "10"; $z = 10.0;

var_dump($x == $y);   // A: ?
var_dump($x === $y);  // B: ?
var_dump($x == $z);   // C: ?
var_dump($x === $z);  // D: ?
var_dump($y === $z);  // E: ?
var_dump($x <=> $y);  // F: spaceship — what type? what value?

echo "<br>";
echo "<br>";

// Your explanation of each result goes in your PDF report (not here).


// ══════════════════════════════════════════════════════════════
// EXERCISE D — Null & Default Values
// ══════════════════════════════════════════════════════════════
// Run this code as written, then extend it as instructed below.

$username = null;
$display  = $username ?? "Guest";
echo "Welcome, $display<br>";

echo "<br>";

// Chained null coalescing
$config_val = null;
$env_val    = null;
$default    = "system_default";
$result     = $config_val ?? $env_val ?? $default;
echo "Config: $result<br>";

echo "<br>";

// TODO: Add one more chained ?? example of your own and explain it in your report.
$input_name = null;
$cookie_name = null;
$session_name = "Mwenda";
$final_name = $input_name ?? $cookie_name ?? $session_name ?? "Anonymous";
echo "User: $final_name<br>";
