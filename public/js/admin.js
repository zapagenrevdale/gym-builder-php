//  PRODUCT CRUD RELATED JAVASCRIPT
var productModal = document.getElementById("create-product-modal");

var createProduct = document.getElementById("create-product");
if (createProduct) {
  createProduct.onclick = function () {
    productModal.classList.remove("hidden");
  };
}