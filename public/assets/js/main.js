// VapeXperience Main JavaScript

// Navbar scroll effect
window.addEventListener("scroll", () => {
  const navbar = document.querySelector(".navbar")
  if (window.scrollY > 50) {
    navbar.style.backgroundColor = "rgba(17, 17, 17, 0.98)"
  } else {
    navbar.style.backgroundColor = "rgba(17, 17, 17, 0.95)"
  }
})

// Product quantity controls
function increaseQuantity() {
  const quantityInput = document.getElementById("quantity")
  if (quantityInput) {
    quantityInput.value = Number.parseInt(quantityInput.value) + 1
  }
}

function decreaseQuantity() {
  const quantityInput = document.getElementById("quantity")
  if (quantityInput && Number.parseInt(quantityInput.value) > 1) {
    quantityInput.value = Number.parseInt(quantityInput.value) - 1
  }
}

// Cart functionality
function updateQuantity(itemId, change) {
  const quantityElement = document.querySelector(`[data-item="${itemId}"] .quantity`)
  if (quantityElement) {
    const currentQuantity = Number.parseInt(quantityElement.textContent)
    const newQuantity = currentQuantity + change

    if (newQuantity >= 1) {
      quantityElement.textContent = newQuantity
      updateItemTotal(itemId, newQuantity)
      updateCartTotal()
    }
  }
}

function removeItem(itemId) {
  const itemElement = document.querySelector(`[data-item="${itemId}"]`)
  if (itemElement) {
    itemElement.remove()
    updateCartTotal()
  }
}

function updateItemTotal(itemId, quantity) {
  const itemElement = document.querySelector(`[data-item="${itemId}"]`)
  if (itemElement) {
    const priceElement = itemElement.querySelector(".item-price")
    const totalElement = itemElement.querySelector(".item-total")

    if (priceElement && totalElement) {
      const price = Number.parseFloat(priceElement.textContent.replace("$", ""))
      const total = price * quantity
      totalElement.textContent = `$${total.toFixed(2)}`
    }
  }
}

function updateCartTotal() {
  const itemTotals = document.querySelectorAll(".item-total")
  let subtotal = 0

  itemTotals.forEach((total) => {
    subtotal += Number.parseFloat(total.textContent.replace("$", ""))
  })

  const tax = subtotal * 0.08 // 8% tax
  const grandTotal = subtotal + tax

  // Update summary
  const subtotalElement = document.querySelector(".summary-item:first-child span:last-child")
  const taxElement = document.querySelector(".summary-item:nth-child(3) span:last-child")
  const totalElement = document.querySelector(".summary-total span:last-child")

  if (subtotalElement) subtotalElement.textContent = `$${subtotal.toFixed(2)}`
  if (taxElement) taxElement.textContent = `$${tax.toFixed(2)}`
  if (totalElement) totalElement.textContent = `$${grandTotal.toFixed(2)}`
}

// Password toggle
function togglePassword() {
  const passwordInput = document.getElementById("password")
  const toggleIcon = document.getElementById("toggleIcon")

  if (passwordInput.type === "password") {
    passwordInput.type = "text"
    toggleIcon.classList.remove("fa-eye")
    toggleIcon.classList.add("fa-eye-slash")
  } else {
    passwordInput.type = "password"
    toggleIcon.classList.remove("fa-eye-slash")
    toggleIcon.classList.add("fa-eye")
  }
}

// Product image gallery
document.addEventListener("DOMContentLoaded", () => {
  const thumbnails = document.querySelectorAll(".thumbnail")
  const mainImage = document.querySelector(".main-image img")

  thumbnails.forEach((thumbnail) => {
    thumbnail.addEventListener("click", function () {
      // Remove active class from all thumbnails
      thumbnails.forEach((t) => t.classList.remove("active"))

      // Add active class to clicked thumbnail
      this.classList.add("active")

      // Update main image
      if (mainImage) {
        mainImage.src = this.src
      }
    })
  })
})

// Wishlist functionality
function toggleWishlist(productId) {
  const wishlistBtn = document.querySelector(`[data-product="${productId}"] .wishlist-btn i`)

  if (wishlistBtn) {
    if (wishlistBtn.classList.contains("far")) {
      wishlistBtn.classList.remove("far")
      wishlistBtn.classList.add("fas")
      wishlistBtn.style.color = "#ff7a00"
    } else {
      wishlistBtn.classList.remove("fas")
      wishlistBtn.classList.add("far")
      wishlistBtn.style.color = ""
    }
  }
}

// Form validation
function validateForm(formId) {
  const form = document.getElementById(formId)
  const inputs = form.querySelectorAll("input[required], select[required]")
  let isValid = true

  inputs.forEach((input) => {
    if (!input.value.trim()) {
      input.classList.add("is-invalid")
      isValid = false
    } else {
      input.classList.remove("is-invalid")
    }
  })

  return isValid
}

// Age verification
function verifyAge() {
  const ageVerification = document.getElementById("ageVerification")
  if (ageVerification && !ageVerification.checked) {
    alert("You must be 21 or older to purchase vape products.")
    return false
  }
  return true
}

// Newsletter subscription
function subscribeNewsletter() {
  const emailInput = document.querySelector('.newsletter-section input[type="email"]')
  const email = emailInput.value.trim()

  if (email && isValidEmail(email)) {
    // Here you would typically send the email to your backend
    alert("Thank you for subscribing to our newsletter!")
    emailInput.value = ""
  } else {
    alert("Please enter a valid email address.")
  }
}

function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  return emailRegex.test(email)
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault()
    const target = document.querySelector(this.getAttribute("href"))
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      })
    }
  })
})

// Loading states for buttons
function showLoading(buttonElement) {
  const originalText = buttonElement.innerHTML
  buttonElement.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...'
  buttonElement.disabled = true

  // Store original text for restoration
  buttonElement.dataset.originalText = originalText
}

function hideLoading(buttonElement) {
  const originalText = buttonElement.dataset.originalText
  if (originalText) {
    buttonElement.innerHTML = originalText
    buttonElement.disabled = false
  }
}

// Initialize tooltips and popovers
document.addEventListener("DOMContentLoaded", () => {
  // Initialize Bootstrap tooltips
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl))

  // Initialize Bootstrap popovers
  const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  popoverTriggerList.map((popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl))
})
