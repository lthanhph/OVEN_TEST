$(document).ready(function(){
    $('.todo-checkbox').click(markComplete);
    $('.todo-item label').click(markComplete);

    $('.todo-item').click(function() {
        window.location.href = $(this).attr('data-route-edit');
    });

    $('.search-form').submit(function(event) {
        var name = $(this).find('input[name="name"]').val();
        var time = $(this).find('input[name="time"]').val();

        if (!name && !time) {
            event.preventDefault();
        }
    });
})

function markComplete(event){
    if ($(this).is('input[type="checkbox"]')) {
        var id = $(this).attr('id');
    } else if ($(this).is('label')) {
        var id = $(this).attr('for');
    }
    
    if ($(this).is(":checked")) {
        $('label[for='+id+']').css('text-decoration', 'line-through');
    } else {
        $('label[for='+id+']').css('text-decoration', 'none');
    }
    event.stopPropagation();
}