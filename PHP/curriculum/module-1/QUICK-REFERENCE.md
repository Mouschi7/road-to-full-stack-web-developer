# Quick Reference: The Holy Trinity at a Glance

## 1. The Three Layers Explained

```
REQUEST FLOW:
┌──────────────┐
│   Browser    │ Sends request to server
└──────────────┘
       │
       ↓
┌──────────────────────────────────┐
│   Server Executes PHP Code       │
│ - Reads variables                │
│ - Processes business logic       │
│ - Calculates values              │
│ - Fetches from database (later)  │
└──────────────────────────────────┘
       │
       ↓ (PHP generates HTML as TEXT)
┌──────────────────────────────────┐
│   PHP Creates HTML               │
│ - Embeds PHP variables in HTML   │
│ - Creates dynamic content        │
│ - Escapes dangerous content      │
└──────────────────────────────────┘
       │
       ↓ (Sends to browser)
┌──────────────────────────────────┐
│   Browser Receives HTML + CSS    │
│ - NO PHP CODE visible!           │
│ - Only plain HTML                │
│ - Renders and styles with CSS    │
└──────────────────────────────────┘
       │
       ↓
┌──────────────────────────────────┐
│   User Sees Beautiful Page       │
│ - HTML structure + CSS styling   │
│ - Dynamic content from PHP       │
│ - Interactive and responsive     │
└──────────────────────────────────┘
```

## 2. Security Principles

### The Most Important: Always Escape Output

```php
// ❌ DANGEROUS - XSS Vulnerability
<?php echo $userInput; ?>

// ✅ SAFE - Escaped for HTML
<?php echo htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8'); ?>
```

### Context-Specific Escaping

| Context        | Function                          | Example                                                   |
| -------------- | --------------------------------- | --------------------------------------------------------- |
| HTML Content   | `htmlspecialchars()`              | `<div><?php echo htmlspecialchars($data); ?></div>`       |
| HTML Attribute | `htmlspecialchars()`              | `<div title="<?php echo htmlspecialchars($data); ?>">`    |
| URL            | `urlencode()` or `rawurlencode()` | `<a href="?id=<?php echo urlencode($id); ?>">`            |
| JSON           | `json_encode()`                   | `var data = <?php echo json_encode($data); ?>;`           |
| CSS            | `addslashes()`                    | `<div style="color: <?php echo addslashes($color); ?>;">` |

## 3. Separation of Concerns Pattern

```php
<?php
// =========== LAYER 1: LOGIC (Top of file) ===========
$data = ['name' => 'John', 'age' => 30];
$greeting = "Good " . date('H') < 12 ? "Morning" : "Afternoon";
$isActive = true;

// =========== LAYER 2: HTML (Bottom of file) ===========
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($data['name']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($greeting); ?></h1>
    <p>Status: <?php echo $isActive ? 'Online' : 'Offline'; ?></p>
</body>
</html>
```

## 4. Common Security Vulnerabilities to Avoid

### XSS (Cross-Site Scripting)

```php
// ❌ BAD
<?php echo $_GET['search']; ?>

// ✅ GOOD
<?php echo htmlspecialchars($_GET['search'], ENT_QUOTES, 'UTF-8'); ?>
```

### SQL Injection (We'll cover this in Module 4, but good to know)

```php
// ❌ BAD - Don't do this
$query = "SELECT * FROM users WHERE id = " . $_GET['id'];

// ✅ GOOD - Use prepared statements (Module 4)
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_GET['id']]);
```

## 5. Best Practices Checklist

- [ ] **Always escape on output:** `htmlspecialchars()` is your friend
- [ ] **Validate input:** Check type, range, format
- [ ] **Use semantic HTML:** `<header>`, `<nav>`, `<main>`, `<article>`, `<footer>`
- [ ] **Separate concerns:** Logic at top, HTML at bottom
- [ ] **Use descriptive names:** Not `$x`, but `$totalUsers`
- [ ] **Add comments:** Especially "why", not "what"
- [ ] **Handle edge cases:** Null values, empty arrays, etc.
- [ ] **Type hint functions:** `function getName(string $id): string`
- [ ] **Document with PHPDoc:** `/** @param string $name */`
- [ ] **Use CSS variables:** `--primary-color` for maintainability

## 6. The Rookie-to-Senior Progression

### Rookie Level (Don't Do This!)

```php
<?php
echo "<h1>" . $_GET['title'] . "</h1>";
$x = array(1,2,3);
echo $x[0];
?>
```

### Intermediate Level (Getting Better)

```php
<?php
$title = isset($_GET['title']) ? $_GET['title'] : 'Default';
echo htmlspecialchars($title);
$numbers = [1, 2, 3];
echo $numbers[0];
?>
```

### Senior Level (Production-Ready)

```php
<?php
/**
 * Safely get and display page title
 *
 * @return string Escaped title or default
 */
function getPageTitle(): string {
    $title = $_GET['title'] ?? 'Welcome';

    // Validate
    if (!is_string($title) || strlen($title) > 100) {
        $title = 'Welcome';
    }

    // Escape for HTML context
    return htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
}

echo getPageTitle();
?>
```

## 7. Debugging Arsenal

| Tool                 | Purpose                         | When to Use            |
| -------------------- | ------------------------------- | ---------------------- |
| `var_dump()`         | Shows variable type and value   | Quick inspection       |
| `print_r()`          | Displays array/object structure | Reading arrays         |
| `echo`               | Display variable                | Quick output           |
| Xdebug               | Step through code               | Serious debugging      |
| Browser DevTools     | Inspect HTML/CSS                | Frontend debugging     |
| error_log()          | Log to file                     | Production debugging   |
| View Source (Ctrl+U) | See PHP output                  | Verify HTML generation |
