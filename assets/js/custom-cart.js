function showToast(message) {
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.style.position = 'fixed';
        toastContainer.style.top = '20px';
        toastContainer.style.right = '20px';
        toastContainer.style.zIndex = '9999';
        document.body.appendChild(toastContainer);
    }

    const toast = document.createElement('div');
    toast.className = 'toast align-items-center text-white bg-success border-0';
    toast.setAttribute('role', 'alert');
    toast.setAttribute('aria-live', 'assertive');
    toast.setAttribute('aria-atomic', 'true');
    
    toast.innerHTML = `
      <div class="d-flex">
        <div class="toast-body fs-6 fw-bold">
          <svg width="20" height="20" class="me-2 text-white"><use xlink:href="#cart"></use></svg> 
          ${message}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    `;
    
    toastContainer.appendChild(toast);
    var bsToast = new bootstrap.Toast(toast, {delay: 3000});
    bsToast.show();
    
    toast.addEventListener('hidden.bs.toast', function () {
        toast.remove();
    });
}

function addToCart(productId) {
    var qty = document.getElementById('qty_' + productId).value;
    var formData = new FormData();
    formData.append('action', 'add');
    formData.append('product_id', productId);
    formData.append('quantity', qty);

    fetch('ajax_cart.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success') {
            showToast("Product successfully added to cart! 🛒");
            updateCartDisplay();
        } else {
            showToast("Error adding to cart.");
        }
    })
    .catch(error => console.error('Error:', error));
}

function updateCartDisplay() {
    var formData = new FormData();
    formData.append('action', 'get');
    fetch('ajax_cart.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if(data.status === 'success') {
            var cartList = document.querySelector('.offcanvas-body .list-group');
            if(cartList) {
                cartList.innerHTML = '';
                var html = '';
                data.items.forEach(item => {
                    html += `
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                      <div>
                        <h6 class="my-0">${item.name}</h6>
                        <small class="text-body-secondary">Qty: ${item.quantity}</small>
                      </div>
                      <span class="text-body-secondary">₹${item.price}</span>
                    </li>`;
                });
                html += `
                <li class="list-group-item d-flex justify-content-between">
                  <span>Total (INR)</span>
                  <strong>₹${data.total}</strong>
                </li>`;
                cartList.innerHTML = html;
                
                // Update badge cart 
                var badges = document.querySelectorAll('.badge.bg-primary.rounded-pill');
                badges.forEach(function(badge) {
                    badge.innerText = data.items.length;
                });
            }
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    updateCartDisplay();
});
