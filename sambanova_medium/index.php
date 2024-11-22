<!DOCTYPE html>
<html lang="en">

<head>
 <title>Medium Glow</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style_css.css">
<link rel="stylesheet" href="bootstraps/bootstrap.min.css">
<script src="jquery/jquery.min.js"></script>
<script src="bootstraps/bootstrap.min.js"></script>

</head>
<body>






<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img title='logo' class="img-rounded imagelogo_data" src="img/logo_imgx.png"></li>
<span class='navbar_title'></span>
    </div>
    <div class="collapse navbar-collapse" id="navgator">


      <ul class="nav navbar-nav navbar-right">

      </ul>




    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->


<br>

<div class="row">
<div class="col-sm-12">
<h2><center><b>Medium Glow</b></center></h2>

<center><h4>This is an application that allow Medium Content Creators to easily Create and Generate Posts Contents and share it on their respective Medium Blogs leveraging <b style='color:fuchsia'>Sambanova AI & Medium API</b>

<br><br> It allows Medium Content Creators to generate and post an contents on different Topics with little or no efforts just by a Click of button.
</h4></center>

It Generate Contents with:<br>
<ul>
<li>Details</li>
<li>Sources and References</li>
<li>Links</li>
<li>and Many More..</li>
</ul>

The application takes prompt input of <b>Text</b> or <b>images</b>

</div>
</div>
<!-- row end  -->
<br><br>


<!-- row starts  -->
<div class="well row">


<div class="col-sm-4 alerts alert-info">

 <div class="form-group">
              <label> Sambanova API Key: </label>
              <input type="password" class="col-sm-12 form-control" id="sambanova_api_key"  placeholder="Sambanova API Key">
            </div>

<br>








 <div class="form-group">
              <label>Sambanova Model: </label>
              <select class="col-sm-12 form-control" id="sambanova_model"  placeholder="Sambanova Model">
<option value=''>--Select Model--</option>
<option value='Llama-3.2-11B-Vision-Instruct'>Llama-3.2-11B-Vision-Instruct</option>
<option value='Llama-3.2-90B-Vision-Instruct'>Llama-3.2-90B-Vision-Instruct</option>
</select>
            </div>

<br>


 <div class="form-group">
              <label>Medium API Token: </label>
 <input id="medium_api_token" type="password" class="col-sm-12 form-control"  placeholder="Medium API Token"  />
</div>


<br><br>
<h4 style='color:purple;'>How to Get and Set Your Medium API Token</h4>

Visit <a target='_blank' href='https://medium.com'>https://medium.com</a> and click on your <b>Profile Image Icon</b> -----> <b>settings</b>-----> <b>Security and apps</b>  
Scroll down the page ---->  <b>Integration Token</b> then Create  and copy your API Token..<br><br>



<br><br><button class='btn3' id="clear_api_key_btn" title='Clear API Key'>Clear Sambanova API Key & Medium API Key</button>

 
</div>


<!-- form starts  -->
<div class="col-sm-7">

 <div class="form-group">

<label>Enter Topic/Question</label><br>
<input class="col-sm-12 form-control" id="topic" placeholder="Enter Topic/Question">
</div>



  
<div class='row'>
<div id="loader_ai"></div>
<br><br><center><button class='btn btn-primary generate_btn' title='Generate Content on Topic'>Generate Content on Topic</button></center>


<center><h3>OR</h3></center>
 <div class="form-group">
<label>Image Upload -- (Generate Post Content from an Image) </label>
  <input type="file"  class="image_file" id="image_file" />
<input type='hidden' id='image_base64String' class='base64_image' value=''>
</div>
<div id="loader_ai_image"></div>
<center><button class='btn btn-info image_btn' title='Generate Content From Image'>Generate Content From Image</button></center>

<div style='width:100%;'>.</div>

<div class='form-group scroll_div_data'>
<center><h3 style='color:fuchsia' class='medium_div'>Generated Content For Medium Blog Post will appear below</h3></center>
<div  id="result_ai_data"></div>
</div>


</div>






</div>



<div class="col-sm-1">

</div>

</div>






<!-- row ends  -->


<script src="script/script_content.js"></script>


<br><br><br><br><br>
</body>
</html>



















