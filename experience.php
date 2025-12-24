<?php
require_once 'includes/functions.php';
$content = get_content();
require_once 'includes/header.php';
?>

<section class="section experience-page">
    <div class="container">
        <div class="section-header fade-in">
            <h1 class="section-title">Professional Experience</h1>
            <p class="section-subtitle">My career journey so far.</p>
        </div>

        <div class="timeline">
            <?php foreach ($content['experience']['items'] as $job): ?>
                <div class="timeline-item fade-in-up">
                    <div class="timeline-content">
                        <h3 class="job-role"><?php echo htmlspecialchars($job['role']); ?></h3>
                        <h4 class="company-name"><?php echo htmlspecialchars($job['company']); ?></h4>
                        <span class="job-duration"><?php echo htmlspecialchars($job['duration']); ?></span>
                        <div class="job-location" style="margin-bottom: 1rem; color: var(--text-muted); font-size: 0.9rem;">
                            📍 <?php echo htmlspecialchars($job['location']); ?>
                        </div>
                        <ul class="job-details">
                            <?php foreach ($job['details'] as $detail): ?>
                                <li><?php echo htmlspecialchars($detail); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Awards Section Integrated -->
         <div class="section-header fade-in" style="margin-top: 4rem;">
            <h2 class="section-title">Awards & Recognition</h2>
        </div>
        <ul class="job-details" style="max-width: 800px; margin: 0 auto; list-style: none;">
            <?php foreach ($content['awards']['items'] as $award): ?>
                <li class="fade-in-up" style="background: var(--bg-card); padding: 1rem; border-radius: 6px; margin-bottom: 1rem; border: 1px solid var(--border-color);">
                    🏆 <?php echo htmlspecialchars($award); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
