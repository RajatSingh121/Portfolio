<?php
require_once 'includes/functions.php';
$content = get_content();
require_once 'includes/header.php';
?>

<section class="section skills-page">
    <div class="container">
        <div class="section-header fade-in">
            <h1 class="section-title">Technical Skills</h1>
            <p class="section-subtitle">My toolbox for digital creation.</p>
        </div>

        <div class="skills-grid-large">
            <?php foreach ($content['skills']['categories'] as $category): ?>
                <div class="skill-category-card fade-in-up">
                    <div class="card-header">
                        <h3 class="category-name"><?php echo htmlspecialchars($category['name']); ?></h3>
                    </div>
                    <div class="card-body">
                        <div class="skill-tags">
                            <?php foreach ($category['items'] as $item): ?>
                                <span class="skill-pill"><?php echo htmlspecialchars($item); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Certifications Section Integrated -->
        <div class="section-header fade-in" style="margin-top: 4rem;">
            <h2 class="section-title">Certifications</h2>
        </div>
        <div class="cert-grid">
            <?php foreach ($content['certifications']['items'] as $cert): ?>
                <div class="cert-item fade-in-up">
                    <span class="cert-icon">📜</span>
                    <span class="cert-text"><?php echo htmlspecialchars($cert); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.skills-grid-large {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
}
.skill-category-card {
    background: var(--bg-card);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.3s ease;
}
.skill-category-card:hover {
    transform: translateY(-5px);
    border-color: var(--primary);
}
.card-header {
    background: rgba(var(--primary-rgb), 0.05); /* Fallback or need to define RGB var */
    background: var(--bg-card); /* Fallback */
    padding: 1.5rem;
    border-bottom: 1px solid var(--border-color);
}
.category-name {
    margin: 0;
    color: var(--primary);
    font-size: 1.25rem;
}
.card-body {
    padding: 1.5rem;
}
.skill-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.8rem;
}
.skill-pill {
    background: var(--bg-color);
    border: 1px solid var(--border-color);
    padding: 0.5rem 1rem;
    border-radius: 50px;
    font-size: 0.9rem;
    color: var(--text-main);
    transition: all 0.2s;
}
.skill-pill:hover {
    border-color: var(--primary);
    color: var(--primary);
}

/* Certifications */
.cert-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
    gap: 1.5rem;
}
.cert-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: var(--bg-card);
    padding: 1.5rem;
    border-radius: 8px;
    border: 1px solid var(--border-color);
}
.cert-icon {
    font-size: 1.5rem;
}
.cert-text {
    font-weight: 500;
}
@media(max-width: 600px) {
    .cert-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php require_once 'includes/footer.php'; ?>
