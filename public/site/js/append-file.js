$(document).ready(function() {

    // Append1
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".customer_records"); //Fields wrapper
    var add_button = $(".extra-fields-customer"); //Add button ID

    var x = 0; //initlal text box count
    $(add_button).click(function(e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="customer_records"><input type="text" placeholder="تفاصيل الخدمة" class="form-control" /><a class="remove_field"><i class="fa fa-times"></i></a></div>'); //add input box
            console.log($(wrapper));
        }
        // getFF();
    });


    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })


    // Append2
    var max_fields2 = 10; //maximum input boxes allowed
    var wrapper2 = $(".customer_records2"); //Fields wrapper
    var add_button2 = $(".extra-fields-customer2"); //Add button ID

    var x = 0; //initlal text box count
    $(add_button2).click(function(e) { //on add input button click
        e.preventDefault();
        if (x < max_fields2) { //max input box allowed
            x++; //text box increment
            $(wrapper2).append('<div class="customer_records2"><input type="text" placeholder="تفاصيل الخدمة" class="form-control" /><a class="remove_field"><i class="fa fa-times"></i></a></div>'); //add input box
            console.log($(wrapper2));
        }
        // getFF();
    });


    $(wrapper2).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })


    // Append3
    var max_fields3 = 10; //maximum input boxes allowed
    var wrapper3 = $(".customer_records3"); //Fields wrapper
    var add_button3 = $(".extra-fields-customer3"); //Add button ID

    var x = 0; //initlal text box count
    $(add_button3).click(function(e) {
        e.preventDefault();
        if (x < max_fields3) {
            x++;
            $(wrapper3).append('<div class="customer_records3"><input type="text" placeholder="تفاصيل الخدمة" class="form-control" /><a class="remove_field"><i class="fa fa-times"></i></a></div>'); //add input box
            console.log($(wrapper3));
        }
    });


    $(wrapper3).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })

});