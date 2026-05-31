<?php
/**
 * Personal Welcome Dashboard
 *
 * Demonstrates:
 * - PHP generating HTML dynamically
 * - Semantic HTML5 structure
 * - Modern CSS with Flexbox
 * - The PHP → HTML → CSS workflow
 */

// PHP: Business Logic Layer
$user = [
    'name' => 'John Baarde',
    'title' => 'Full-Stack Developer',
    'joinDate' => '2027-01-15',
    'projects' => ['E-commerce Platform', 'Blog System', 'Portfolio']
];

// Calculate days on the job (PHP logic)
$daysSinceJoin = (new DateTime())->diff(new DateTime($user['joinDate']))->days;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($user['name']); ?> - Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 100%;
            padding: 2rem;
        }

        /* Semantic HTML5 header */
        header {
            margin-bottom: 2rem;
            border-bottom: 3px solid #667eea;
            padding-bottom: 1.5rem;
        }

        h1 {
            color: #2d3748;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: #718096;
            font-size: 1.1rem;
        }

        /* Main article content */
        article {
            margin-bottom: 2rem;
        }

        .stat-flex {
            display: flex;
            gap: 2rem;
            margin: 1.5rem 0;
            flex-wrap: wrap;
        }

        .stat {
            flex: 1;
            min-width: 150px;
            padding: 1rem;
            background: #f7fafc;
            border-left: 4px solid #667eea;
            border-radius: 4px;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            color: #667eea;
        }

        .stat-label {
            color: #718096;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        /* Projects section with grid */
        section h2 {
            color: #2d3748;
            margin: 2rem 0 1rem 0;
            font-size: 1.5rem;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
        }

        .project-card {
            background: #edf2f7;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .project-card:hover {
            border-color: #667eea;
            background: #f0f4ff;
            transform: translateY(-2px);
        }

        .project-card p {
            color: #2d3748;
            font-weight: 500;
        }

        /* Footer */
        footer {
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e2e8f0;
            text-align: center;
            color: #a0aec0;
            font-size: 0.9rem;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 1.5rem;
            }
            .stat-flex {
                gap: 1rem;
            }
            .container {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Semantic HTML5 Header -->
        <header>
            <h1><?php echo htmlspecialchars($user['name']); ?></h1>
            <p class="subtitle"><?php echo htmlspecialchars($user['title']); ?></p>
        </header>

        <!-- Main Article Content -->
        <article>
            <p>Welcome to your personal dashboard! This page demonstrates how PHP generates dynamic HTML that the browser renders and styles with CSS.</p>

            <!-- Key Statistics using Flexbox -->
            <div class="stat-flex">
                <div class="stat">
                    <div class="stat-value"><?php echo $daysSinceJoin; ?></div>
                    <div class="stat-label">Days Active</div>
                </div>
                <div class="stat">
                    <div class="stat-value"><?php echo count($user['projects']); ?></div>
                    <div class="stat-label">Projects Completed</div>
                </div>
                <div class="stat">
                    <div class="stat-value"><?php echo date('Y'); ?></div>
                    <div class="stat-label">Current Year</div>
                </div>
            </div>
        </article>

        <!-- Projects Section with CSS Grid -->
        <section>
            <h2>Your Projects</h2>
            <div class="projects-grid">
                <?php foreach ($user['projects'] as $project): ?>
                    <div class="project-card">
                        <p><?php echo htmlspecialchars($project); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Semantic Footer -->
        <footer>
            <p>Dashboard generated on <?php echo date('l, F j, Y \a\t g:i A'); ?></p>
        </footer>
    </div>
</body>
</html>
