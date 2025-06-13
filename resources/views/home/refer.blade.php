<x-front-layout>
     <!-- Hero Section -->
     <section class="refer-hero">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-6">
                    <div class="refer-hero-content">
                        <h1 class="hero-title">Help a Friend Make the Switch</h1>
                        <p class="hero-subtitle">Refer a smoker to VapeXperience and you'll both receive rewards. Share the benefits of a better alternative.</p>
                        <a href="#refer-form" class="btn btn-orange btn-lg">
                            Refer Now <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="refer-hero-image">
                        <img src="/placeholder.svg?height=600&width=600" alt="Friends vaping together" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works py-5">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h6 class="text-orange">HOW IT WORKS</h6>
                <h2>Three Simple Steps</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <div class="step-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h4>Refer a Friend</h4>
                        <p>Enter your friend's details in the referral form below or share your unique referral link with them.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <div class="step-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h4>They Make a Purchase</h4>
                        <p>Your friend receives a special discount on their first order when they use your referral link.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <div class="step-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h4>You Both Get Rewarded</h4>
                        <p>You'll receive a $15 store credit and your friend gets 15% off their first purchase.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits-section py-5 bg-dark">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h6 class="text-orange">WHY REFER?</h6>
                <h2>Benefits of Switching to Vaping</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-lungs"></i>
                        </div>
                        <h4>Better for Health</h4>
                        <p>Vaping is significantly less harmful than smoking traditional cigarettes, with fewer toxins and carcinogens.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <h4>Cost Effective</h4>
                        <p>Save money in the long run compared to buying cigarettes regularly.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-wind"></i>
                        </div>
                        <h4>No Lingering Smell</h4>
                        <p>Vaping doesn't leave the strong, unpleasant odor that cigarettes do on clothes and in homes.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card">
                        <div class="benefit-icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <h4>Flavor Variety</h4>
                        <p>Choose from hundreds of flavors to find the perfect vaping experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Referral Form -->
    <section id="refer-form" class="referral-form-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="referral-form-card">
                        <h3 class="text-center mb-4">Refer a Friend Today</h3>
                        <form class="referral-form">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="yourName" class="form-label">Your Name*</label>
                                    <input type="text" class="form-control" id="yourName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="yourEmail" class="form-label">Your Email*</label>
                                    <input type="email" class="form-control" id="yourEmail" required>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            <h5 class="mb-3">Friend's Information</h5>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="friendName" class="form-label">Friend's Name*</label>
                                    <input type="text" class="form-control" id="friendName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="friendEmail" class="form-label">Friend's Email*</label>
                                    <input type="email" class="form-control" id="friendEmail" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="personalMessage" class="form-label">Personal Message (Optional)</label>
                                <textarea class="form-control" id="personalMessage" rows="3" placeholder="Add a personal note to your friend..."></textarea>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="ageVerification" required>
                                <label class="form-check-label" for="ageVerification">I confirm that both myself and my friend are 21 years of age or older*</label>
                            </div>
                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="termsAgreement" required>
                                <label class="form-check-label" for="termsAgreement">I agree to the <a href="#terms">Terms and Conditions</a> of the referral program*</label>
                            </div>
                            
                            <button type="submit" class="btn btn-orange btn-lg w-100">
                                <i class="fas fa-paper-plane me-2"></i>Send Referral
                            </button>
                        </form>
                        
                        <div class="referral-share mt-4">
                            <h5 class="text-center mb-3">Or Share Your Referral Link</h5>
                            <div class="input-group">
                                <input type="text" class="form-control" value="https://vapexperience.com/refer?code=YOUR123" id="referralLink" readonly>
                                <button class="btn btn-outline-light" type="button" onclick="copyReferralLink()">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                            <div class="social-share text-center mt-3">
                                <p>Share via:</p>
                                <a href="#" class="social-share-btn"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-share-btn"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-share-btn"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" class="social-share-btn"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials py-5 bg-dark">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h6 class="text-orange">SUCCESS STORIES</h6>
                <h2>Hear From Those Who Made The Switch</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"After 20 years of smoking, I never thought I could quit. My friend referred me to VapeXperience, and it changed everything. I haven't touched a cigarette in 6 months!"</p>
                        <div class="testimonial-author">
                            <img src="/placeholder.svg?height=60&width=60" alt="Mark T." class="author-image">
                            <div class="author-info">
                                <h6>Mark T.</h6>
                                <p>Former smoker of 20 years</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"I was skeptical at first, but the variety of flavors and the ease of use made the transition from cigarettes so much easier. My clothes don't smell anymore, and I feel so much better!"</p>
                        <div class="testimonial-author">
                            <img src="/placeholder.svg?height=60&width=60" alt="Lisa R." class="author-image">
                            <div class="author-info">
                                <h6>Lisa R.</h6>
                                <p>Switched 1 year ago</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="testimonial-card">
                        <div class="testimonial-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <p class="testimonial-text">"I've referred 5 friends to VapeXperience so far. Not only did I get rewards, but I feel good knowing I've helped them find a better alternative to smoking. Win-win!"</p>
                        <div class="testimonial-author">
                            <img src="/placeholder.svg?height=60&width=60" alt="James K." class="author-image">
                            <div class="author-info">
                                <h6>James K.</h6>
                                <p>Referred 5 friends</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section py-5">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h6 class="text-orange">QUESTIONS?</h6>
                <h2>Frequently Asked Questions</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="referralFAQ">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How many friends can I refer?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#referralFAQ">
                                <div class="accordion-body">
                                    <p>There's no limit to how many friends you can refer! You'll receive a $15 store credit for each successful referral, and each friend will get 15% off their first purchase.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    When do I receive my reward?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#referralFAQ">
                                <div class="accordion-body">
                                    <p>You'll receive your $15 store credit once your referred friend makes their first purchase. The credit will be automatically added to your account and can be used on your next order.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Do referral credits expire?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#referralFAQ">
                                <div class="accordion-body">
                                    <p>Yes, referral credits expire 90 days after they are issued. Make sure to use them before they expire! You can check your available credits in your account dashboard.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Can I refer someone who already has an account?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#referralFAQ">
                                <div class="accordion-body">
                                    <p>No, the referral program is only valid for new customers who don't already have an account with VapeXperience. The email address used for the referral must not be associated with an existing account.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Can I combine referral credits with other promotions?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#referralFAQ">
                                <div class="accordion-body">
                                    <p>Yes, in most cases referral credits can be combined with other promotions and discounts. However, some special promotions may exclude the use of referral credits. Any such restrictions will be clearly noted in the promotion details.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5 bg-dark">
        <div class="container">
            <div class="cta-card">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2>Ready to Help a Friend Make the Switch?</h2>
                        <p>Refer a friend today and you'll both enjoy the benefits of VapeXperience products and exclusive rewards.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                        <a href="#refer-form" class="btn btn-orange btn-lg">Refer Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front-layout>