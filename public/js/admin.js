//  PRODUCT CRUD RELATED JAVASCRIPT
var productModal = document.getElementById("create-product-modal");
var exitCreateProductModal = document.getElementById("create-product-modal-exit");
if(exitCreateProductModal){
  exitCreateProductModal.onclick = function () {
    productModal.classList.add("hidden");
  };
}
var createProduct = document.getElementById("create-product");
if (createProduct) {
  createProduct.onclick = function () {
    productModal.classList.remove("hidden");
  };
}
