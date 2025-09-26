<?php
// Data profil dalam array PHP (Catppuccin Style)
$profil = [
    'nama' => 'Ahmad Rifa\'i',
    'email' => 'reefai.ahmd@gmail.com',
    'telepon' => '0812-1240-8566',
    'alamat' => 'Cirebon, Indonesia',
    'foto' => 'foto.jpg',
    'bio' => 'Passionate developer who loves clean code and beautiful design. Always learning and exploring new technologies.'
];

$hobi = [
    'Membaca',
    'Tidur',
    'Coding'
];

$minat = [
    'Teknologi',
    'Musik',
    'Desain'
];

$skill = [
    'HTML' => 60,
    'CSS' => 55,
    'PHP' => 40,
    'Python' => 55
];

$social_links = [
    'GitHub' => 'https://github.com/Reefaai',
    'Whatsapp' => 'https://wa.me/6281212408566',
    'Facebook' => '#'
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $profil['nama']; ?> - Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Profile Section -->
        <section class="hero-section">
            <div class="profile-card">
                <div class="profile-image">
                    <img src="<?php echo $profil['foto']; ?>" alt="Profile Picture" onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIiByeD0iMTAwIiBmaWxsPSIjNDU0NzVhIi8+CjxjaXJjbGUgY3g9IjEwMCIgY3k9IjgwIiByPSIzMCIgZmlsbD0iIzg5YjRmYSIvPgo8cGF0aCBkPSJNNTAgMTYwYzAtMzAgMjItNTUgNTAtNTVzNTAgMjUgNTAgNTV2NDBINTB2LTQweiIgZmlsbD0iIzg5YjRmYSIvPgo8L3N2Zz4='">
                </div>
                <div class="profile-info">
                    <h1 class="profile-name"><?php echo $profil['nama']; ?></h1>
                    <p class="profile-bio"><?php echo $profil['bio']; ?></p>
                    
                    <!-- Link Sosmed -->
                    <div class="social-links">
                        <?php foreach($social_links as $platform => $url): ?>
                            <a href="<?php echo $url; ?>" class="social-link" title="<?php echo $platform; ?>">
                                <i class="fab fa-<?php echo strtolower($platform); ?>"></i>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kontak Section -->
        <section class="section">
            <div class="card">
                <h2 class="section-title">
                    <i class="fas fa-address-card"></i>
                    Informasi Kontak
                </h2>
                <div class="contact-grid">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <span class="contact-label">Email</span>
                            <span class="contact-value"><?php echo $profil['email']; ?></span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <span class="contact-label">Telepon</span>
                            <span class="contact-value"><?php echo $profil['telepon']; ?></span>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <span class="contact-label">Alamat</span>
                            <span class="contact-value"><?php echo $profil['alamat']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skill Section -->
        <section class="section">
            <div class="card">
                <h2 class="section-title">
                    <i class="fas fa-code"></i>
                    Keahlian
                </h2>
                <div class="skills-grid">
                    <?php foreach($skill as $nama_skill => $level): ?>
                        <div class="skill-item">
                            <div class="skill-header">
                                <span class="skill-name"><?php echo $nama_skill; ?></span>
                                <span class="skill-percentage"><?php echo $level; ?>%</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-width="<?php echo $level; ?>%"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Hobi & Kesukaan -->
        <div class="section-row">
            <!-- Hobi Section -->
            <section class="section half-section">
                <div class="card">
                    <h2 class="section-title">
                        <i class="fas fa-heart"></i>
                        Hobi
                    </h2>
                    <div class="tags-container">
                        <?php foreach($hobi as $item): ?>
                            <span class="tag hobi-tag"><?php echo $item; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <!-- Kesukaan Section -->
            <section class="section half-section">
                <div class="card">
                    <h2 class="section-title">
                        <i class="fas fa-star"></i>
                        Minat
                    </h2>
                    <div class="tags-container">
                        <?php foreach($minat as $item): ?>
                            <span class="tag minat-tag"><?php echo $item; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; <?php echo date('Y'); ?> <?php echo $profil['nama']; ?>. Built with 💜</p>
        </footer>
    </div>

    <script>
        // Animasi bar sedang di load
        document.addEventListener('DOMContentLoaded', function() {
            const skillBars = document.querySelectorAll('.skill-progress');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const bar = entry.target;
                        const width = bar.getAttribute('data-width');
                        setTimeout(() => {
                            bar.style.width = width;
                        }, 200);
                    }
                });
            });
            
            skillBars.forEach(bar => observer.observe(bar));
        });
    </script>
</body>
</html>