$(function(){
    $('.add-board').click(function(){
        console.log('clicked!');
        const form = $('.board-form').serialize();
        console.log('serialized form is: '+decodeURI(form));
        $.ajax({
            method: 'post',
            url: '/boards',
            data: form
        });
    });
});
