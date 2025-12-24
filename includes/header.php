<?php
// includes/header.php
$content = get_content();
$meta = $content['meta'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($meta['description']); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($meta['keywords']); ?>">
    <title><?php echo htmlspecialchars($meta['title']); ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- Google Translate Script -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,hi,sa,es,fr,de,ja,zh-CN,ru,ar', autoDisplay: false}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a href="#" class="logo">
                <span class="logo-text">OD</span>
            </a>
            
            <nav class="main-nav">
                <ul class="nav-list">
                    <li><a href="index.php" class="nav-link">Home</a></li>
                    <li><a href="about.php" class="nav-link">About</a></li>
                    <li><a href="skills.php" class="nav-link">Skills</a></li>
                    <li><a href="projects.php" class="nav-link">Projects</a></li>
                    <li><a href="experience.php" class="nav-link">Experience</a></li>
                    <li><a href="contact.php" class="nav-link btn">Contact</a></li>
                    
                    <!-- Controls -->
                    <li class="nav-control">
                        <button id="theme-toggle" class="icon-btn" aria-label="Toggle Theme">
                            <span class="icon-sun">☀️</span>
                            <span class="icon-moon">🌙</span>
                        </button>
                    </li>
                    <li class="nav-control">
                        <div id="google_translate_element" style="display:none;"></div>
                        <select id="lang-select" class="lang-dropdown" onchange="triggerTranslate(this.value)">
                            <option value="en">English 🇺🇸</option>
                            <option value="hi">Hindi 🇮🇳</option>
                            <option value="sa">Sanskrit 🕉️</option>
                            <option value="es">Spanish 🇪🇸</option>
                            <option value="fr">French 🇫🇷</option>
                            <option value="de">German 🇩🇪</option>
                            <option value="ja">Japanese 🇯🇵</option>
                            <option value="zh-CN">Chinese 🇨🇳</option>
                            <option value="ru">Russian 🇷🇺</option>
                            <option value="ar">Arabic 🇸🇦</option>
                        </select>
                    </li>
                </ul>
                <button class="mobile-menu-toggle" aria-label="Toggle navigation">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </button>
            </nav>
        </div>
    </header>
    <main>
