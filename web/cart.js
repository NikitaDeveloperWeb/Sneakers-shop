class Cart {
  constructor(selector, items, selectors) {
    this.selector = selector;
    this.$el = document.querySelector('.' + selector);
    this.$items = items;
    this.price = 0;
    (this.$add_elem = document.querySelector('#' + selectors[0])),
      (this.$delete_item = document.querySelector('#' + selectors[1])),
      //methods
      // this.#setup();
      this.render();
  }
  render() {
    let items = this.$items;
  }

  addItem() {}
  deleteItem() {}
}

// cart
const CART = new Cart('cart', [], ['add_item', 'delete_item']);
