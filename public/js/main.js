var userButton = document.getElementById("user-icon");
if (userButton) {
  userButton.onclick = function () {
    window.location.href = "/login";
  };
}

var cartButton = document.getElementById("cart-icon");
if (cartButton) {
  cartButton.onclick = function () {
  };
}

var logoButton = document.getElementById("logo");
if (logoButton) {
  logoButton.onclick = function () {
    window.location.href = "/";
  };
}

// home page javascripts

var storeButton = document.getElementById("store-button");
if (storeButton) {
  storeButton.onclick = function () {
    window.location.href = "/store";
  };
}



