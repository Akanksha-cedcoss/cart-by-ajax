$(document).ready(function () {

  /**
   * load cart and products on page refresh
   */
  $.ajax({
    type: "POST",
    url: "Utility/Ajax/onLoad.php",
    data: { action: "showprevious" },
    dataType: "JSON",
    success: function (response) {
      $.fn.loadCart();
      $.fn.updateCart(response);
    },
  });
  
  /**
   * add product into cart
   */
  $(document).on("click", ".add-to-cart", function (e) {
    e.preventDefault();
    $id = $(this).attr("data");
    $.ajax({
      url: "Utility/Ajax/addToCart.php",
      method: "POST",
      data: {
        id: $id,
        action: "addToCart",
      },
      dataType: "JSON",
      success: function (response) {
        $.fn.loadCart();
        $.fn.updateCart(response);
      },
    });
  });

  /**
   * load cart template dynamically
   */
  
  $.fn.loadCart = function () {
    var Wrapperdiv = $("#cart");
    Wrapperdiv.append(
      '<div id="product_list"><table id="product-table"></table></div>'
    );
    Wrapperdiv.append('<div id="subtotal"></div>');
    let table = $("#product-table");
    table.append(
      "<tr>" +
        "<th>Product</th>" +
        "<th>Product Name</th>" +
        "<th>Product Price</th>" +
        "<th>Quantity</th>" +
        "<th>Action</th>" +
        "</tr>"
    );
  };
  
  /**
   * Delete product from cart
   */
  $(document).on("click", ".delete", function (e) {
    e.preventDefault();
    $id = $(this).attr("id");
    $.ajax({
      url: "Utility/Ajax/deleteProduct.php",
      method: "POST",
      data: {
        id: $id,
        action: "deleteproduct",
      },
      dataType: "JSON",
      success: function (response) {
        $.fn.updateCart(response);
      },
    });
  });

  /**
   * update Products in cart
   * @param {*} cart 
   */
  $.fn.updateCart = function (cart) {
    let table = $("#product-table");
    table.children("tr:not(:first)").remove();
    for (let i = 0; i < cart.length; i++) {
      //find product in product list
      $.ajax({
        url: "Utility/Ajax/findProduct.php",
        method: "POST",
        data: {
          id: cart[i]["id"],
          action: "findindex",
        },
        dataType: "JSON",
        success: function (product) {
          table.append(
            "<tr class='cart'><td>" +
              "<img class='height' src='images/" +
              product.image +
              "'>" +
              //current_product.id +
              "</td>" +
              "<td>" +
              product.name +
              "</td> " +
              "<td>" +
              product.price +
              "</td>" +
              "<td>" +
              cart[i]["quantity"] +
              "</td>" +
              "<td id='actionTd'><a href='#' class='delete' id='" +
              cart[i]["id"] +
              "' id='delete'>X</a></td>"
          );
        },
      });
    }
    $.ajax({
      url: "Utility/Ajax/subTotal.php",
      method: "POST",
      data: {
        action: "subtotal",
      },
      dataType: "JSON",
      success: function (response) {
        $("#subtotal")
          .empty()
          .append("<p id='subtotal'>Your subtotal is $" + response + "</p>");
      },
    });
  };
  /**
   * end of file
   */
});
