window.addEventListener('load', () => {



    $('#nombre').bind('keyup blur', function () {
        var node = $(this);
        node.val(node.val().replace(/[^a-zA-Z]/g, ''));
    });

});