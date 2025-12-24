<?php
require_once 'includes/functions.php';
$content = get_content();

// Get Project ID from URL
$project_id = isset($_GET['id']) ? $_GET['id'] : null;
$project = null;

// Find the project in content.json
if ($project_id) {
    foreach ($content['projects']['items'] as $item) {
        if (isset($item['id']) && $item['id'] === $project_id) {
            $project = $item;
            break;
        }
    }
}

// Redirect if not found
if (!$project) {
    header('Location: projects.php');
    exit;
}

require_once 'includes/header.php';
?>

<section class="section project-details-section">
    <div class="container">
        <div class="fade-in">
            <a href="projects.php" class="btn btn-secondary" style="margin-bottom: 2rem;">&larr; Back to Projects</a>
        </div>
        
        <div class="project-header fade-in-up">
            <h1 class="project-title-large"><?php echo htmlspecialchars($project['title']); ?></h1>
            <div class="project-tags-large">
                <?php foreach ($project['tech_stack'] as $tech): ?>
                    <span class="tech-tag tag-large"><?php echo htmlspecialchars($tech); ?></span>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="project-details-grid">
            <div class="project-info fade-in-up">
                <div class="info-card">
                    <h3>Project Overview</h3>
                    <p><?php echo htmlspecialchars($project['description']); ?></p>
                    <p>
                        This project showcases advanced frontend development techniques, responsive design, 
                        and seamless user experience integration. It was built to solve specific problems 
                        and deliver high-quality results.
                    </p>
                </div>

                <div class="project-actions">
                    <?php if ($project['demo_link'] !== '#'): ?>
                        <a href="<?php echo htmlspecialchars($project['demo_link']); ?>" class="btn btn-primary" target="_blank">Live Demo</a>
                    <?php endif; ?>
                    <?php if ($project['github_link'] !== '#'): ?>
                        <a href="<?php echo htmlspecialchars($project['github_link']); ?>" class="btn btn-secondary" target="_blank">View Code</a>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="project-visuals fade-in-up">
                <!-- Placeholder for dynamic screenshots or just a generic project abstract visual -->
                <div class="visual-placeholder">
                    <span>Active Project Preview</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Internal styles for specific page layout */
.project-title-large {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: var(--color-text);
}
.project-tags-large {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 2rem;
}
.tag-large {
    padding: 0.5rem 1rem;
    font-size: 1rem;
}
.project-details-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: start;
}
.info-card {
    background: var(--bg-card);
    padding: 2rem;
    border-radius: 8px;
    border: 1px solid var(--border-color);
    margin-bottom: 2rem;
}
.info-card p {
    margin-bottom: 1rem;
    line-height: 1.6;
    color: var(--text-muted);
}
.visual-placeholder {
    width: 100%;
    height: 300px;
    background: var(--bg-card);
    border: 2px dashed var(--border-color);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    color: var(--text-muted);
    font-weight: 500;
}
@media(max-width: 768px) {
    .project-details-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
}
</style>

<?php require_once 'includes/footer.php'; ?>
