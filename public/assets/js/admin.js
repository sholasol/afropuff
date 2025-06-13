// Admin Dashboard JavaScript

// Sidebar toggle for mobile
function toggleSidebar() {
  const sidebar = document.querySelector(".admin-sidebar")
  sidebar.classList.toggle("show")
}

// Chart initialization (placeholder)
document.addEventListener("DOMContentLoaded", () => {
  initializeCharts()
  updateDashboardStats()
})

function initializeCharts() {
  // This would typically initialize Chart.js or similar library
  console.log("Charts initialized")
}

function updateDashboardStats() {
  // Simulate real-time stats updates
  const stats = {
    orders: 1234,
    revenue: 45678,
    products: 156,
    customers: 2456,
  }

  // Update stat cards with animation
  animateCounter(".stat-number", stats)
}

function animateCounter(selector, targetValue) {
  const elements = document.querySelectorAll(selector)
  elements.forEach((element, index) => {
    const target = Object.values(targetValue)[index]
    let current = 0
    const increment = target / 100

    const timer = setInterval(() => {
      current += increment
      if (current >= target) {
        current = target
        clearInterval(timer)
      }

      if (typeof target === "number") {
        element.textContent = Math.floor(current).toLocaleString()
      }
    }, 20)
  })
}

// Product management
function addProduct() {
  // Show add product modal or navigate to add product page
  console.log("Add product functionality")
}

function editProduct(productId) {
  // Navigate to edit product page
  console.log("Edit product:", productId)
}

function deleteProduct(productId) {
  if (confirm("Are you sure you want to delete this product?")) {
    // Delete product via API
    console.log("Delete product:", productId)
  }
}

// Order management
function updateOrderStatus(orderId, status) {
  // Update order status via API
  console.log("Update order status:", orderId, status)

  // Update UI
  const statusElement = document.querySelector(`[data-order="${orderId}"] .badge`)
  if (statusElement) {
    statusElement.className = `badge status-${status}`
    statusElement.textContent = status.charAt(0).toUpperCase() + status.slice(1)
  }
}

function viewOrder(orderId) {
  // Navigate to order detail page
  console.log("View order:", orderId)
}

// Customer management
function viewCustomer(customerId) {
  // Navigate to customer detail page
  console.log("View customer:", customerId)
}

function exportCustomers() {
  // Export customers to CSV
  console.log("Export customers")
}

// File upload handling
function handleFileUpload(input) {
  const file = input.files[0]
  if (file) {
    const reader = new FileReader()
    reader.onload = (e) => {
      const preview = input.parentElement.querySelector(".image-preview")
      if (preview) {
        preview.src = e.target.result
        preview.style.display = "block"
      }
    }
    reader.readAsDataURL(file)
  }
}

// Data table functionality
function initializeDataTable(tableId) {
  // Initialize DataTables or similar library
  console.log("Initialize data table:", tableId)
}

function filterTable(filterValue, columnIndex) {
  // Filter table by column value
  console.log("Filter table:", filterValue, columnIndex)
}

function sortTable(columnIndex, direction) {
  // Sort table by column
  console.log("Sort table:", columnIndex, direction)
}

// Settings management
function saveSettings() {
  const form = document.getElementById("settingsForm")
  const formData = new FormData(form)

  // Save settings via API
  console.log("Save settings:", Object.fromEntries(formData))

  // Show success message
  showNotification("Settings saved successfully!", "success")
}

function resetSettings() {
  if (confirm("Are you sure you want to reset all settings to default?")) {
    // Reset settings via API
    console.log("Reset settings")
    location.reload()
  }
}

// Notification system
function showNotification(message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`
  notification.style.top = "20px"
  notification.style.right = "20px"
  notification.style.zIndex = "9999"
  notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `

  document.body.appendChild(notification)

  // Auto remove after 5 seconds
  setTimeout(() => {
    notification.remove()
  }, 5000)
}

// Analytics
function generateReport(reportType, dateRange) {
  // Generate analytics report
  console.log("Generate report:", reportType, dateRange)

  showNotification("Report is being generated...", "info")

  // Simulate report generation
  setTimeout(() => {
    showNotification("Report generated successfully!", "success")
  }, 2000)
}

function exportReport(format) {
  // Export report in specified format
  console.log("Export report:", format)
}

// Real-time updates
function startRealTimeUpdates() {
  // Start WebSocket connection for real-time updates
  setInterval(() => {
    updateDashboardStats()
  }, 30000) // Update every 30 seconds
}

// Initialize admin dashboard
document.addEventListener("DOMContentLoaded", () => {
  startRealTimeUpdates()

  // Add click handlers for dynamic elements
  document.addEventListener("click", (e) => {
    if (e.target.matches(".btn-edit")) {
      const id = e.target.dataset.id
      editProduct(id)
    }

    if (e.target.matches(".btn-delete")) {
      const id = e.target.dataset.id
      deleteProduct(id)
    }

    if (e.target.matches(".btn-view-order")) {
      const id = e.target.dataset.id
      viewOrder(id)
    }
  })
})

// Responsive sidebar handling
window.addEventListener("resize", () => {
  const sidebar = document.querySelector(".admin-sidebar")
  if (window.innerWidth > 768) {
    sidebar.classList.remove("show")
  }
})
