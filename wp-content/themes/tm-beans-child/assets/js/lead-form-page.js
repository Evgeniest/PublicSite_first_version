

jQuery(document).ready(function($) {

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

        $('input.state-label').val(initial_state);
        }
    }, "jsonp");
    $.ajaxSetup({
        async: true
    });
   

    // when clicking on business label or state label then the drop down shows
    $('.business-label').click(function(){
        $('div.business-overlay-content').removeClass('hide');
    });

    $('.state-label').click(function(){
        $('div.state-overlay-content').removeClass('hide');
    });

    // when clicking on the X in the drop down then it closes
    $('.business-close').click(function(){
        $('div.business-overlay-content').addClass('hide');
    });

    $('.state-close').click(function(){
        $('div.state-overlay-content').addClass('hide');
    });

    //when clicking on an item in the dropdown, the dropdown closes and the label 
    // changes the text to the chosen item and then we check if the form is filled

    $('.state-items-wrapper').on('click' , '.option-wrapper' , function(){
        var option = $(this).text();
        $('input.state-label').val(option);
        $('div.state-overlay-content').addClass('hide');
        activateFormSubmit();

    });

    $('.business-items-wrapper').on('click' , '.option-wrapper' , function(){
        var option = $(this).text();
        $('input.business-label').val(option);
        $('div.business-overlay-content').addClass('hide');
        activateFormSubmit();
    });

// when clicking outside of the dropdown , it closes
    $('.business-overlay-content , .state-overlay-content').click(function(event) { 
        if(!$(event.target).closest('.dropdown-wrapper').length) {
            $(this).addClass('hide');
        }        
    });

    // validate email
    $(".lead-email").keyup(function(){
        activateFormSubmit();
    });

// focus on email input
    $(".lead-email").focusin(function(){
        $(this).addClass('email-focus');
        if($(this).hasClass('not-valid')){
            $(this).removeClass('not-valid');
            $('.lead-email-not-valid').text('');
        }
    });

    $(".lead-email").focusout(function(){
        $(this).removeClass('email-focus');
        var email = $('input.lead-email').val();
        if( email == 0 || isValidEmailAddress(email) == false){
            $(this).addClass('not-valid');
            $('.lead-email-not-valid').text('Not a valid email');
        }else{
            activateFormSubmit();
        }
        
    });




//check if the email address is valid
function isValidEmailAddress(emailAddress) {
    if (emailAddress != 0){
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }else{
        return false;
    }
}

// check if there are values in all the inputs of the form
function isValidForm(){

    var email = $('input.lead-email').val();
    if( email == 0 || isValidEmailAddress(email) == false){
        return false;
    }

    var business = $('input.business-label').val();
    if( business == 0){
        return false;
    }

    var state = $('input.state-label').val();
    if( state == 0){
        return false;
    }
    return true;
}

// if the form is valid then activate the submit button
function activateFormSubmit(){
    
    if(isValidForm()){
        $('input.lead-submit').addClass('active');
        $('input.lead-submit').removeAttr('disabled');
        $('input.link-title').removeAttr('disabled');
        $('input.lead-submit').removeClass('submit-disable');
        $('input.link-title').removeClass('submit-disable');      
    } else {
        $('input.lead-submit').removeClass('active');
        $('input.lead-submit').attr('disabled', 'disabled');  
        $('input.link-title').attr('disabled', 'disabled'); 
        $('input.lead-submit').addClass('submit-disable');
        $('input.link-title').addClass('submit-disable');      
    }
}

// function on submit form
$(".lead-form").submit(function(e) {
  // needed so the default action isn't called 
  //(in this case, regulary submit the form)
    e.preventDefault(); 

    var email = $('input.lead-email').val();
    var business = $('input.business-label').val();
    var state = $('input.state-label').val();
    var business_id = 0;
    var state_id = 0;
    // getting business id from json
    $.ajaxSetup({
        async: false
    });
    $.getJSON(lp_obj.theme_url + '/assets/json/business.json', function(result){
        	business_id = result[business];
        }).error(function(jqXHR, textStatus, errorThrown) {
            console.log('error ' + textStatus);
      
    });

    // getting state_id from json
    
    
    $.getJSON(lp_obj.theme_url + '/assets/json/state.json', function(result){
        	state_id = result[state];
        }).error(function(jqXHR, textStatus, errorThrown) {
            console.log('error ' + textStatus);
            console.log("incoming Text " + jqXHR.responseText);
    });
    $.ajaxSetup({
        async: true
    }); 
        //building the url
        $url_str = "https://app.next-insurance.com/?cob=" + business_id + "&state=" + state_id;
        $url_str += "&email=" + email;
        $url_str += "&skip_lf";
        location.href = $url_str;
});


});