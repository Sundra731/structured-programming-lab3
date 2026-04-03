<?php
/**
 * ICS 2371 — Lab 3: Control Structures I
 * Task 2: JKUAT Grade Classification System [8 marks]
 *
 * IMPORTANT: You must complete pseudocode AND flowchart in your PDF
 * report BEFORE writing any code below. Marks are awarded for all
 * three components: pseudocode, flowchart, and working code.
 *
 * @author     [SUNDRA EVANS]
 * @student    [ENE212-0148/2023]
 * @lab        Lab 3 of 14
 * @unit       ICS 2371
 * @date       [03/04/2026]
 */

// ── Test Data Set A (change values to run other test sets) ─────────────────
$name  = "Sundra Evans";
$cat1  = 0;  // out of 10
$cat2  = 0;  // out of 10
$cat3  = 0;  // out of 10
$cat4  = 0;  // out of 10
$exam  = 15; // out of 60

// ── Grade Rules (implement using if-elseif-else, ordered highest first) ────
// A  (Distinction):    Total >= 70
// B+ (Credit Upper):   Total >= 65
// B  (Credit Lower):   Total >= 60
// C+ (Pass Upper):     Total >= 55
// C  (Pass Lower):     Total >= 50
// D  (Marginal Pass):  Total >= 40
// E  (Fail):           Total <  40

// ── Eligibility Rule (implement using nested if) ───────────────────────────
// Must have attended at least 3 of 4 CATs (CAT score > 0 counts as attended)
// AND exam score >= 20
// Otherwise: "DISQUALIFIED — Exam conditions not met"

// ── Supplementary Rule (implement using ternary) ──────────────────────────
// If grade is D: "Eligible for Supplementary Exam"
// Otherwise:     "Not eligible for supplementary"

// ── STEP 1: Compute total ─────────────────────────────────────────────────
$total = $cat1 + $cat2 + $cat3 + $cat4 + $exam;


// ── STEP 2: Count CATs attended ───────────────────────────────────────────
$cats_attended = 0;
if ($cat1 > 0) $cats_attended++;
if ($cat2 > 0) $cats_attended++;
if ($cat3 > 0) $cats_attended++;
if ($cat4 > 0) $cats_attended++;


// ── STEP 3: Eligibility check (nested if) ─────────────────────────────────
$eligible      = 'Disqualified';
$grade         = 'N/A';
$description   = 'DISQUALIFIED';
$remark        = 'Exam conditions not met';
$supplementary = 'Not eligible for supplementary';

if ($cats_attended >= 3 && $exam >= 20) {
    $eligible = 'Eligible';
    // Grade using if-elseif-else, highest first
    if ($total >= 70) {
        $grade = 'A';   $description = 'Distinction';
    } elseif ($total >= 65) {
        $grade = 'B+';  $description = 'Credit Upper';
    } elseif ($total >= 60) {
        $grade = 'B';   $description = 'Credit Lower';
    } elseif ($total >= 55) {
        $grade = 'C+';  $description = 'Pass Upper';
    } elseif ($total >= 50) {
        $grade = 'C';   $description = 'Pass Lower';
    } elseif ($total >= 40) {
        $grade = 'D';   $description = 'Marginal Pass';
    } else {
        $grade = 'E';   $description = 'Fail';
    }

    $supplementary = ($grade === 'D')
            ? 'Eligible for Supplementary Exam'
            : 'Not eligible for supplementary';

        $status = "Grade {$grade} — {$description}";
        $remark = $description;


    } else {

    $eligible      = 'Disqualified';
    $grade         = 'N/A';
    $description   = 'DISQUALIFIED';
    $remark        = 'Exam conditions not met';
    $supplementary = 'Not eligible for supplementary';
    $status        = 'DISQUALIFIED — Exam conditions not met';
}


// ── STEP 4: Display formatted HTML report card ────────────────────────────
// TODO: output a clear, formatted report card showing:
//       student name, each CAT score, exam score, total,
//       cats attended, eligibility status, grade, remark, supplementary status

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Report Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        .card {
            background: white;
            width: 480px;
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.12);
            overflow: hidden;
        }

        .card-header {
            background: #1a3a5c;
            color: white;
            padding: 24px;
            text-align: center;
        }

        .card-header h2 {
            margin: 0 0 4px 0;
            font-size: 20px;
        }

        .card-header p {
            margin: 0;
            font-size: 13px;
            opacity: 0.75;
        }

        .card-body {
            padding: 24px;
        }

        .student-name {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #1a3a5c;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        td {
            padding: 10px 12px;
            border-bottom: 1px solid #eee;
        }

        td:first-child {
            color: #666;
            width: 55%;
        }

        td:last-child {
            font-weight: 500;
            color: #1a1a1a;
            text-align: right;
        }

        .section-label {
            background: #f8f9fa;
            font-size: 11px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #999;
            padding: 8px 12px;
            font-weight: bold;
        }

        .grade-box {
            text-align: center;
            margin: 24px 0 8px;
            padding: 16px;
            background: #f0f4ff;
            border-radius: 6px;
        }

        .grade-letter {
            font-size: 48px;
            font-weight: bold;
            color: #1a3a5c;
            line-height: 1;
        }

        .grade-remark {
            font-size: 14px;
            color: #555;
            margin-top: 6px;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-eligible   { background: #d4edda; color: #1e6b3a; }
        .status-disqualified { background: #f8d7da; color: #8b1a1a; }
        .status-supp-yes   { background: #fff3cd; color: #856404; }
        .status-supp-no    { background: #e2e3e5; color: #495057; }
    </style>
</head>
<body>
<div class="card">

    <div class="card-header">
        <h2>JKUAT — Student Report Card</h2>
        <p>Academic Performance Summary</p>
    </div>

    <div class="card-body">

        <div class="student-name"><?php echo $name; ?></div>

        <table>
            <!-- CAT Scores -->
            <tr><td colspan="2" class="section-label">CAT Scores</td></tr>
            <tr><td>CAT 1</td><td><?php echo $cat1; ?> / 10</td></tr>
            <tr><td>CAT 2</td><td><?php echo $cat2; ?> / 10</td></tr>
            <tr><td>CAT 3</td><td><?php echo $cat3; ?> / 10</td></tr>
            <tr><td>CAT 4</td><td><?php echo $cat4; ?> / 10</td></tr>

            <!-- Exam & Totals -->
            <tr><td colspan="2" class="section-label">Exam &amp; Totals</td></tr>
            <tr><td>Final Exam</td><td><?php echo $exam; ?> / 60</td></tr>
            <tr><td>Total Score</td><td><?php echo $total; ?> / 100</td></tr>
            <tr><td>CATs Attended</td><td><?php echo $cats_attended; ?> / 4</td></tr>

            <!-- Status -->
            <tr><td colspan="2" class="section-label">Status</td></tr>
            <tr>
                <td>Eligibility</td>
                <td>
                    <?php
                    $badge = ($eligible === 'Eligible') ? 'status-eligible' : 'status-disqualified';
                    echo "<span class='status-badge $badge'>$eligible</span>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Supplementary</td>
                <td>
                    <?php
                    $sbadge = ($supplementary === 'Eligible for Supplementary') ? 'status-supp-yes' : 'status-supp-no';
                    echo "<span class='status-badge $sbadge'>$supplementary</span>";
                    ?>
                </td>
            </tr>
        </table>

        <!-- Grade box -->
        <div class="grade-box">
            <div class="grade-letter"><?php echo $grade; ?></div>
            <div class="grade-remark"><?php echo $remark; ?></div>
        </div>

    </div>
</div>
</body>
</html>


