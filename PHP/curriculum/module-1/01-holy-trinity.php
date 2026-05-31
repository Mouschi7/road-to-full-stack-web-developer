<?php
/**
 * Module 1, Topic 1: Understanding the Holy Trinity
 * 
 * CONCEPT: This file demonstrates how PHP, HTML, and CSS work together seamlessly.
 * 
 * The Flow:
 * 1. PHP processes data on the SERVER
 * 2. PHP generates HTML as plain text
 * 3. Browser receives HTML + CSS (PHP code is invisible to browser)
 * 4. Browser renders the final page
 */

// ============================================
// LAYER 1: PHP - BUSINESS LOGIC
// ============================================

// Simulating data from a database (we'll do real DB later)
$user = [
    'name' => 'Alex Johnson',
    'email' => 'alex@example.com',
    'role' => 'Developer',
    'avatar' => '👨‍💻',
    'joinDate' => '2025-01-15',
    'isActive' => true,
];

$projects = [
    ['title' => 'E-commerce Platform', 'status' => 'Completed', 'icon' => '🛒'],
    ['title' => 'Blog System', 'status' => 'In Progress', 'icon' => '📝'],
    ['title' => 'Portfolio Website', 'status' => 'Planning', 'icon' => '🌐'],
];

// PHP Logic: Calculate user tenure
$joinDateTime = new DateTime($user['joinDate']);
$today = new DateTime();
$daysActive = $today->diff($joinDateTime)->days;
$monthsActive = (int)($daysActive / 30);

// PHP Logic: Determine greeting based on time
$hour = (int)date('H');
$greeting = match(true) {
    $hour < 12 => 'Good Morning',
    $hour < 17 => 'Good Afternoon',
    default => 'Good Evening'
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title generated from PHP variable -->
    <title><?php echo htmlspecialchars($user['name']); ?> - Developer Dashboard</title>
    <style>
        /* ============================================
           LAYER 3: CSS - STYLING AND LAYOUT
           ============================================ */

        /* Reset defaults */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Root styles */
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --success-color: #48bb78;
            --warning-color: #f6ad55;
            --danger-color: #f56565;
            --bg-light: #f7fafc;
            --text-dark: #2d3748;
            --text-muted: #718096;
            --border-color: #e2e8f0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        /* Main container */
        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 700px;
            width: 100%;
            overflow: hidden;
        }

        /* Header section */
        header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .avatar {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        header h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Main content */
        main {
            padding: 2rem;
        }

        .greeting {
            background: var(--bg-light);
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            border-left: 4px solid var(--primary-color);
        }

        .greeting-text {
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .status {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .status.active {
            background: #c6f6d5;
            color: #22543d;
        }

        /* Stats section */
        .stats {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .stat-card {
            flex: 1;
            min-width: 150px;
            background: var(--bg-light);
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
            border: 2px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-4px);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        /* Projects section */
        section h2 {
            color: var(--text-dark);
            margin: 2rem 0 1.5rem 0;
            font-size: 1.5rem;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 1rem;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .project-card {
            background: var(--bg-light);
            padding: 1.5rem;
            border-radius: 8px;
            border: 2px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .project-card:hover {
            border-color: var(--primary-color);
            background: #f0f4ff;
            transform: translateY(-4px);
        }

        .project-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .project-title {
            color: var(--text-dark);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .project-status {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .project-status.completed {
            background: #c6f6d5;
            color: #22543d;
        }

        .project-status.in-progress {
            background: #feebc8;
            color: #7c2d12;
        }

        .project-status.planning {
            background: #bee3f8;
            color: #2c5282;
        }

        /* Footer */
        footer {
            background: var(--bg-light);
            padding: 1.5rem 2rem;
            text-align: center;
            color: var(--text-muted);
            border-top: 1px solid var(--border-color);
            font-size: 0.9rem;
        }

        /* Responsive design */
        @media (max-width: 600px) {
            header {
                padding: 1.5rem;
            }

            header h1 {
                font-size: 1.5rem;
            }

            main {
                padding: 1.5rem;
            }

            .stats {
                flex-direction: column;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- ============================================
         LAYER 2: HTML - SEMANTIC STRUCTURE
         ============================================ -->

    <div class="container">
        <!-- Header - Semantic HTML5 -->
        <header>
            <div class="avatar"><?php echo $user['avatar']; ?></div>
            <h1><?php echo htmlspecialchars($user['name']); ?></h1>
            <p><?php echo htmlspecialchars($user['role']); ?></p>
        </header>

        <!-- Main content -->
        <main>
            <!-- Greeting - Dynamically generated by PHP -->
            <div class="greeting">
                <div class="greeting-text">
                    <?php echo htmlspecialchars($greeting); ?>, <?php echo htmlspecialchars(explode(' ', $user['name'])[0]); ?>! 👋
                </div>
                <div>
                    <span class="status <?php echo $user['isActive'] ? 'active' : ''; ?>">
                        <?php echo $user['isActive'] ? '🟢 Active' : '🔴 Inactive'; ?>
                    </span>
                </div>
            </div>

            <!-- User statistics section - Using Flexbox layout -->
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-value"><?php echo $daysActive; ?></div>
                    <div class="stat-label">Days Active</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value"><?php echo count($projects); ?></div>
                    <div class="stat-label">Projects</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value"><?php echo date('Y'); ?></div>
                    <div class="stat-label">Year</div>
                </div>
            </div>

            <!-- Projects section - Using Grid layout -->
            <section>
                <h2>📊 Your Projects</h2>
                <div class="projects-grid">
                    <?php foreach ($projects as $project): ?>
                        <div class="project-card">
                            <div class="project-icon"><?php echo $project['icon']; ?></div>
                            <div class="project-title"><?php echo htmlspecialchars($project['title']); ?></div>
                            <span class="project-status <?php echo strtolower(str_replace(' ', '-', $project['status'])); ?>">
                                <?php echo htmlspecialchars($project['status']); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>

        <!-- Footer - Semantic HTML5 -->
        <footer>
            <p>
                ✨ Generated on <?php echo date('l, F j, Y \a\t g:i A'); ?> 
                | Member since <?php echo date('F Y', strtotime($user['joinDate'])); ?>
            </p>
        </footer>
    </div>
</body>
</html>
