<?php
require_once 'includes/functions.php';
$content = get_content();
require_once 'includes/header.php';
?>

<section class="section projects-page">
    <div class="container">
        <div class="section-header fade-in">
            <h1 class="section-title">Projects</h1>
            <p class="section-subtitle">Real-world solutions and experiments.</p>
        </div>

        <div class="projects-grid">
            <?php foreach ($content['projects']['items'] as $project): ?>
                <article class="project-card fade-in-up">
                    <div class="project-content">
                        <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p class="project-desc"><?php echo htmlspecialchars($project['description']); ?></p>
                        <div class="project-tech">
                            <?php foreach ($project['tech_stack'] as $tech): ?>
                                <span class="tech-tag"><?php echo htmlspecialchars($tech); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="project-links">
                            <?php if (isset($project['id'])): ?>
                                <a href="project-details.php?id=<?php echo $project['id']; ?>" class="link-btn">View Details</a>
                            <?php endif; ?>
                            
                            <?php if ($project['demo_link'] !== '#'): ?>
                                <a href="<?php echo htmlspecialchars($project['demo_link']); ?>" class="link-btn" target="_blank">Live Demo</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
