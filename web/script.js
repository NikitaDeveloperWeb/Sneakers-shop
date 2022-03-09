let CART_LIST = document.querySelector('.cart-list');

let PRODUCTS = [];

const addProduct = (product) => {
  PRODUCTS.push(product);
};

const deleteProduct = (product) => {
  let elem = PRODUCTS.indexOf(product);
  delete PRODUCTS[elem];
};
