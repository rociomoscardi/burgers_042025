@extends("web.plantilla")
@section("contenido")
<!-- Contact Section -->
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p><span>Need Help?</span> <span class="description-title">Contact Us</span></p>
    </div><!-- End Section Title -->

    <form action="forms/contact.php" method="post" class="php-email-form container" data-aos="fade-up" data-aos-delay="600">
        <div class="row gy-4">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>
            <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>
            <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>
            <div class="col-md-12">
                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>
            <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>

                <button type="submit">Send Message</button>
            </div>

        </div>
    </form><!-- End Contact Form -->
</section>
@endsection