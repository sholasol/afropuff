<x-front-layout>
    <style>
        .success-page {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .success-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            position: relative;
            overflow: hidden;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-card-body {
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .floating-particles {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 1;
        }

        .particle {
            position: absolute;
            width: 8px;
            height: 8px;
            background: linear-gradient(45deg, #f59e0b, #d97706);
            border-radius: 50%;
            animation: float 3s ease-in-out infinite;
        }

        .particle:nth-child(1) { top: 20%; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { top: 60%; left: 20%; animation-delay: 0.5s; }
        .particle:nth-child(3) { top: 30%; right: 15%; animation-delay: 1s; }
        .particle:nth-child(4) { top: 70%; right: 25%; animation-delay: 1.5s; }
        .particle:nth-child(5) { top: 40%; left: 80%; animation-delay: 2s; }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.7;
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 1;
            }
        }

        .success-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 2rem auto;
            border-radius: 50%;
            background: linear-gradient(135deg, #10b981, #059669);
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s ease-in-out infinite;
            box-shadow: 0 15px 35px rgba(16, 185, 129, 0.3);
            position: relative;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 15px 35px rgba(16, 185, 129, 0.3);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 20px 45px rgba(16, 185, 129, 0.4);
            }
        }

        .success-icon i {
            font-size: 4rem;
            color: white;
            animation: checkmarkDraw 0.8s ease-in-out 0.3s both;
        }

        @keyframes checkmarkDraw {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .success-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #059669, #10b981);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        .success-message {
            font-size: 1.2rem;
            color: #6b7280;
            margin-bottom: 2rem;
            line-height: 1.6;
            animation: fadeInUp 0.8s ease-out 0.4s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .success-alert {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            color: #059669;
            animation: fadeInUp 0.8s ease-out 0.6s both;
            font-weight: 500;
        }

        .order-summary {
            background: rgba(16, 185, 129, 0.08);
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            animation: fadeInUp 0.8s ease-out 0.6s both;
        }

        .order-summary h4 {
            color: #059669;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .order-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            color: #4b5563;
        }

        .order-info:last-child {
            margin-bottom: 0;
            font-weight: 600;
            color: #059669;
            padding-top: 0.5rem;
            border-top: 1px solid rgba(16, 185, 129, 0.2);
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: fadeInUp 0.8s ease-out 0.8s both;
        }

        .btn-enhanced {
            padding: 0.875rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary.btn-enhanced {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .btn-primary.btn-enhanced:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.4);
            color: white;
            text-decoration: none;
        }

        .btn-outline-primary.btn-enhanced {
            background: rgba(255, 255, 255, 0.8);
            color: #4b5563;
            border: 2px solid rgba(16, 185, 129, 0.3);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-outline-primary.btn-enhanced:hover {
            background: rgba(16, 185, 129, 0.1);
            border-color: #10b981;
            color: #059669;
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(16, 185, 129, 0.2);
            text-decoration: none;
        }

        .btn-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-enhanced:hover::before {
            left: 100%;
        }

        .confetti {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1000;
        }

        .confetti-piece {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #f59e0b;
            animation: confetti-fall 3s linear infinite;
        }

        .confetti-piece:nth-child(odd) {
            background: #10b981;
            animation-delay: 0.5s;
        }

        .confetti-piece:nth-child(3n) {
            background: #3b82f6;
            animation-delay: 1s;
        }

        @keyframes confetti-fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        @media (max-width: 768px) {
            .success-card-body {
                padding: 2rem 1.5rem;
            }
            
            .success-title {
                font-size: 2rem;
            }
            
            .success-message {
                font-size: 1.1rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-enhanced {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }
    </style>

    <div class="success-page">
        <div class="confetti" id="confetti"></div>
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card success-card">
                        <div class="floating-particles">
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                            <div class="particle"></div>
                        </div>
                        
                        <div class="card-body success-card-body">
                            <div class="mb-4">
                                <div class="success-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                            </div>
                            
                            <h2 class="success-title">Payment Successful!</h2>
                            <p class="success-message">
                                Thank you for your purchase! Your order has been confirmed and you'll receive an email confirmation shortly.
                            </p>
                            
                            @if(session('success'))
                                <div class="success-alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            <!-- Order Summary Section -->
                            <div class="order-summary">
                                <h4><i class="fas fa-receipt me-2"></i>Order Summary</h4>
                                <div class="order-info">
                                    <span><i class="fas fa-hashtag me-1"></i>Order Number:</span>
                                    <span>#ORD-{{ date('Y') }}-{{ str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="order-info">
                                    <span><i class="fas fa-credit-card me-1"></i>Payment Method:</span>
                                    <span>•••• •••• •••• 1234</span>
                                </div>
                                <div class="order-info">
                                    <span><i class="fas fa-truck me-1"></i>Estimated Delivery:</span>
                                    <span>3-5 Business Days</span>
                                </div>
                                <div class="order-info">
                                    <span><i class="fas fa-dollar-sign me-1"></i>Total Amount:</span>
                                    <span>${{ number_format(session('total_amount', 149.99), 2) }}</span>
                                </div>
                            </div>
                            
                            <div class="action-buttons mt-4">
                                <a href="{{ route('home') }}" class="btn btn-primary btn-enhanced me-2">
                                    <i class="fas fa-list-ul me-2"></i>View Orders
                                </a>
                                <a href="{{ route('shop') }}" class="btn btn-outline-primary btn-enhanced">
                                    <i class="fas fa-shopping-cart me-2"></i>Continue Shopping
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Create confetti effect
        function createConfetti() {
            const confetti = document.getElementById('confetti');
            for (let i = 0; i < 50; i++) {
                const piece = document.createElement('div');
                piece.className = 'confetti-piece';
                piece.style.left = Math.random() * 100 + '%';
                piece.style.animationDelay = Math.random() * 3 + 's';
                piece.style.animationDuration = (Math.random() * 3 + 2) + 's';
                confetti.appendChild(piece);
            }
            
            // Remove confetti after animation
            setTimeout(() => {
                confetti.innerHTML = '';
            }, 6000);
        }

        // Trigger confetti on page load
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(createConfetti, 500);
        });

        // Add ripple effect to buttons
        document.querySelectorAll('.btn-enhanced').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const ripple = document.createElement('div');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.3);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    width: ${size}px;
                    height: ${size}px;
                    left: ${x}px;
                    top: ${y}px;
                    pointer-events: none;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</x-front-layout>