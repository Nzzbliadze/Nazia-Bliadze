<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php'; ?>

<body>
    <main class="main">
        <div>
        <section class="about__section">
            <div class="about__section-content">
                <div class="about__section-header">
                    <h2>About TSDAgency</h2>
                    <p class="Fp">TSDAgency is a local tourism agency based in Sakire, Tadzrisi, and Dgvari — three
                        beautiful Georgian
                        villages
                        rich in nature, culture, and hospitality.</p>
                </div>
                <div class="about__section-gallery">
                    <div class="about__section-gallery-item">
                        <img class="about__section-gallery-item-img" src="Gallery\s1.jpeg" alt="sakire">
                        <a href="trips.php" class="about__section-gallery-item-title">Sakire Fortress</a>
                    </div>
                    <div class="about__section-gallery-item">
                        <img class="about__section-gallery-item-img" src="Gallery\s2.jpeg" alt="cixeebi" />
                        <a href="trips.php" class="about__section-gallery-item-title">Historic Castle</a>
                    </div>
                    <div class="about__section-gallery-item">
                        <img class="about__section-gallery-item-img" src="Gallery\s3.jpg" alt="cixe" />
                        <a href=" trips.php" class="about__section-gallery-item-title">Sakire Citadel</a>
                    </div>
                </div>
                <div class="see-more-container">
                    <button class="see-more-container-btn">
                        <a href="trips.php" class="see-more-container-btn-link">See More </a></button>
                </div>
            </div>

        </section> 
</div><div>
        <section class="team-section">
            <div class="team-section__inner">
                <div class="team-section__header">
                    <h2>
                        Meet Our Team
                    </h2>
                </div>
                <div id="teamMembersGridContainer" class="team-grid">
                    
                </div>
            </div>

        
        <div class="team-grid">
            <div class="team-card">
                <div class="team-card__image-container">
                    <img class="team-card__image" src="Gallery/harry.jpg" alt="Shalva Zambakhidze">
                </div>
                <h3 class="team-card__name">Shalva Zambakhidze</h3>
                <p class="team-card__description">
                    Shalva is a passionate local guide with extensive knowledge of the region's history and hidden
                    trails.
                    He loves sharing authentic Georgian experiences and ensuring every traveler finds their unique
                    adventure.
                    
                </p>
            </div>
            <div class="team-card">
                <div class="team-card__image-container">
                    <img class="team-card__image" src="Gallery/nial.jpg" alt="Zauri Kakabadze">
                </div>
                <h3 class="team-card__name">Zauri Kakabadze</h3>
                <p class="team-card__description">
                    Zauri is our logistics expert, ensuring smooth and seamless trips from start to finish.
                    With a keen eye for detail and a commitment to comfort, he handles all the arrangements so you can
                    focus on enjoying the journey.
                    
                </p>
            </div>
            <div class="team-card">
                <div class="team-card__image-container">
                    <img class="team-card__image" src="Gallery/sandra.jpg" alt="Mzia Diasamidze">
                </div>
                <h3 class="team-card__name">Mzia Diasamidze</h3>
                <p class="team-card__description">
                    Mzia brings the warmth of Georgian hospitality to every interaction.
                    She specializes in cultural immersion experiences, connecting visitors with local families and
                    traditions.
                    
                </p>
            </div>
            <div class="team-card">
                <div class="team-card__image-container">
                    <img class="team-card__image" src="Gallery/rdj.png" alt="Malkhaz Abesadze">
                </div>
                <h3 class="team-card__name">Malkhaz Abesadze</h3>
                <p class="team-card__description">
                    Malkhaz is our outdoor adventure specialist, leading treks and explorations through the most
                    breathtaking natural spots.
                    His expertise in the local flora and fauna, combined with his dedication to safety, ensures an
                    exhilarating yet secure experience for all.
                   
                </p>
            </div>
        </div>
        <div class="see-more-container">
            <button class="see-more-container-btn">
                <a href="team.php" class="see-more-container-btn-link">See More </a></button>
        </div>
    </section>
    </div>
    </main>
    <?php require_once 'footer.php'; ?>
</body>
</html>