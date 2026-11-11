# Week 4 Assignment: Simple Expense Tracker

A small PHP expense tracker following the Week 3 assignment's single-page app style. It supports creating, editing, and deleting expenses, assigning categories, and viewing totals. Expense records are stored in `storage/expenses.json`, outside the public web root.

## Requirements

- PHP 8.0 or newer
- A writable project directory

## Run locally

From this directory, start PHP's built-in development server with the public folder as its document root:

```powershell
php -S 127.0.0.1:8000 -t public
```

Open <http://127.0.0.1:8000>.

## Project structure

- `public/index.php` handles requests and connects the app utilities to the page.
- `public/transactions.php` renders the forms, expense table, and totals.
- `public/assets/style.css` contains the responsive page styles.
- `utilities/expenses.php` validates expenses and handles file-based CRUD and totals.
- `utilities/formatting.php` provides HTML escaping and display formatting.
- `storage/expenses.json` stores expenses as JSON outside the public web root.

The expense file is initialized on first run if it does not exist. Category options are maintained in `utilities/expenses.php`.
