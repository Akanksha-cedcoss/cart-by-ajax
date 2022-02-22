$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "Ajax/onLoad.php",
    data: { action: "showprevious" },
    dataType: "JSON",
    success: function (response) {
      $.fn.loadCart();
      $.fn.updateCart(response);
    },
  });
  //load cart
  $.fn.loadCart = function (response) {
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
  //delete product
  $(document).on("click", ".delete", function (e) {
    e.preventDefault();
    $id = $(this).attr("id");
    $.ajax({
      url: "Ajax/deleteProduct.php",
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
  //add to cart
  $(document).on("click", ".add-to-cart", function (e) {
    $id = $(this).attr("data");
    $.ajax({
      url: "Ajax/addToCart.php",
      method: "POST",
      data: {
        id: $id,
        action: "addToCart",
      },
      dataType: "JSON",
      success: function (response) {
        $.fn.updateCart(response);
      },
    });
  });
  //update table data
  $.fn.updateCart = function (cart) {
    subtotal = 0;
    let table = $("#product-table");
    table.children("tr:not(:first)").remove();
    for (let i = 0; i < cart.length; i++) {
      //find product in product list
      $.ajax({
        url: "Ajax/findProduct.php",
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
      url: "Ajax/subTotal.php",
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
  //end of file
});
