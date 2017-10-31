$(document).ready(function(){

    $('form#formaddtocart').submit(function (ev) {
        var id=$(this).children("input[name=id]").val();
        var count=$(this).children("input[name=count]").val();
        var url=$(this).attr('action');

        ev.preventDefault();
        $.ajax({
            url:url,
            type:'get',
            data:{'id':id,'count':count},
            dataType:'json',
            success:function (date) {
                $('#comment').css('opacity',1);
                $('#comment').html(date['comment']);
                setTimeout(function () {
                    $('#comment').animate({'opacity':0},1000);
                },2000);
            },
            error:function (er) {

                console.log(er);
            }
        });

    });

    $('.good #cart_less').click(function(){
        var id=$(this).attr('value');
        $.ajax({
            url:'cart/lesscount',
            type:'get',
            dataType:'json',
            data:{'id':id},
            success:function (date) {
                $('#allprice').html('$'+date['allprice']);
                $('#good_'+id+' #count').html(date['count']);
            },
            error:function (er) {

                console.log(er);
            }
        });
    });


    $('.good #cart_more').click(function(){
        var id=$(this).attr('value');
        $.ajax({
            url:'cart/morecount',
            type:'get',
            dataType:'json',
            data:{'id':id},
            success:function (date) {
                $('#allprice').html(date['allprice']+' bel.rub.');
                $('#good_'+id+' #count').html(date['count']);
            },
            error:function (er) {

                console.log(er);
            }
        });
    });
});