<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form search-form--custom" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label for="<?php echo $unique_id; ?>" class="search-label"><?php echo __('What are you looking for?', 'custom-widgets'); ?></label>
  <input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo __('What are you looking for?', 'custom-widgets'); ?>" value="<?php echo get_search_query(); ?>" name="s"/>
  <button type="submit" class="search-submit" disabled><i class="search-icon"></i></button>
</form>
<script>
  $(function(){

    $('.search-form--custom .search-field').on('change input', function(){
      let inp = $(this);
      let btn = inp.siblings('.search-submit');
      if (inp.val() != ''){
        btn.attr('disabled', false);
      }
      else {
        btn.attr('disabled', true);
      }
    });

    $('.search-form--custom .search-field').trigger('change');
  });
</script>
