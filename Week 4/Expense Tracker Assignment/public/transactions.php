<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Expense Tracker</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<main class="container">
    <header class="page-header">
        <p class="eyebrow">Week 4 Assignment</p>
        <h1>Simple Expense Tracker</h1>
        <p class="subtitle">Keep your spending organized, one expense at a time.</p>
    </header>

    <?php if ($flashMessage !== null): ?>
        <div class="notice" role="status"><?= escapeHtml($flashMessage) ?></div>
    <?php endif; ?>

    <?php foreach ($errors as $error): ?>
        <div class="error" role="alert"><?= escapeHtml($error) ?></div>
    <?php endforeach; ?>

    <section class="summary-grid" aria-label="Expense totals">
        <article class="summary-card total-card">
            <span class="summary-label">Total expenses</span>
            <strong><?= escapeHtml(formatCurrency($summary['total'])) ?></strong>
        </article>
        <article class="summary-card">
            <span class="summary-label">Number of expenses</span>
            <strong><?= escapeHtml($summary['count']) ?></strong>
        </article>
    </section>

    <section class="card">
        <h2><?= $editingExpense === null ? 'Add an expense' : 'Edit expense' ?></h2>
        <form method="post" action="index.php" class="expense-form">
            <input type="hidden" name="csrf_token" value="<?= escapeHtml($_SESSION['csrf_token']) ?>">
            <input type="hidden" name="action" value="<?= $editingExpense === null ? 'create' : 'update' ?>">
            <?php if ($editingExpense !== null): ?>
                <input type="hidden" name="id" value="<?= escapeHtml($editingExpense['id']) ?>">
            <?php endif; ?>

            <label>
                Description
                <input type="text" name="description" maxlength="120" required
                       placeholder="e.g. Lunch with colleagues"
                       value="<?= escapeHtml($formValues['description']) ?>">
            </label>
            <label>
                Category
                <select name="category" required>
                    <?php foreach (EXPENSE_CATEGORIES as $category): ?>
                        <option value="<?= escapeHtml($category) ?>"
                            <?= $formValues['category'] === $category ? 'selected' : '' ?>>
                            <?= escapeHtml($category) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label>
                Amount (₦)
                <input type="number" name="amount" min="0.01" max="1000000000" step="0.01" required
                       placeholder="0.00" value="<?= escapeHtml($formValues['amount']) ?>">
            </label>
            <label>
                Date
                <input type="date" name="date" required value="<?= escapeHtml($formValues['date']) ?>">
            </label>
            <div class="form-actions">
                <button type="submit"><?= $editingExpense === null ? 'Add expense' : 'Save changes' ?></button>
                <?php if ($editingExpense !== null): ?>
                    <a class="cancel-link" href="index.php">Cancel edit</a>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <section class="card">
        <div class="section-heading">
            <div>
                <h2>Expenses</h2>
                <p class="muted">Your latest expenses appear first.</p>
            </div>
        </div>
        <?php if ($expenses === []): ?>
            <p class="empty-state">No expenses yet. Add one above to get started.</p>
        <?php else: ?>
            <div class="table-wrap">
                <table>
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th class="amount-column">Amount</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($expenses as $expense): ?>
                        <tr>
                            <td data-label="Date"><?= escapeHtml(formatExpenseDate($expense['date'])) ?></td>
                            <td data-label="Description"><?= escapeHtml($expense['description']) ?></td>
                            <td data-label="Category"><span class="category"><?= escapeHtml($expense['category']) ?></span></td>
                            <td data-label="Amount" class="amount-column"><?= escapeHtml(formatCurrency((float) $expense['amount'])) ?></td>
                            <td data-label="Actions" class="actions">
                                <a class="edit-link" href="index.php?edit=<?= urlencode($expense['id']) ?>">Edit</a>
                                <form method="post" action="index.php" onsubmit="return confirm('Delete this expense?');">
                                    <input type="hidden" name="csrf_token" value="<?= escapeHtml($_SESSION['csrf_token']) ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?= escapeHtml($expense['id']) ?>">
                                    <button class="delete-button" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>

    <section class="card">
        <h2>Totals by category</h2>
        <div class="category-totals">
            <?php foreach ($summary['byCategory'] as $category => $total): ?>
                <div class="category-total">
                    <span><?= escapeHtml($category) ?></span>
                    <strong><?= escapeHtml(formatCurrency($total)) ?></strong>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <footer>Expense Tracker · Data is stored locally in a JSON file.</footer>
</main>
</body>
</html>
