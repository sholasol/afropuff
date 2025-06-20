<x-front-layout>
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title">Let's Talk</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Let's Talk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="contact-info">
                        <h2 class="mb-4">Get in Touch</h2>
                        <p class="mb-5">Have questions about our products? Want to collaborate? Or just want to say hello? We'd love to hear from you. Fill out the form and we'll get back to you as soon as possible.</p>
                        
                        <div class="contact-methods">
                            <div class="contact-method mb-4">
                                <div class="icon-box">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Visit Us</h5>
                                    <p>123 Vape Street, Suite 101<br>Los Angeles, CA 90001</p>
                                </div>
                            </div>
                            
                            <div class="contact-method mb-4">
                                <div class="icon-box">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Call Us</h5>
                                    <p>+1 (800) VAPE-123<br>Monday-Friday, 9am-6pm PST</p>
                                </div>
                            </div>
                            
                            <div class="contact-method mb-4">
                                <div class="icon-box">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Email Us</h5>
                                    <p>info@vapexperience.com<br>support@vapexperience.com</p>
                                </div>
                            </div>
                            
                            <div class="contact-method">
                                <div class="icon-box">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div class="contact-details">
                                    <h5>Live Chat</h5>
                                    <p>Available 24/7<br>Click the chat icon in the bottom right</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="social-links mt-5">
                            <h5 class="mb-3">Connect With Us</h5>
                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
                            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="contact-form-card">
                        <h3 class="mb-4">Send Us a Message</h3>
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">First Name*</label>
                                    <input type="text" class="form-control" id="firstName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">Last Name*</label>
                                    <input type="text" class="form-control" id="lastName" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address*</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone">
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject*</label>
                                <select class="form-select" id="subject" required>
                                    <option value="" selected disabled>Select a subject</option>
                                    <option value="product">Product Inquiry</option>
                                    <option value="order">Order Status</option>
                                    <option value="return">Returns & Refunds</option>
                                    <option value="wholesale">Wholesale Inquiry</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message*</label>
                                <textarea class="form-control" id="message" rows="5" required></textarea>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="ageVerification" required>
                                <label class="form-check-label" for="ageVerification">I confirm that I am 21 years of age or older*</label>
                            </div>
                            
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="newsletter">
                                <label class="form-check-label" for="newsletter">Subscribe to our newsletter for updates and promotions</label>
                            </div>
                            
                            <button type="submit" class="btn btn-orange btn-lg w-100">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container-fluid p-0">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423286.27405770525!2d-118.69192047471653!3d34.02016130390376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2sLos%20Angeles%2C%20CA%2C%20USA!5e0!3m2!1sen!2s!4v1611345818654!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Frequently Asked Questions</h2>
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="contactFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How quickly will I receive a response?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    We strive to respond to all inquiries within 24 hours during business days. For urgent matters, we recommend using our live chat feature for immediate assistance.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Can I visit your physical store?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    Yes, we welcome visitors to our flagship store in Los Angeles. Our store hours are Monday to Saturday, 10am to 8pm, and Sunday 12pm to 6pm. Please bring a valid ID as we strictly enforce age verification.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Do you offer wholesale opportunities?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    Yes, we offer wholesale pricing for qualified retailers. Please select "Wholesale Inquiry" in the contact form subject line, and our business development team will reach out with more information.
                                </div>
                            </div>
                        </div>
                        
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    How can I check my order status?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#contactFAQ">
                                <div class="accordion-body">
                                    You can check your order status by logging into your account and visiting the "My Orders" section. Alternatively, you can contact our support team with your order number for assistance.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>