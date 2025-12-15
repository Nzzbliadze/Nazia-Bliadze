<!DOCTYPE html>
<html lang="en">
<?php require_once 'header.php'; ?>

<body>

    <main class="main">
        <h2>Get in Touch with TSDAgency</h2>
        <section class="contact-content-wrapper">
            <div class="contact-form-section">

                <form class="contact-form" action="#" method="POST">
                    <fieldset>
                        <legend>Contact Us</legend>
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" name="name" required placeholder="John Doe">
                        </div>

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" required placeholder="name@example.com">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" placeholder="Inquiry about trips">
                        </div>

                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" rows="6" required
                                placeholder="Tell us about your travel plans or questions..."></textarea>
                        </div>

                        <button type="submit" class="submit-button">Send Message</button>
                    </fieldset>
                </form>

            </div>

            <div class="contact-info-section">
                <h3>Reach Out to Our Team</h3>

                <div class="contact-persons-grid">
                    <div class="contact-person-card">
                        <h4>Maka Abuladze</h4>
                        <p><i class="icon-phone"></i> Mobile: +995 511 11 11 11</p>
                        <p><i class="icon-email"></i> Email: makaabuladze1@gmail.com</p>
                    </div>

                    <div class="contact-person-card">
                        <h4>Lasha Maisuradze</h4>
                        <p><i class="icon-phone"></i> Mobile: +995 577 77 77 77</p>
                        <p><i class="icon-email"></i> Email: Lmaisuradze7@gmail.com</p>
                    </div>

                    <div class="contact-person-card">
                        <h4>Marina Akhalaia</h4>
                        <p><i class="icon-phone"></i> Mobile: +995 598 98 98 98</p>
                        <p><i class="icon-email"></i> Email: AkhalaiaMarina@gmail.com</p>
                    </div>
                </div>

                <div class="contact-person-card">
                    <h4>Hotline & General Inquiries</h4>
                    <p><i class="icon-hotline"></i> +995 32 222 1234</p>
                    <p><i class="icon-email"></i> Email: TSD@infoagency.com</p>
                    <p><i class="icon-location"></i> Address: Tbilisi, Georgia</p>

                    <div class="socials">
                        <a href="https://facebook.com/youragency" target="_blank" aria-label="Facebook">
                            <img src="Gallery\fb png.png" alt="Facebook" />
                        </a>
                        <a href="https://instagram.com/youragency" target="_blank" aria-label="Instagram">
                            <img src="Gallery\insta png.png" alt="Instagram" />
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="contact-map-section">
            <h2>Find Us on the Map</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps?q=41.6514048,44.8920929&z=14&output=embed" width="100%"
                    height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </section>
    </main>

    <?php require_once 'footer.php'; ?>
</body>

</html>