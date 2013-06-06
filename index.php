<?php session_start(); require('form_handler.php'); ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>San Antonio House Cleaning &amp; Maid Service | Danielle Mendes, Epic Maid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="House cleaning and maid service in Northwest San Antonio has never been so easy! Affordable, quality, veteran-owned and operated; get your free quote today!">
    <meta name="author" content="Danielle Mendes (danielle@epicmaid.com)">

    <link rel="profile" href="http://microformats.org/profile/hcard">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lato:300">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css">
    <!--[if IE 7]><link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome-ie7.css"><![endif]-->
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <link rel="stylesheet" href="assets/css/screen.css">
</head>
<body class="contact-me">
    <header class="vcard">
        <h1><a href="http://epicmaid.com/" title="Epic Maid: San Antonio House Cleaning &amp; Maid Service" class="url org"><span>epic</span>maid</a></h1>
        <p class="fn">Danielle Mendes</p>
        <p class="tel"><i class="icon-phone"> </i> (210) 123-4568</p>
        <p class="adr">
            <span class="street-address">Alamo Ranch</span>
            <span class="locality">San Antonio</span> <span class="region">TX</span>
            <span class="postal-code">78254</span>
        </p>
    </header>

    <nav class="no-tablet"><a href="#contact" title="Skip down to contact Danielle"><i class="icon-envelope-alt"> </i> Contact Danielle</a></nav>
    <figure class="no-mobile">
        <img src="assets/imgs/house-keeper.png" width="527" alt="Epic Maid: Danielle Mendes">
    </figure>

    <main>
        <article>
            <h2>About Danielle</h2>
            <p>For more than six years I have provided affordable cleaning services for the best clients in
                San Antonio. Before that? I was a U.S. Marine - cleaning up
                someone else's mess is what I do! If you had a few extra hours each week, what would you do? A long overdue date night or
                maybe ice cream cones after baseball practice?</p>

            <p>How often do you think, "if I only had a little more time"? Take advantage of this opportunity
                while you can! I've been fortunate to call some of your neighbors "client" for years now, something
                rarely seen within this industry. It's not often they're
                I would love to call you my client, an honor I take very seriously as my multiple 5+ year
                clients can attest to (rarely seen within this industry). If you're interested in a
                veteran-owned, veteran-operated, trustworthy and quality service please use the contact
                form below.</p>
        </article>

    <?php if (isset($valid_form) && $valid_form === true): ?>
        <p class="success">Thank you! I'll be sure to get in touch with you as soon as possible.</p>
    <?php else: ?>
    <form method="post" action="#process" accept-charset="utf-8">
            <h2><a name="contact"></a>Contact Danielle</h2>
            <div class="group">
                <p<?php if (in_array('name', $form_errors)) echo ' class="error"'; ?>><label for="name">Your Name:</label>
                    <span class="required" data-field="name">Required</span>
                    <input type="text" id="name" name="name" inputmode="latin-name" placeholder="John Doe" required>
                </p>

                <p<?php if (in_array('email_address', $form_errors)) echo ' class="error"'; ?>><label for="email_address">Email Address:</label>
                    <span class="required" data-field="email_address">Required</span>
                    <input type="text" id="email_address" name="email_address" placeholder="johndoe@epicmaid.com" required>
                </p>
            </div>

            <div class="group">
                <p><label for="phone_number">Phone Number:</label>
                    <input type="tel" id="phone_num" name="phone_num" placeholder="(210) 123-4567">
                </p>

                <p><label for="street_address">Street Address and Zip:</label>
                    <input type="text" id="street_address" name="street_address" placeholder="123 Broadway Ave, 78251">
                </p>
            </div>

            <div class="group">
                <p><label for="comments">Questions or Comments:</label>
                    <textarea id="comments" name="comments" placeholder="Extra details you'd like to share"></textarea>
                </p>

                <p id="map" class="no-mobile">
                    <img width="397" src="https://maps.googleapis.com/maps/api/staticmap?zoom=10&size=397x250&center=San+Antonio,TX&sensor=false">
                </p>
            </div>

            <button type="submit"><i class="icon-envelope-alt"> </i> Send Message</button>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['epicmaid_csrf_token']; ?>">
        </form>
    <?php endif; ?>

        <?php if (isset($clean_data)): ?>
        <pre><?php var_dump($clean_data); ?></pre>
        <pre><?php var_dump($_POST); ?></pre>
        <?php endif; ?>
    </main>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="assets/js/jquery.placeholder.min.js"></script>
    <script src="assets/js/epicmaid.js"></script>
</body>
</html>
