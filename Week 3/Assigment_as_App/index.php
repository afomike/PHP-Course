<?php

require_once __DIR__ . '/config.php';

$taxResult = null;
$currencyResult = null;
$slugResult = null;
$ageResult = null;
$emailResult = null;
$paginationResult = null;
$referenceResult = null;

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {

        $taxResult = calculateTax(
            (float) ($_POST['amount'] ?? 0),
            (float) ($_POST['tax_rate'] ?? 7.5)
        );

        $currencyResult = formatCurrency(
            $taxResult['total'],
            'NGN'
        );

        $slugResult = generateSlug(
            $_POST['title'] ?? ''
        );

        $ageResult = calculateAge(
            $_POST['dob'] ?? '2000-01-01'
        );

        $emailResult = validateEmail(
            $_POST['email'] ?? ''
        );

        $students = [
            'Michael',
            'John',
            'David',
            'Peter',
            'James',
            'Paul',
            'Mary',
            'Grace',
            'Daniel',
            'Sarah'
        ];

        $paginationResult = paginate(
            $students,
            (int) ($_POST['page'] ?? 1),
            3
        );

        $referenceResult = generateReference('PAY');

    } catch (Throwable $e) {

        $errors[] = $e->getMessage();

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP Utility Library</title>

    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<div class="container">

    <h1>PHP Utility Library</h1>

    <p class="subtitle">
        A collection of reusable PHP utility functions.
    </p>

    <?php foreach ($errors as $error): ?>
        <div class="error">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endforeach; ?>

    <form method="POST">

        <div class="card">

            <h2>1. Tax Calculator</h2>

            <label>Amount</label>

            <input
                type="number"
                name="amount"
                min="0"
                step="0.01"
                value="<?= htmlspecialchars($_POST['amount'] ?? '100000') ?>"
                required
            >

            <label>Tax Rate (%)</label>

            <input
                type="number"
                name="tax_rate"
                min="0"
                step="0.01"
                value="<?= htmlspecialchars($_POST['tax_rate'] ?? '7.5') ?>"
                required
            >

            <?php if ($taxResult): ?>

                <div class="result">
                    Tax: <?= formatCurrency($taxResult['tax_amount']) ?><br>
                    Total: <?= htmlspecialchars($currencyResult) ?>
                </div>

            <?php endif; ?>

        </div>


        <div class="card">

            <h2>2. Slug Generator</h2>

            <label>Enter Title</label>

            <input
                type="text"
                name="title"
                value="<?= htmlspecialchars($_POST['title'] ?? 'Learning PHP Programming') ?>"
            >

            <?php if ($slugResult !== null): ?>

                <div class="result">
                    Generated Slug:
                    <?= htmlspecialchars($slugResult) ?>
                </div>

            <?php endif; ?>

        </div>


        <div class="card">

            <h2>3. Age Calculator</h2>

            <label>Date of Birth</label>

            <input
                type="date"
                name="dob"
                value="<?= htmlspecialchars($_POST['dob'] ?? '2000-01-01') ?>"
            >

            <?php if ($ageResult !== null): ?>

                <div class="result">
                    Age: <?= $ageResult ?> years
                </div>

            <?php endif; ?>

        </div>


        <div class="card">

            <h2>4. Email Validator</h2>

            <label>Email Address</label>

            <input
                type="email"
                name="email"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
            >

            <?php if ($emailResult !== null): ?>

                <div class="result">
                    <?= $emailResult
                        ? 'Valid email address'
                        : 'Invalid email address' ?>
                </div>

            <?php endif; ?>

        </div>


        <div class="card">

            <h2>5. Pagination</h2>

            <label>Page Number</label>

            <input
                type="number"
                name="page"
                min="1"
                value="<?= htmlspecialchars($_POST['page'] ?? '1') ?>"
            >

            <?php if ($paginationResult !== null): ?>

                <div class="result">

                    <p>
                        Page <?= $paginationResult['current_page'] ?>
                        of <?= $paginationResult['total_pages'] ?>
                    </p>

                    <?php foreach ($paginationResult['data'] as $student): ?>

                        <p><?= htmlspecialchars($student) ?></p>

                    <?php endforeach; ?>

                    <p>
                        Total Students:
                        <?= $paginationResult['total_items'] ?>
                    </p>

                </div>

            <?php endif; ?>

        </div>


        <button type="submit">Run All Utilities</button>

    </form>


    <?php if ($referenceResult !== null): ?>

        <div class="card">

            <h2>6. Reference Generator</h2>

            <div class="result">
                <?= htmlspecialchars($referenceResult) ?>
            </div>

        </div>

    <?php endif; ?>

    <div class="card">

        <h2>7. Currency Formatter</h2>

        <p>
            The currency formatter is demonstrated in the tax calculator.
        </p>

        <p>
            Example: <?= htmlspecialchars(formatCurrency(250000, 'NGN')) ?>
        </p>

    </div>

</div>

</body>
</html>