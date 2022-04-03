var Products = [
    { id: 101, name: "Basket Ball", image: "basketball.png", price: 150 },
    { id: 102, name: "Football", image: "football.png", price: 120 },
    { id: 103, name: "Soccer", image: "soccer.png", price: 110 },
    { id: 104, name: "Table Tennis", image: "table-tennis.png", price: 130 },
    { id: 105, name: "Tennis", image: "tennis.png", price: 100 },
  ];

$(document).ready(function () {
    $("body").on("click", ".add-to-cart", function (e) {
        e.preventDefault();
        console.log($(this).data("id"));
        $.ajax({
            method: "GET",
            url: "operations.php",
            data: { id: $(this).data("id"), action: "add" },
            dataType: "JSON",
        }).done(function (data) {
            console.log(data);
            cart(data);
        });
    });

    $("#table").on("click", "#delete", function (e) {
        e.preventDefault();
        console.log($(this).data("id"));
        $.ajax({
            method: "GET",
            url: "operations.php",
            data: { id: $(this).data("id"), action: "delete" },
            dataType: "JSON",
        }).done(function (data) {
            console.log(data);
            cart(data);
            
        });
    });

    $("#table").on("blur", "#update", function (e) {
        e.preventDefault();
        console.log($(this).val());
        console.log($(this).data("id"));
        $.ajax({
            method: "GET",
            url: "operations.php",
            data: { id: $(this).data("id"), action: "update" , value : $(this).val() },
            dataType: "JSON",
        }).done(function (data) {
            console.log(data);
            cart(data);
            
        });
    });
});

function cart(data) {
    var total = 0;
   
   
    var html =
        '<table><tr>\
                <th>Name</th>\
                <th>Price</th>\
                <th>Unit Price</th>\
                <th>Action</th>\
                <th>Product Id</th>\
                <th>Quantity</th>\
                </tr>';
    for(var i in data){
     
        for (let j = 0; j < Products.length; j++) {
            if (i == Products[j].id) {
              
              total += data[i] * Products[j].price;
                html +=
                    "<tr style='text-align:center'>\
				<td>"+Products[j].name+"</td>\
                <td>$ " +
                   data[i] * Products[j].price +
                    "</td>\
				<td>$ "+ Products[j].price+" </td>\
				<input type='text' value=" +
                    Products[j].id +
                    " hidden>\
				<td><a href=''  id='delete' data-id="+Products[j].id+">Delete</a></td>\
				<td>"+Products[j].id+"</td>\
                <form action='' method='GET'>\
                    <td><input type='text' id='update' data-id="+Products[j].id+" name='value'  value="+data[i]+"></td>\
                </form>\
			</tr>";
            }
        }
    }
    html += "<tr><td colspan='5'>Final Price : </td><td>$ "+total+"</td></tr></table>";

    $("#table").html(html);
}
