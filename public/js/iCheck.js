(function ($) {
    'use strict';
    $(function () {
        $('.icheck input').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal',
            increaseArea: '20%'
        });
        $('.icheck-square input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square',
            increaseArea: '20%'
        });
        $('.icheck-flat input').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat',
            increaseArea: '20%'
        });
        var icheckLineArray = $('.icheck-line input');
        for (var i = 0; i < icheckLineArray.length; i++) {
            var self = $(icheckLineArray[i]);
            var label = self.next();
            var label_text = label.text();

            label.remove();
            self.iCheck({
                checkboxClass: 'icheckbox_line-blue',
                radioClass: 'iradio_line',
                insert: '<div class="icheck_line-icon"></div>' + label_text
            });
        }
        $('.icheck-polaris input').iCheck({
            checkboxClass: 'icheckbox_polaris',
            radioClass: 'iradio_polaris',
            increaseArea: '20%'
        });
        $('.icheck-futurico input').iCheck({
            checkboxClass: 'icheckbox_futurico',
            radioClass: 'iradio_futurico',
            increaseArea: '20%'
        });
        $('.action-check input[type="checkbox"]').on('ifChecked', function (event) {
            // alert(event.type + ' callback');
            $('.action-single-check input[type="checkbox"]').iCheck('check')
            var input_value_arr = [];
            $(".action-single-check .checked :input").each(function () {
                var input = $(this); // This is the jquery object of the input, do what you will
                input_value_arr.push(input.val())
            });
            console.log(input_value_arr)
            // console.log($('.action-single-check .checked input[type="checkbox"]').val())
        })

        $('.action-check input[type="checkbox"]').on('ifUnchecked', function (event) {
            // alert(event.type + ' callback');
            $('.action-single-check input[type="checkbox"]').iCheck('uncheck')
        })

        // $('.action-check input[type="checkbox"]').on('ifToggled', function (event) {
        //     // alert(event.type + ' callback');
        //     console.log($('.action-single-check .checked input[type="checkbox"]').val())
        // })



    });
})(jQuery);
