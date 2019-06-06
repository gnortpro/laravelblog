$(document).ready(function () {
    $("#Restaurant_Name").keyup(function () {
        var Text = $(this).val();
        Text = Text.toLowerCase();
        var regExp = /\s+/g;
        Text = Text.replace(regExp, '-');
        $("#Restaurant_Slug").val(Text);
    });
})
