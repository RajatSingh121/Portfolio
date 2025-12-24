<?php
require_once 'includes/functions.php';
$content = get_content();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume - <?php echo htmlspecialchars($content['hero']['name']); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #34495e;
            --accent: #2980b9;
            --text: #333;
            --text-light: #666;
            --bg: #f5f7fa;
            --white: #ffffff;
            --border: #e0e0e0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            font-size: 10pt;
        }

        .resume-container {
            max-width: 210mm; /* A4 Width */
            margin: 40px auto;
            background: var(--white);
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            min-height: 297mm; /* A4 Height */
            position: relative;
        }

        /* Controls (Hide in Print) */
        .resume-controls {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
            z-index: 1000;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--primary);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--primary);
            border: 1px solid var(--border);
        }

        /* Resume Layout */
        .resume-content {
            padding: 40px 50px;
        }

        /* Header */
        header {
            border-bottom: 2px solid var(--primary);
            padding-bottom: 20px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .header-left h1 {
            font-size: 24pt;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header-left .role {
            font-size: 12pt;
            color: var(--accent);
            font-weight: 500;
            text-transform: uppercase;
        }

        .header-right {
            text-align: right;
            font-size: 9pt;
            color: var(--text-light);
        }

        .contact-item {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 6px;
            margin-bottom: 4px;
        }

        .contact-item a {
            color: var(--text-light);
            text-decoration: none;
        }

        /* Sections */
        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 11pt;
            font-weight: 700;
            color: var(--primary);
            text-transform: uppercase;
            border-bottom: 1px solid var(--border);
            padding-bottom: 5px;
            margin-bottom: 15px;
            letter-spacing: 0.5px;
        }

        /* Experience Items */
        .job-item {
            margin-bottom: 15px;
        }

        .job-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }

        .job-role {
            font-weight: 700;
            font-size: 10.5pt;
        }

        .job-company {
            font-weight: 600;
            color: var(--secondary);
        }

        .job-date {
            font-size: 9pt;
            color: var(--text-light);
            font-style: italic;
        }

        .job-details {
            list-style-type: none;
            padding-left: 0;
        }

        .job-details li {
            position: relative;
            padding-left: 15px;
            margin-bottom: 3px;
            color: #444;
            font-size: 9.5pt;
        }

        .job-details li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: var(--accent);
            font-weight: bold;
        }

        /* Skills Grid */
        .skills-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .skill-group h4 {
            font-size: 10pt;
            margin-bottom: 5px;
            color: var(--secondary);
        }

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .skill-tag {
            background: #f0f4f8;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 9pt;
            color: var(--secondary);
            border: 1px solid #e1e8ed;
        }

        /* Projects */
        .project-item {
            margin-bottom: 12px;
        }
        
        .project-head {
            display: flex;
            gap: 10px;
            align-items: baseline;
            margin-bottom: 3px;
        }

        .project-name {
            font-weight: 700;
            font-size: 10pt;
        }

        .project-desc {
            font-size: 9.5pt;
            color: #444;
        }

        /* Print Media Query */
        @media print {
            @page { margin: 0; }
            body { background: white; -webkit-print-color-adjust: exact; }
            .resume-container { margin: 0; box-shadow: none; width: 100%; max-width: none; }
            .resume-controls { display: none !important; }
            a { text-decoration: none; color: inherit; }
            /* Force background colors */
            .skill-tag { border: 1px solid #ccc; }
        }
    </style>
</head>
<body>

    <div class="resume-controls">
        <a href="index.php" class="btn btn-secondary">
            <span class="material-icons-round">arrow_back</span> Back to Site
        </a>
        <button onclick="window.print()" class="btn">
            <span class="material-icons-round">print</span> Download / Print
        </button>
    </div>

    <div class="resume-container">
        <div class="resume-content">
            
            <header>
                <div class="header-left">
                    <h1><?php echo htmlspecialchars($content['hero']['name']); ?></h1>
                    <div class="role"><?php echo htmlspecialchars($content['hero']['role']); ?></div>
                </div>
                <div class="header-right">
                    <div class="contact-item">
                        <span class="material-icons-round" style="font-size: 14px;">email</span>
                        <a href="mailto:<?php echo htmlspecialchars($content['contact']['email']); ?>"><?php echo htmlspecialchars($content['contact']['email']); ?></a>
                    </div>
                    <div class="contact-item">
                        <span class="material-icons-round" style="font-size: 14px;">phone</span>
                        <span><?php echo htmlspecialchars($content['contact']['phone']); ?></span>
                    </div>
                    <div class="contact-item">
                        <span class="material-icons-round" style="font-size: 14px;">room</span>
                        <span><?php echo htmlspecialchars($content['contact']['location']); ?></span>
                    </div>
                    <div class="contact-item">
                        <span class="material-icons-round" style="font-size: 14px;">link</span>
                        <a href="https://<?php echo htmlspecialchars($content['contact']['linkedin']); ?>">LinkedIn/in/omdubey</a>
                    </div>
                </div>
            </header>

            <!-- Summary -->
             <section class="section">
                <div class="section-title">Professional Summary</div>
                <p style="font-size: 9.5pt; text-align: justify;">
                    <?php 
                        // Cleaning up the about content for the resume (removing markdown bolding)
                        echo str_replace(['**', '*'], '', htmlspecialchars($content['about']['content'])); 
                    ?>
                </p>
             </section>

            <!-- Experience -->
            <section class="section">
                <div class="section-title">Work Experience</div>
                <?php foreach ($content['experience']['items'] as $job): ?>
                    <div class="job-item">
                        <div class="job-header">
                            <div>
                                <span class="job-role"><?php echo htmlspecialchars($job['role']); ?></span>
                                <span> | </span>
                                <span class="job-company"><?php echo htmlspecialchars($job['company']); ?></span>
                            </div>
                            <span class="job-date"><?php echo htmlspecialchars($job['duration']); ?></span>
                        </div>
                        <ul class="job-details">
                            <?php foreach ($job['details'] as $detail): ?>
                                <li><?php echo htmlspecialchars($detail); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </section>

            <!-- Projects -->
            <section class="section">
                <div class="section-title">Key Projects</div>
                <?php foreach (array_slice($content['projects']['items'], 0, 4) as $project): ?>
                    <div class="project-item">
                        <div class="project-head">
                            <span class="project-name"><?php echo htmlspecialchars($project['title']); ?></span>
                            <span style="font-size: 8pt; color: #666;">
                                [<?php echo implode(', ', array_slice($project['tech_stack'], 0, 3)); ?>]
                            </span>
                        </div>
                        <div class="project-desc">
                            <?php echo htmlspecialchars($project['description']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>

            <!-- Skills -->
            <section class="section">
                <div class="section-title">Technical Skills</div>
                <div class="skills-container">
                    <?php foreach ($content['skills']['categories'] as $category): ?>
                        <div class="skill-group">
                            <h4><?php echo htmlspecialchars($category['name']); ?>:</h4>
                            <div class="skill-list">
                                <?php foreach ($category['items'] as $item): ?>
                                    <span class="skill-tag"><?php echo htmlspecialchars($item); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Education (Assuming structure or adding default if missing) -->
            <!-- Note: Education wasn't explicitly in content.json snippets earlier, adding a fallback or parsing if it exists -->
            <section class="section">
                <div class="section-title">Education & Certifications</div>
                 <div class="job-item">
                    <div class="job-header">
                        <div>
                            <span class="job-role">Master of Computer Applications</span>
                            <span> | </span>
                            <span class="job-company">Techno Main Saltlake</span>
                        </div>
                        <span class="job-date">2024 - Present</span>
                    </div>
                </div>
                 <div class="job-item">
                    <div class="job-header">
                        <div>
                            <span class="job-role">Bachelor of Computer Applications</span>
                            <span> | </span>
                            <span class="job-company">Techno College Hooghly</span>
                        </div>
                        <span class="job-date">2021 - 2024</span>
                    </div>
                </div>
                
                <div style="margin-top: 10px;">
                    <strong>Certifications:</strong> 
                    <?php echo implode(', ', $content['certifications']['items']); ?>
                </div>
            </section>

        </div>
    </div>

</body>
</html>
