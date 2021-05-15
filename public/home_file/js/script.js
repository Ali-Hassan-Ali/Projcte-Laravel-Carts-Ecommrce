$(document).ready(function(){

	var rtl = false;
    if($("html").attr("lang") == 'ar'){
         rtl = true;
    }
    /*header-fixed*/
    $(window).scroll(function(){
            
        if ($(window).scrollTop() >= 100) {
            $('#header').addClass('fixed-header');
        }
        else {
            $('#header').removeClass('fixed-header');
        }
              
    });
    $('.scroll, .mmenu a').on('click', function () {
        
        $('html, body').animate({
           
            scrollTop: $('#' + $(this).data('value')).offset().top
           
        }, 1000);
        
        $("body,html").removeClass('menu-toggle');
        
        $(".hamburger").removeClass('active');
        
    });
    /*open menu*/
    $(".hamburger").click(function(){
        $("body,html").addClass('menu-toggle');
        $(".hamburger").addClass('active');
    });
    $(".m-overlay").click(function(){
        $("body,html").removeClass('menu-toggle');
        $(".hamburger").removeClass('active');
    });
    
    
    /*dropcart*/
    $(".show-cart").click(function(){
        $(".cart-purches-btn .dropdown-menu").addClass('show');
    });
    $(".remove-drop").click(function(){
        $(".cart-purches-btn .dropdown-menu").removeClass('show');
    });
    
    /*faq*/

    $(document).on('click','.fa-plus,.fa-minus',function(){
        $(this).parent().next().slideToggle(400);
        if ($(this).hasClass("fa fa-plus")) {
            $(this).removeClass('fa fa-plus').addClass('fa fa-minus');
        }else{
            $(this).removeClass('fa fa-minus').addClass('fa fa-plus');
        }
    });


    $(document).on('click','.faqText',function(){
        $(this).parent().next().slideToggle(400);
        if ($(this).next().hasClass("fa fa-plus")) {
            $(this).next().removeClass('fa fa-plus').addClass('fa fa-minus');
        }else{
            $(this).next().removeClass('fa fa-minus').addClass('fa fa-plus');
        }
    });
	
    
    /*slider*/
    
        $("#slider-testi").owlCarousel({
	        loop: true,
            margin: 0,
            rtl: true,
            singleItem:true,
            responsiveClass: true,
            items: 1,
            dots: false,
            nav: true,
            navText:['<i class="zmdi zmdi-long-arrow-left"></i>','<i class="zmdi zmdi-long-arrow-right"></i>'],
            autoplay:true
	    });
        
        $("#card-sellers-slider").owlCarousel({
            loop: true,
            margin: 10,
            rtl: true,
            singleItem:true,
            responsiveClass: true,
            responsive:{
                0:{
                    items:1,
                },
                460:{
                    items:2,
                },
                767:{
                    items:2,
                },
                
                992:{
                    items:4,
                }

            },
            dots: false,
            nav: true,
            navText:['<i class="zmdi zmdi-chevron-left"></i>','<i class="zmdi zmdi-chevron-right"></i>'],
            autoplay:true
        });
    
        $("#slider-subscriber-ratings").owlCarousel({
            loop: true,
            margin: 15,
            rtl: true,
            singleItem:true,
            responsiveClass: true,
            responsive:{
                0:{
                    items:1,
                },
                460:{
                    items:2,
                },
                767:{
                    items:2,
                },
                
                992:{
                    items:3,
                }

            },
            dots: false,
            nav: true,
            navText:['<i class="zmdi zmdi-chevron-left"></i>','<i class="zmdi zmdi-chevron-right"></i>'],
            autoplay:true
        });
    
});


/*Decrease & Increase*/   

var quantity = $(this).parent().find('input[name="quantity"]').val();


console.log(quantity);


var minimum_quanitiy=$(".jsQuantityDecrease").attr("minimum"),
productQuantity=minimum_quanitiy;
$(document).on("click",".jsQuantityDecrease",function(){
    var quantity = $(this).parent().find('input[name="quantity"]').val();
    quantity = quantity * 1;
    var newQuantity = quantity - 1;
    var validate = $(this).parent().find('input[name="DBquantity"]').val();

    // console.log(validate);



    if(newQuantity <= validate){

        $(this).parent().find(".jsQuantityIncrease").show();

    }
    $(this).parent().find('input[name="quantity"]').val(newQuantity);

            var url         = $(this).data('url');
            var method      = $(this).data('method');
            var price       = $(this).data('price');
            var id          = $(this).data('id');

            var quantity    = newQuantity;
            


            // var totale      = quantity * price;

            // console.log(totale);

            $.ajax({
                url : url,
                method : method,
                headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data : {
                    quantity:quantity,
                },
                success: function(data) {
                    
                    $('.total-price'+id).html(new Intl.NumberFormat().format(quantity * price));
                    
                    console.log(data);
                },
                error: function(data) {

                    console.log(data);

                },
            });//this ajax

    // console.log(newQuantity);

    if (newQuantity <2) {
        // $(this).parent().find(".jsQuantityDecrease").addClass("disabled");

    } else{
         $(this).parent().find(".jsQuantityDecrease").removeClass("disabled");
         $(this).parent().find(".jsQuantityIncrease").removeClass("disabled");
    }
}),



$(document).on("click",".jsQuantityIncrease",function(){
    var validate = $(this).parent().find('input[name="DBquantity"]').val();

    var quantity = $(this).parent().find('input[name="quantity"]').val();
    quantity = quantity * 1;
    var newQuantity = quantity + 1;

    // console.log(validate);

   
    if(newQuantity >= validate){

        $(this).parent().find(".jsQuantityIncrease").hide();

        swal({
            title: 'هذه اخر كميه لدينا',
            // title: "@lang('home.finshe')/",
            timer: 12000,
        });

         // $ali = $('input[name="quantity"]').val()

        // if (ali == 2) {

        //     $(this).parent().find(".jsQuantityDecrease").hide();

        // }        

    }

    $(this).parent().find('input[name="quantity"]').val(newQuantity);

        var url         = $(this).data('url');
        var method      = $(this).data('method');
        var price       = $(this).data('price');
        var id          = $(this).data('id');
        var quantity    = newQuantity;

         console.log(quantity);
        // var totale      =Zzzz quantity * price;
        // console.log(totale);
        // console.log(quantity);

        $.ajax({
            url : url,
            method : method,
            headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data : {
                quantity:quantity,
            },
            success: function(data) {

                // $('.total-price'+id).html($.number(quantity * price,2));
                $('.total-price'+id).html(new Intl.NumberFormat().format(quantity * price));
                // console.log();

            
                console.log(data);
            },
            error: function(data) {

                console.log(data);

            },
        });//this ajax

    // console.log(newQuantity);

    
    if (newQuantity >=10) {
        
        // $(this).parent().find(".jsQuantityIncrease").addClass("disabled");
        $(this).parent().find(".jsQuantityDecrease").removeClass("disabled");
    } else{
         $(this).parent().find(".jsQuantityDecrease").removeClass("disabled");

    }
    
});

