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

$content = get_content();
require_once 'includes/header.php';
?>

<section class="section contact-page">
    <div class="container">
        <div class="section-header fade-in">
            <h1 class="section-title"><?php echo htmlspecialchars($content['contact']['title']); ?></h1>
            <p class="section-subtitle"><?php echo htmlspecialchars($content['contact']['subtitle']); ?></p>
        </div>

        <div class="contact-layout">
            <div class="contact-info-card fade-in-up">
                <h3>Contact Information</h3>
                <div class="info-item">
                    <span class="icon">📍</span>
                    <p><?php echo htmlspecialchars($content['contact']['location']); ?></p>
                </div>
                <div class="info-item">
                    <span class="icon">📞</span>
                    <p><a href="tel:<?php echo htmlspecialchars($content['contact']['phone']); ?>"><?php echo htmlspecialchars($content['contact']['phone']); ?></a></p>
                </div>
                <div class="info-item">
                    <span class="icon">✉️</span>
                    <p><a href="mailto:<?php echo htmlspecialchars($content['contact']['email']); ?>"><?php echo htmlspecialchars($content['contact']['email']); ?></a></p>
                </div>
                
                <div class="social-links-large">
                    <h3>Connect</h3>
                    <div class="social-row">
                        <a href="https://<?php echo htmlspecialchars($content['contact']['linkedin']); ?>" target="_blank" class="social-btn">LinkedIn</a>
                        <a href="https://<?php echo htmlspecialchars($content['contact']['github']); ?>" target="_blank" class="social-btn">GitHub</a>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrapper fade-in-up">
                <?php if ($message_status === 'success'): ?>
                    <div class="alert success-alert">Message sent successfully!</div>
                <?php elseif ($message_status === 'error'): ?>
                    <div class="alert error-alert">Failed to send message. Please try again.</div>
                <?php endif; ?>

                <form action="contact.php" method="POST" class="contact-form">
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
                    <button type="submit" name="submit_contact" class="btn btn-primary full-width">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
.contact-layout {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 4rem;
    max-width: 1000px;
    margin: 0 auto;
}
.contact-info-card {
    background: var(--bg-card);
    padding: 2rem;
    border-radius: 12px;
    border: 1px solid var(--border-color);
}
.info-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1.5rem;
}
.info-item .icon {
    font-size: 1.5rem;
}
.social-links-large {
    margin-top: 2rem;
    border-top: 1px solid var(--border-color);
    padding-top: 2rem;
}
.social-row {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}
.social-btn {
    flex: 1;
    text-align: center;
    padding: 0.8rem;
    background: var(--bg-color);
    border: 1px solid var(--border-color);
    color: var(--text-main);
    border-radius: 6px;
    transition: all 0.2s;
}
.social-btn:hover {
    border-color: var(--primary);
    color: var(--primary);
}
.full-width {
    width: 100%;
}
@media(max-width: 768px) {
    .contact-layout {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
}
</style>

<?php require_once 'includes/footer.php'; ?>
