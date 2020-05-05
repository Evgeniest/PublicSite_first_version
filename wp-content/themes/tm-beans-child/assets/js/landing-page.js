jQuery(document).ready(function($) {

  // If press on back button
  jQuery(window).on("popstate",function(){
    var industryCur = findGetParam( 'industry' );
    jQuery( "select.industry-select" ).val( industryCur ).trigger("change");
  });

  //request the JSON data and parse into the select element
  var jqxhr = $.getJSON(lp_obj.theme_url + '/assets/json/industry.json',
      function(data) {
        var fragment = document.createDocumentFragment();

        // If isset get params
        var industryCur = '';
        if ( window.location.href.indexOf('?') > -1 ) {
          industryCur = findGetParam( 'industry' );
        }

        $.each(data, function(key, val) {
          var industry_option = document.createElement('option');

          if( industryCur == key ){
            industry_option.selected = true;
            document.querySelector('option.business-option').selected = false;
          }

          industry_option.innerText = key;
          fragment.appendChild( industry_option );

        });
        $('.industry-select').append(fragment);

        // If industryCur isset trigger change event of select
        if( industryCur != null && industryCur != '' ){
          $('.industry-select').trigger( "change" );
        }
      }).error(function(jqXHR, textStatus, errorThrown) {
    console.log('error ' + textStatus);
    console.log('incoming Text ' + jqXHR.responseText);
  });

// fill the state from the json
//request the JSON data and parse into the select element
//
// if the user is from the US we want to select the state he is from
  var initial_state = null;
  $.ajaxSetup({
        async: false
    });
  $.get("https://ipinfo.io", function(response) {
    if (response.country === 'US') {
      initial_state = response.region;
      
      if (response.region === 'District of Columbia') {
        initial_state = "Washington DC";
      }
    }
  }, "jsonp");
  $.ajaxSetup({
        async: true
    });

  var state_jqxhr = $.getJSON(lp_obj.theme_url + '/assets/json/state.json',
      function(data) {
        var fragment = document.createDocumentFragment();
        $.each(data, function(key, val) {
          var state_option = document.createElement('option');
          state_option.innerText = key;
          state_option.value = val;
          if(key == initial_state){
            
            state_option.selected = true;
          }
          fragment.appendChild( state_option );

        });
        $('.state-select').append(fragment);
      }).error(function(state_jqXHR, textStatus, errorThrown) {
    console.log('error ' + textStatus);
    console.log('incoming Text ' + state_jqXHR.responseText);
  });

  $('.landing-submit').prop( "disabled", true );
// when an industry is selected we need to extract the business value of this
// industry from the json file
  $('.industry-select').change(function() {

    var industry = $(this).val();

    var path = location.href;
    path = path.replace(/(\?|&)+industry=([a-zA-Z0-9 %]+)/,'');
    if( path.match(/\?/) ){
      path += '&';
    } else {
      path += '?';
    }
    path += 'industry=' + encodeURIComponent( industry );

    if (typeof(window.history.pushState) == 'function') {
      window.history.pushState(null, path, path);
    } else {
      window.location.hash = '#!' + path;
    }

    var jqxhr = $.getJSON(lp_obj.theme_url + '/assets/json/industry.json',
        function(data) {
          var fragment = document.createDocumentFragment();
          var business_arr = data[industry];

          for (var i = 0, len = business_arr.length; i < len; i++) {
            var business_option = document.createElement('option');
            business_option.innerText = business_arr[i];

            if( i == 0 ){
              business_option.disabled = true;
              business_option.selected = true;
              business_option.value    = '';
            }
            fragment.appendChild(business_option);
          }
          $('.business-select').children().remove();
          $('.business-select').append(fragment);
          $('.business-select-wrapper').removeClass('hide');

        }).error(function(jqXHR, textStatus, errorThrown) {
      console.log('error ' + textStatus);
      //console.log("incoming Text " + jqXHR.responseText);
    });
    var state  = $( '.state-select option:selected').text(); 
    if( state != 'Choose your state'){
    $('.state-select').trigger('change');
  }
  });

$('.business-select').change(function() {
  var state  = $( '.state-select option:selected').text(); 
  if( state != 'Choose your state'){
    $('.state-select').trigger('change');
  }
  
});

// if the user selects a state we need to check if the businness that was selected 
// has a redirection, if yes then we need to change if the state that the user 
// selected is supported
// if the user selected an unsupported state then an error should appear
// and the submit should be disabled
  $('.state-select').change(function() {
    var business = $('.business-select').val();
    var industry    = $('.industry-select').val();
    if( business != null && industry != null){
      var bizFull = business + ' (' + industry + ')';
      
      if( typeof lp_obj.redirects[ bizFull ] != 'undefined' ){
        
        var state  = $( '.state-select option:selected').text();
        
        if( $.inArray(state , lp_obj.redirects[ bizFull ][1]) > -1){
          
          $('span.state-not-supported').removeClass('hide');
          $('.state-select').addClass('stateBor');
          $('.landing-submit').prop("disabled", true);
        }
        else{
            $('span.state-not-supported').addClass('hide');
            $('.state-select').removeClass('stateBor');
        }
      }
    }
  });

  //enables the submit if all fields are filled.
    var testEmail =    /^[ ]*([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})[ ]*$/i;
    $('.landing-email').bind('input propertychange', function() {
        var state  = $( '.state-select option:selected').text();
        if (testEmail.test(jQuery(this).val()))
        {
            $('.state-select-wrapper').removeClass('hide');
        }
    });
    $( ".state-select" ).change(function() {
        var business = $('.business-select').val();
        var industry    = $('.industry-select').val();
        var bizFull = business + ' (' + industry + ')';
        var state  = $( '.state-select option:selected').text();
        if( business != null && industry != null){
            var bizFull = business + ' (' + industry + ')';
            if (testEmail.test($('.landing-email').val()) && state != 'Choose your state' && (!lp_obj.redirects[ bizFull ] || $.inArray(state , lp_obj.redirects[ bizFull ][1]) == -1))
            {
                $('.landing-submit').prop("disabled",false);
            }
            else {
                $('.landing-submit').prop("disabled", true);
            }
        }
    });



  $("form.mc4wp-form").submit(function(){
    
    var bizFull = jQuery( '.business-select' ).val() + ' (' + jQuery( '.industry-select' ).val() + ')';
    
    if( typeof lp_obj.redirects[ bizFull ] != 'undefined' ){
      
      var business = jQuery( '.business-select'  ).val();
      var state    = jQuery( '.state-select'  ).val();
      var email = $('.landing-email').val();
      
      var business_id = 0;
      var state_id = jQuery( '.state-select option:selected').val();

      mc4wp.forms.on('success', function(){
        
        // if there is a redirection url we need to add it the form parameters,
        // state_id, email and skip_if=true

        var params = { state:state_id , email: email , skip_lf:true };
        var url_str = jQuery.param( params );
        url_str = lp_obj.redirects[ bizFull ][0] + "&" + url_str;
        
        url_str = decodeURIComponent(url_str);

        location.href = url_str;
      } );
    }else{
      // if there is no redirect then do popup
      mc4wp.forms.on('success', mc_submit_done_popup);
    }
  
  });

  // popup javascript
   $('.landing-popup-container').click(function(event) { 
        if(!$(event.target).closest('.landing-popup-wrapper').length) {
            $(this).addClass('hide');
        }        
    });

    $('.popup-close').click(function() {
       $('div.landing-popup-container').addClass('hide');
    });

    $('.popup-link').click(function() {
      var str_url = lp_obj.popup_url;
      str_url += "?sid=" + window._NITrackingServiceConfiguration.tId;
      location.href = str_url;
    });
});


function findGetParam( parameterName ) {
  var result = null,
      tmp = [];
  var items = location.search.substr(1).split('&');
  for (var index = 0; index < items.length; index++) {
    tmp = items[index].split('=');
    if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
  }
  return result;
}

function mc_submit_done_popup(){
  //jQuery('.spu-clickable.landing-pop').trigger('click');
  jQuery('div.landing-popup-container').removeClass('hide');
  mc4wp.forms.off('success', mc_submit_done_popup );
}