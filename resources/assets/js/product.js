var $dropzoneEl = $('.js-dropzone');
var $dropzonePreview = $('.js-dropzone-files');
var $input = $dropzoneEl.find('.js-dropzone-input');

var files = [];
var sort_files = [];

$(document).ready(function () {

    $(document).on('click', '.js-delete-photo', function () {
        // console.log(sort_files);
        $(this).parents('.drag').remove();
        $dropzonePreview.append('<li class="goods-photo__item preview" ><div></div></li>');
        // sort_files = [];
        // $('.drag').each(function (i, item) {
        //     sort_files.push(files[$(this).data('index')]);
        // });
        // console.log(sort_files);
    });

    var loaded_photos = $('input[name="loaded_photos[]"]');

    $('#sortable').sortable({
        items: "> .drag",
        update: function (event, ui) {
            if (loaded_photos.length == 0) {
                $('#sortable li').each(function (i, item) {
                    sort_files[i] = files[$(this).data('index')];
                });
            }
        }
    });

    $('#sortable').disableSelection();

    $.extend($.validator.messages, {
        required: "Это поле обязательное для заполнения",
    });

    if (loaded_photos.length == 0) $('#product-form').validate({
        lang: 'ru'
    });
    $('#product-form').submit(function (e) {
        e.preventDefault();
        var formData = new FormData();
        var $this = $(this);
        $this.validate({
            lang: 'ru'
        });


        if (!sort_files.length && loaded_photos.length == 0) {
            $('#photos_err').show();
            return;
        }

        if (loaded_photos.length) {
            formData.append('product_id', $this.find('input[name="product_id"]').val());
            loaded_photos = $('input[name="loaded_photos[]"]');
            loaded_photos.each(function (i, item) {
                formData.append('loaded_photos[]', $(this).val());
            });
        }

        sort_files = [];
        if ($('.drag').length){
            $('.drag').each(function () {
                sort_files.push(files[$(this).data('index')]);
            });
        }
        console.log(sort_files);
        for (var i = 0; i < sort_files.length; i++) {
            formData.append('photos[]', sort_files[i]);
        }
        formData.append('name', $this.find('textarea[name="name"]').val());
        formData.append('description', $this.find('textarea[name="description"]').val());
        formData.append('composition', $this.find('textarea[name="composition"]').val());
        formData.append('price', $this.find('input[name="price"]').val());
        if ($this.find('input[name="delivery[]"]:checked').length) {
            $this.find('input[name="delivery[]"]:checked').each(function () {
                formData.append('delivery[]', $(this).val());
            });
        }
        if ($this.find('input[name="delivery[]"]:checked').length) {
            $this.find('input[name="delivery_price[]"]:input:enabled').each(function () {
                formData.append('delivery_price[]', $(this).val());
            });
        }
        if ($this.find('textarea[name="address"]').val()) formData.append('address', $this.find('textarea[name="address"]').val());
        formData.append('category_id', $this.find('select[name="category_id"]').val());
        formData.append('qty', $this.find('#quant-val').val());
        if ($this.find('#any:checked').length) formData.append('qty_null', $this.find('#any:checked').val());
        formData.append('term_dispatch_id', $this.find('select[name="term_dispatch_id"]').val());
        if ($this.find('select[name="color[]"]').val().length) {
            var colors = $this.find('select[name="color[]"]').val();
            for (var i = 0; i < colors.length; i++) {
                formData.append('color[]', colors[i]);
            }
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: $this.attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            cache: false,
            contentType: false,
            success: function (res) {
                res = JSON.parse(res);
                // console.log(res);
                location.href = res.url;
            }
        });
    });

});

if ($dropzoneEl.length) {
    var dropzone = new Dropzone('.js-dropzone', {
        url: $dropzoneEl.closest('form').attr('action'),
        paramName: 'photos[]',
        createImageThumbnails: false,
        previewsContainer: false,
        acceptedFiles: '.jpeg, .jpg, .png',
        renameFile: false,
        maxFiles: 8,
        parallelUploads: 3,
        autoProcessQueue: false,
    });

    dropzone.on('addedfile', function (file) {
        // if (files.length == 0) $dropzonePreview.find('.goods-photo__item').remove();
        if (files.length < 8) {
            $dropzonePreview.find('.goods-photo__item.preview').first().remove();
            files.push(file);
            sort_files.push(file);
            // $dropzonePreview.css('justifyContent', 'flex-start');
            var reader = new FileReader();
            var index = files.length;
            reader.onloadend = function () {
                $dropzonePreview.prepend(
                    '<li data-index="' + (index - 1) + '" class="goods-photo__item drag">' +
                    '<div class="product-preview-cover">' +
                    '<p class="js-delete-photo">Удалить</p>' +
                    '</div>' +
                    '<div style="border-radius: 4px; background-image: url(' + reader.result + '); background-size: cover; background-position: center; width: 100%; height: 100%"></div>' +
                    '</li>'
                );
            };
            reader.readAsDataURL(file);
            if (files.length == 8) $dropzoneEl.addClass('js-dropzone--disable');
        } else {
            if (!$dropzoneEl.hasClass('js-dropzone--disable')) $dropzoneEl.addClass('js-dropzone--disable');
        }
    })
}