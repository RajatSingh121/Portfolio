<?php
require_once 'includes/functions.php';

// Handle Contact Form Submission
$message_status = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (save_message($name, $email, $message)) {
        $message_status = "success";
    } else {
        $message_status = "error";
    }
}

require_once 'includes/header.php';
$content = get_content();
?>

<!-- Hero Section -->
<section id="hero" class="hero-section">
    <div class="container">
        <div class="hero-content fade-in-up">
            <span class="greeting">Hello, I'm</span>
            <h1 class="hero-name"><?php echo htmlspecialchars($content['hero']['name']); ?></h1>
            <h2 class="hero-role"><?php echo htmlspecialchars($content['hero']['role']); ?></h2>
            <p class="hero-tagline"><?php echo htmlspecialchars($content['hero']['tagline']); ?></p>
            <div class="hero-cta">
                <a href="<?php echo htmlspecialchars($content['hero']['cta_primary']['link']); ?>" class="btn btn-primary"><?php echo htmlspecialchars($content['hero']['cta_primary']['text']); ?></a>
                <a href="<?php echo htmlspecialchars($content['hero']['cta_secondary']['link']); ?>" class="btn btn-secondary"><?php echo htmlspecialchars($content['hero']['cta_secondary']['text']); ?></a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="section about-section">
    <div class="container">
        <div class="section-header fade-in">
            <h2 class="section-title"><?php echo htmlspecialchars($content['about']['title']); ?></h2>
        </div>
        <div class="about-content fade-in-up">
            <p><?php echo htmlspecialchars($content['about']['content']); ?></p>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="section skills-section">
    <div class="container">
        <div class="section-header fade-in">
            <h2 class="section-title"><?php echo htmlspecialchars($content['skills']['title']); ?></h2>
        </div>
        <div class="skills-grid">
            <?php foreach ($content['skills']['categories'] as $category): ?>
                <div class="skill-category fade-in-up">
                    <h3 class="category-title"><?php echo htmlspecialchars($category['name']); ?></h3>
                    <ul class="skill-list">
                        <?php foreach ($category['items'] as $item): ?>
                            <li class="skill-item"><?php echo htmlspecialchars($item); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="section projects-section">
    <div class="container">
        <div class="section-header fade-in">
            <h2 class="section-title"><?php echo htmlspecialchars($content['projects']['title']); ?></h2>
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
                            <a href="<?php echo htmlspecialchars($project['demo_link']); ?>" class="link-btn">Live Demo</a>
                            <a href="<?php echo htmlspecialchars($project['github_link']); ?>" class="link-btn">GitHub</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="section experience-section">
    <div class="container">
        <div class="section-header fade-in">
            <h2 class="section-title"><?php echo htmlspecialchars($content['experience']['title']); ?></h2>
        </div>
        <div class="timeline">
            <?php foreach ($content['experience']['items'] as $job): ?>
                <div class="timeline-item fade-in-up">
                    <div class="timeline-content">
                        <h3 class="job-role"><?php echo htmlspecialchars($job['role']); ?></h3>
                        <h4 class="company-name"><?php echo htmlspecialchars($job['company']); ?></h4>
                        <span class="job-duration"><?php echo htmlspecialchars($job['duration']); ?></span>
                        <ul class="job-details">
                            <?php foreach ($job['details'] as $detail): ?>
                                <li><?php echo htmlspecialchars($detail); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="section contact-section">
    <div class="container">
        <div class="section-header fade-in">
            <h2 class="section-title"><?php echo htmlspecialchars($content['contact']['title']); ?></h2>
            <p class="section-subtitle"><?php echo htmlspecialchars($content['contact']['subtitle']); ?></p>
        </div>
        
        <div class="contact-wrapper fade-in-up">
            <?php if ($message_status === 'success'): ?>
                <div class="alert success-alert">Message sent successfully!</div>
            <?php elseif ($message_status === 'error'): ?>
                <div class="alert error-alert">Failed to send message. Please try again.</div>
            <?php endif; ?>

            <form action="index.php#contact" method="POST" class="contact-form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Your Email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required placeholder="Your Message"></textarea>
                </div>
                <button type="submit" name="submit_contact" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
