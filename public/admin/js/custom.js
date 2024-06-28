$(document).ready(function () {


    // Section Datatable
    $('#section').DataTable();
    //CATEGORY Datatable
    $('#category').DataTable();
    //BRANDS Datatable
    $('#brand').DataTable();
    //Product Datatable
    $('#product').DataTable();


    $(".nav-item").removeClass('active');
    $(".nav-link").removeClass('active');
    $('#current_password').keyup(function (e) {
        var current_password = $('#current_password').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "check-current-password",
            data: {
                current_password: current_password
            },
            success: function (response) {
                // alert(response);
                if (response == 'false') {
                    $('#check_password').html("<font color='red'>Password not Correst</font>");
                } else if (response == 'true') {
                    $('#check_password').html("<font color='green'>Password is Correst</font>");
                }
            },
            error: function () {
                alert('Error');
            }
        });
    });

    // update Admin Status
    $(document).on('click', '.updateAdminStatus', function () {
        var status = $(this).children('i').attr("status");
        var admin_id = $(this).attr("admin_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "update-admin-status",
            data: {
                status: status,
                admin_id: admin_id
            },
            success: function (response) {
                if (response['status'] == 0) {
                    $('#admin-' + admin_id).html("<i class='mdi mdi-bookmark-outline' status='Inactive' style='font-size: 25px'></i>");
                } else if (response['status'] == 1) {
                    $('#admin-' + admin_id).html("<i class='mdi mdi-bookmark-check' status='Active' style='font-size: 25px'></i>");
                }

            },
            error: function () {
                alert('Error');
            }
        });
    });

    // country state changes

    $('#company_country').change(function () {

        var country_id = this.value;
        $("#company_state").html('');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/superadmin/change-state",
            data: {
                country_id: country_id
            },
            success: function (response) {
                //alert(response);

                $('#company_state').html('<option value="">Select State</option>');
                $.each(response.states, function (key, value) {
                    $("#company_state").append('<option value="' + value
                        .id + '">' + value.name + '</option>');
                });


            },
            error: function () {
                alert('Error');
            }
        });
    });


    // update Sections Status
    $(document).on('click', '.updateSectionStatus', function () {
        var status = $(this).children('i').attr("status");
        var section_id = $(this).attr("section_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "update-section-status",
            data: {
                status: status,
                section_id: section_id
            },
            success: function (response) {
                //alert(response)
                if (response['status'] == 0) {
                    $('#section-' + section_id).html("<i class='mdi mdi-bookmark-outline' status='Inactive' style='font-size: 25px'></i>");
                } else if (response['status'] == 1) {
                    $('#section-' + section_id).html("<i class='mdi mdi-bookmark-check' status='Active' style='font-size: 25px'></i>");
                }

            },
            error: function () {
                alert('Error');
            }
        });
    });
    // update brands Status
    $(document).on('click', '.updateBrandStatus', function () {
        var status = $(this).children('i').attr("status");
        var brand_id = $(this).attr("brand_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "update-brand-status",
            data: {
                status: status,
                brand_id: brand_id
            },
            success: function (response) {
                //alert(response)
                if (response['status'] == 0) {
                    $('#brand-' + brand_id).html("<i class='mdi mdi-bookmark-outline' status='Inactive' style='font-size: 25px'></i>");
                } else if (response['status'] == 1) {
                    $('#brand-' + brand_id).html("<i class='mdi mdi-bookmark-check' status='Active' style='font-size: 25px'></i>");
                }

            },
            error: function () {
                alert('Error');
            }
        });
    });


    // update Category Status
    $(document).on('click', '.updateCategoryStatus', function () {
        var status = $(this).children('i').attr("status");
        var category_id = $(this).attr("category_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/superadmin/update-category-status",
            data: {
                status: status,
                category_id: category_id
            },
            success: function (response) {
                //alert(response)
                if (response['status'] == 0) {
                    $('#category-' + category_id).html("<i class='mdi mdi-bookmark-outline' status='Inactive' style='font-size: 25px'></i>");
                } else if (response['status'] == 1) {
                    $('#category-' + category_id).html("<i class='mdi mdi-bookmark-check' status='Active' style='font-size: 25px'></i>");
                }

            },
            error: function () {
                alert('Error');
            }
        });
    });


    // update Product Status
    $(document).on('click', '.updateProductStatus', function () {
        var status = $(this).children('i').attr("status");
        var product_id = $(this).attr("product_id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/superadmin/update-product-status",
            data: {
                status: status,
                product_id: product_id
            },
            success: function (response) {
                //alert(response)
                if (response['status'] == 0) {
                    $('#product-' + product_id).html("<i class='mdi mdi-bookmark-outline' status='Inactive' style='font-size: 25px'></i>");
                } else if (response['status'] == 1) {
                    $('#product-' + product_id).html("<i class='mdi mdi-bookmark-check' status='Active' style='font-size: 25px'></i>");
                }

            },
            error: function () {
                alert('Error');
            }
        });
    });


    // update Attribute Status
    $(document).on('click', '.updateAttributeStatus', function () {
        var status = $(this).children('i').attr("status");
        var attribute_id = $(this).attr("attribute_id");
        //alert(attribute_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/superadmin/update-attribute-status",
            data: {
                status: status,
                attribute_id: attribute_id
            },
            success: function (response) {
                //alert(response)
                if (response['status'] == 0) {
                    $('#attribute-' + attribute_id).html("<i class='mdi mdi-bookmark-outline' status='Inactive' style='font-size: 25px'></i>");
                } else if (response['status'] == 1) {
                    $('#attribute-' + attribute_id).html("<i class='mdi mdi-bookmark-check' status='Active' style='font-size: 25px'></i>");
                }

            },
            error: function () {
                alert('Error');
            }
        });
    });
    // update Image Status
    $(document).on('click', '.updateImageStatus', function () {
        var status = $(this).children('i').attr("status");
        var image_id = $(this).attr("image_id");
        //alert(status);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "/superadmin/update-image-status",
            data: {
                status: status,
                image_id: image_id
            },
            success: function (response) {
                //alert(response)
                if (response['status'] == 0) {
                    $('#image-' + image_id).html("<i class='mdi mdi-bookmark-outline' status='Inactive' style='font-size: 25px'></i>");
                } else if (response['status'] == 1) {
                    $('#image-' + image_id).html("<i class='mdi mdi-bookmark-check' status='Active' style='font-size: 25px'></i>");
                }

            },
            error: function () {
                alert('Error');
            }
        });
    });




    // confirm delete Sweet alert
    $(document).on("click", ".comfirmDelete", function () {

        var module = $(this).attr('module');
        var moduleid = $(this).attr('moduleid');
        //alert(moduleid);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                window.location = "/superadmin/delete-"+module+"/"+moduleid;
            }
        })

    });


    // append cart level

    $('#section_id').change(function () {
       var section_id = $(this).val();
        //alert(section_id);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "get",
            url: "/superadmin/append-category-level",
            data: {
                section_id: section_id
            },
            success: function (response) {
                //alert(response)
            $('#appendCategoryLevel').html(response);

            },
            error: function () {
                alert('Error');
            }
        });
    });

// product Attribute Add/Remove
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><div style="height: 15px"></div><input type="text" name="size[]" placeholder="Size" style="width: 100px" />&nbsp;<input type="text" name="sku[]" placeholder="Sku" style="width: 100px" />&nbsp;<input type="text" name="price[]" placeholder="Price" style="width: 100px" />&nbsp;<input type="text" name="stock[]" placeholder="Stock" style="width: 100px" />&nbsp;<a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

});
