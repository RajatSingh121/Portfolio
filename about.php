<?php
require_once 'includes/functions.php';
$content = get_content();
require_once 'includes/header.php';
?>

<section class="section about-page">
    <div class="container">
        <div class="section-header fade-in">
            <h1 class="section-title">About Me</h1>
            <p class="section-subtitle">Developer. Thinker. Creator.</p>
        </div>

        <div class="about-hero fade-in-up">
            <div class="about-text-content">
                <?php 
                    $aboutContent = htmlspecialchars($content['about']['content']);
                    $aboutContent = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $aboutContent);
                    echo nl2br($aboutContent);
                ?>
                <br><br>
                <p>
                    My journey began with a curiosity for how things work on the internet. 
                    From those early experiments with HTML, I've grown into a passionate developer 
                    dedicated to solving real-world problems through code. I thrive in collaborative environments 
                    and am always eager to learn new technologies to stay ahead of the curve.
                </p>

                <div style="margin-top: 2rem;">
                    <a href="resume.php" class="btn btn-primary" style="display: inline-flex; align-items: center; gap: 8px;">
                        <span class="material-icons-round">download</span> Download Resume
                    </a>
                </div>

                <div class="signature">
                    <p>— Omkarnath Dubey</p>
                </div>
            </div>
            <div class="about-image-wrapper">
                <img src="<?php echo htmlspecialchars($content['hero']['image']); ?>" alt="Omkarnath Dubey" class="about-profile-img">
            </div>
        </div>
    </div>
</section>

<style>
/* Page Specific Styles */
.about-hero {
    display: flex;
    align-items: center;
    gap: 4rem;
    margin-top: 2rem;
}
.about-text-content {
    flex: 1;
    font-size: 1.1rem;
    line-height: 1.8;
    color: var(--text-muted);
}
.about-image-wrapper {
    flex: 0 0 300px;
    max-width: 300px;
}
.about-profile-img {
    width: 100%;
    border-radius: 12px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    border: 4px solid var(--border-color);
}
.signature {
    margin-top: 2rem;
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    color: var(--primary);
    font-size: 1.2rem;
}
@media(max-width: 768px) {
    .about-hero {
        flex-direction: column-reverse;
        gap: 2rem;
    }
}
</style>

<?php require_once 'includes/footer.php'; ?>
