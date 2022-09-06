(function ($) {
    let num = 1;
    $('#slider-btn').click(function(){
        $('.slider-btn-opt').append(`
        <div class="btn-opt-area">
                                <span>Button ${num++}</span>
                                <input class="form-control" type="text" name="btn_title[]" placeholder=" Button Title">
                                <input class="form-control" type="text" name="btn_link[]" placeholder=" Button Url">
                            </div>
            <select name="btn_type[]">
            <option value="btn btn-light-out">Default</option>
            <option value="btn btn-color btn-full">Red</option>
          </select>
        `);
    })
    $('#slider-photo').change(function(e){
       const url = URL.createObjectURL(e.target.files[0]);
       $('.img').attr('src',url);
    })
  })(jQuery);