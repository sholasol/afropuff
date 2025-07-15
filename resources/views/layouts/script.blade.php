<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // Add smooth hover effects and interactions
    document.addEventListener('DOMContentLoaded', function() {
        // Animate cards on page load
        const cards = document.querySelectorAll('.card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            }, index * 200);
        });

        // Add stats counter animation
        const statsNumbers = document.querySelectorAll('.stats-number');
        statsNumbers.forEach(stat => {
            const finalValue = stat.textContent;
            if (finalValue.includes('₦')) {
                // For currency values
                const numValue = parseInt(finalValue.replace(/[₦,]/g, ''));
                animateValue(stat, 0, numValue, 1500, '₦');
            } else {
                // For regular numbers
                const numValue = parseInt(finalValue);
                animateValue(stat, 0, numValue, 1000);
            }
        });
    });

    function animateValue(element, start, end, duration, prefix = '') {
        const startTimestamp = performance.now();
        
        function updateValue(timestamp) {
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const currentValue = Math.floor(progress * (end - start) + start);
            
            if (prefix === '₦') {
                element.textContent = prefix + currentValue.toLocaleString();
            } else {
                element.textContent = currentValue;
            }
            
            if (progress < 1) {
                requestAnimationFrame(updateValue);
            }
        }
        
        requestAnimationFrame(updateValue);
    }
</script>