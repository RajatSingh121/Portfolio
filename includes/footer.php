<?php
// includes/footer.php
$content = get_content();
$contact = $content['contact'];
?>
    </main> <!-- End of Main -->

    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <h3><?php echo htmlspecialchars($content['hero']['name']); ?></h3>
                    <p class="role"><?php echo htmlspecialchars($content['hero']['role']); ?></p>
                </div>
                
                <div class="footer-quick-links" style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="about.php" style="color: var(--text-muted); text-decoration: none; font-size: 0.9rem;">About</a>
                    <a href="skills.php" style="color: var(--text-muted); text-decoration: none; font-size: 0.9rem;">Skills</a>
                    <a href="projects.php" style="color: var(--text-muted); text-decoration: none; font-size: 0.9rem;">Projects</a>
                    <a href="contact.php" style="color: var(--text-muted); text-decoration: none; font-size: 0.9rem;">Contact</a>
                </div>

                <div class="footer-links">
                    <a href="mailto:<?php echo htmlspecialchars($contact['email']); ?>" class="social-link">Email</a>
                    <a href="https://<?php echo htmlspecialchars($contact['linkedin']); ?>" target="_blank" class="social-link">LinkedIn</a>
                    <a href="https://<?php echo htmlspecialchars($contact['github']); ?>" target="_blank" class="social-link">GitHub</a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($content['hero']['name']); ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
</body>
</html>
