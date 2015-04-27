$(function(){

    $('select[data-ajax="true"]').change(function() {
        var url = $(this).attr('data-url');
        var attr = $(this).attr('data-attribute');
        var value = $(this).val();
        url += '?' + attr + '=' + value;

        var target = $('select[id$="' + $(this).attr('data-target') + '"]');
        target.find('option:gt(0)').remove();

        $.post(url, function(data) {
            data = JSON.parse(data);
            for (var key in data) {
                target.append($("<option />").val(key).text(data[key]));
            }
        });
    });
});