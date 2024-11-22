
// Clear Sambanova API Key
$(document).ready(function(){
$("#clear_api_key_btn").click(function(){
$('#sambanova_api_key').val('');
$('#medium_api_token').val('');

alert('API Key Cleared Successfully...');
});
});



// Clear TextBox
$(document).ready(function(){
$("#clear_textbox_btn").click(function(){
$('#content1').val('');
$('#content2').val('');

alert('TextBox Cleared Successfully...');
});
});

 



// Clear Sambanova AI Responses
$(document).ready(function(){
//$(".res_clear_btn").click(function(){
$(document).on( 'click', '.res_clear_btn', function(){ 
$('.res_clear').empty();
//$('#content1').val('');
//$('#content2').val('');
alert('Sambanova AI Responses Cleared Successfully...');
});
});





// Sambanova AI Topic Text Content Generation starts
$(document).ready(function(){


$(".generate_btn").click(function(){

var topic = $('#topic').val();
var sambanova_api_key= $('#sambanova_api_key').val();
var sambanova_model= $('#sambanova_model').val();
var medium_api_token= $('#medium_api_token').val();

if(sambanova_api_key == ''){
alert('Sambanova API Key cannot be empty');
return false;
}
if(sambanova_model == ''){
alert('Please Select Sambanova AI Model');
return false;
}

if(medium_api_token == ''){
alert('Medium API  Token cannot be empty');
return false;
}


$("#result_ai").empty();
$(".result_ai2").empty();
if(topic == ''){
alert('Topic cannot be empty');
return false;
}



//remove all double quote
var content_remove_double_quotes = topic.replace(/"/g, '');

// remove all single quotes
var content_remove_single_quotes = content_remove_double_quotes.replace(/'/g, "");

var content_validate = content_remove_single_quotes;


        // AJAX Request


$("#loader_ai").fadeIn(400).html('<br><center><div class="loader_css"><img src="img/loader.gif">&nbsp; Generating  Data....</div></center>');

        $.ajax({
            url: 'sambanova_ai_content_topic_text.php',
            type: 'post',
            data: {topic:content_validate,sambanova_api_key:sambanova_api_key, sambanova_model:sambanova_model, medium_api_token:medium_api_token},
            dataType: 'html',
            success: function(data){
$("#loader_ai").hide();
$("#result_ai_data").html(data);
$(".alerts_content").delay(5000).fadeOut('slow');
            }
        });
    });
});

// Sambanova AI Topic/Text Content Generation  ends









// Sambanova AI Image Content Generation starts
$(document).ready(function(){


$(".image_btn").click(function(){

var base64_image = $('.base64_image').val();
var sambanova_api_key= $('#sambanova_api_key').val();
var sambanova_model= $('#sambanova_model').val();
var medium_api_token= $('#medium_api_token').val();

if(sambanova_api_key == ''){
alert('Sambanova API Key cannot be empty');
return false;
}
if(sambanova_model == ''){
alert('Please Select Sambanova AI Model');
return false;
}

if(medium_api_token == ''){
alert('Medium API  Token cannot be empty');
return false;
}


$("#result_ai").empty();
$(".result_ai2").empty();
if(base64_image == ''){
alert('Please Upload Image For Analysis');
return false;
}

        // AJAX Request


$("#loader_ai_image").fadeIn(400).html('<br><center><div class="loader_css"><img src="img/loader.gif">&nbsp; Generating  Data....</div></center>');

        $.ajax({
            url: 'sambanova_ai_content_image.php',
            type: 'post',
            data: {base64_image:base64_image,sambanova_api_key:sambanova_api_key, sambanova_model:sambanova_model, medium_api_token:medium_api_token},
            dataType: 'html',
            success: function(data){
$("#loader_ai_image").hide();
$("#result_ai_data").html(data);
$(".alerts_content").delay(5000).fadeOut('slow');
            }
        });
    });
});

// Sambanova AI Image Content Generation  ends






// Post to Medium starts
$(document).ready(function(){
$(document).on( 'click', '.medium_btn', function(){ 
//$(".medium_btn").click(function(){
var post_title = $('.post_title').val();
var post_desc = $('.post_desc').val();
var medium_api_token= $('.medium_api_token2').val();
var medium_status = $(".medium_status:checked").val();

 if(medium_api_token ==''){
alert('Medium API Token Cannot be Empty.');
return false;
}


if(post_title == ''){
alert('Post Title cannot be empty');
return false;
}


if(post_desc == ''){
alert('Post Description cannot be empty');
return false;
}


if(medium_status==undefined){
alert('Please Select Medium Publication Status');
return false;
}


//$("#result_ai").empty();
//$(".result_ai2").empty();

//remove all double quote
var content_remove_double_quotes = post_desc.replace(/"/g, '');

// remove all single quotes
var content_remove_single_quotes = content_remove_double_quotes.replace(/'/g, "");

var post_desc_validate = content_remove_single_quotes;

$("#loader_medium").fadeIn(400).html('<br><center><div class="loader_css"><img src="img/loader.gif">&nbsp; Posting Data to Medium API....</div></center>');

        $.ajax({
            url: 'medium_post.php',
            type: 'post',
            data: {post_title:post_title,post_desc:post_desc_validate, medium_api_token:medium_api_token, medium_status:medium_status},
            dataType: 'html',
            success: function(data){
$("#loader_medium").hide();
$("#result_medium").html(data);
$(".alerts_medium").delay(5000).fadeOut('slow');
            }
        });
    });
});

// Post to Medium  ends






//convert image to base 64
 const image_file = document.querySelector('#image_file');
    image_file.addEventListener('change', (e) => {
// convert images to base64
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onloadend = () => {
       //console.log(reader.result);
var image_base64String = reader.result;
document.getElementById("image_base64String").value = image_base64String;

 };
        reader.readAsDataURL(file);
    });
