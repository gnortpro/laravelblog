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

        // get single checked value
        var input_single_value_arr = [];
        $('.action-single-check input[type="checkbox"]').on('ifChecked', function (event) {
            input_single_value_arr.push(event.currentTarget.value)
        })
        $('.action-single-check input[type="checkbox"]').on('ifUnchecked', function (event) {
            var arr_position = input_single_value_arr.indexOf(event.currentTarget.value)
            if (arr_position > -1) {
                input_single_value_arr.splice(arr_position, 1);
            }
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#makePostaction').submit(function (e) {
            e.preventDefault();
            var option = $('#postAction').find(":selected").val();
            var author_id = $('#author_id').val();
            var data = {
                option: option,
                author_id: author_id,
                post_slug: input_single_value_arr
            }
            if (input_single_value_arr.length > 0) {
                $.ajax({
                    type: "POST",
                    url: $('#api_url').val() + '/api/post/action',
                    data: JSON.stringify(data),
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function (res) {
                        if (res.err == 0) {
                            swal({
                                title: 'Congratulations!',
                                text: option + ' succesfully!',
                                icon: 'success',
                                button: {
                                    text: "OK",
                                    value: true,
                                    visible: true,
                                    className: "btn btn-primary"
                                }
                            }).then((value) => {
                                if (value) {
                                    location.reload();
                                }
                            })
                        }

                    },
                });
            }

        })

    });
})(jQuery);
