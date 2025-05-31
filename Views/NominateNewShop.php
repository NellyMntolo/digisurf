<?php 
include '../Model/aboutDAO.php';
include_once("header.php");
include_once("footer.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php  echo $about_text3;?>">
    <meta name="keywords" content="<?php  echo $about_text2;?>">
    <meta name="author" content="Nelly">

    <?php echo $favs;?>
    <?php echo $css; ?>
    <title><?php  echo $about_text1;?></title>

</head>

<body class="animsition">

<?php echo $header;?>
<main>
    <div class="main-container page-fix">
        <div class="container cf">

            <section class="about-section-header" style="background-image: url('/assets/images/about.jpg');">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h2>Nominate a new Shop</h2>                 
                    </div>
                  </div>
                </div>
            </section>


            <section class="joinus-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                          <h2>Nominate a new shop!</h2>                      
                        </div>
                    </div>

                    <form id="nominate_form" action="/Nominate" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                      <div class="row">
                        <div class="col-md-12"> 
                        <div class="row">                     
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nominate_shop_name" class="form-control" placeholder="Shop Name" required>                                    
                                </div>
                            </div>
                        

                         
                            <div class="col-md-3">
                                  <div class="form-group">
                                    <!-- <label for="exampleFormControlSelect1">Example select</label> -->
                                    <select name="nominate_main_category" class="form-control selectpicker exampleFormControlSelect1">
                                      <option selected="selected">Main Category</option>
                                      <option>shoes</option>
                                      <option>Clothes</option>
                                      <option>Bicycles</option>
                                      <option>Water Bottles</option>
                                    </select>
                                  </div>
                            </div>

                            <div class="col-md-3">
                                  <div class="form-group">
                                    <!-- <label for="exampleFormControlSelect1">Example select</label> -->
                                    <select name="nominate_sub_category" class="form-control selectpicker exampleFormControlSelect1">
                                      <option selected="selected">Sub Category</option>
                                      <option>shoes</option>
                                      <option>Clothes</option>
                                      <option>Bicycles</option>
                                      <option>Water Bottles</option>
                                    </select>
                                  </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">                        
                            <textarea rows="3" name="nominate_description" class="form-control" placeholder="Description"></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="text" name="nominate_address" class="form-control" placeholder="Shop Address">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <!-- <label for="exampleFormControlSelect1">Example select</label> -->
                              <!-- <select name="nominate_date" id="datetimepicker3" class="form-control selectpicker exampleFormControlSelect1">
                                <option selected="selected">Open Hour</option>
                                <option>shoes</option>
                                <option>Clothes</option>
                                <option>Bicycles</option>
                                <option>Water Bottles</option>
                              </select> -->

                              <!-- <input type="text" id="datetimepicker3" class="form-control" name="nominate_date" placeholder="Date"> -->

                              <div id="datetimepicker3" class="input-append">
                                <input data-format="hh:mm:ss" type="text"></input>
                                <span class="add-on">
                                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                  </i>
                                </span>
                              </div>
                              
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <input name="multiple_uploaded_filesone[]" onchange="previewone(this);" type="file" multiple class="multi with-preview form-content" id="multiple_uploaded_files" maxlength="5" placeholder="Shop Address">
                            <div id="images-inone" style="position: relative; height: 100%;"><?php //echo $project_imagesone;?></div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                                <p>Maximum upload 5 photos, support format: JPEG / PNG</p>                                  
                            </div>
                        </div>
                      </div>

                        

                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group join_us_submit">
                                    <input type="submit" name="nominate_submit" class="form-control nominate_submit_btn" data-toggle="modal" data-target="#mynominateshop" value="Submit">
                                </div> 
                            </div>
                        </div>

                    </form>

                  </div>
            </section>



           
        </div>
    </div>

<?php echo $footer;?>    
</main>



<!-- Script -->
<?php echo $scripts; ?>

<script>


  window.previewone = function (input) {
    if (input.files && input.files[0]) {
        $(input.files).each(function () {
            var reader = new FileReader();
            reader.readAsDataURL(this);
            reader.onload = function (e) {
                //$('.page-none-in-relative h3, .page-none-in-relative p').hide();
                //$(".page-none-in").append("<img class='thumb' src='" + e.target.result + "'>");
                $("#images-inone").append("<div class=\"image-list\" ><img class='thumb' src='" + e.target.result + "'></div>");
                }
            });
        }
    }




    $(function(){
        $(".clicktoplay").typed({
            strings: ["點擊觀看影片"],
            typeSpeed: 50,
            backSpeed: 0,
            backDelay: 2000,
            startDelay: 2000,
            loop: true,
            showCursor: false,
        });
    });  
</script>

<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        centeredSlides: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 0,
		speed:1000,
		autoplay:5000,
		loop: true
    });
</script>
<script type="text/javascript">
var videoSrc = $("#myModal iframe").attr("src");

$('#myModal').on('show.bs.modal', function () { // on opening the modal
  // set the video to autostart
  $("#myModal iframe").attr("src", videoSrc+"?amp;autoplay=1");
});

$("#myModal").on('hidden.bs.modal', function (e) { // on closing the modal
  // stop the video
  $("#myModal iframe").attr("src", null);
});
</script>
<script>
jQuery(document).ready(function($){
	//this is used for the video effect only
	if( $('.cd-bg-video-wrapper').length > 0 ) {
		var videoWrapper = $('.cd-bg-video-wrapper'),
			mq = window.getComputedStyle(document.querySelector('.cd-bg-video-wrapper'), '::after').getPropertyValue('content').replace(/"/g, "").replace(/'/g, "");
		if( mq == 'desktop' ) {
			// we are not on a mobile device 
			var	videoUrl = videoWrapper.data('video'),
				video = $('<video loop><source src="'+videoUrl+'.mp4" type="video/mp4" /><source src="'+videoUrl+'.webm" type="video/webm" /></video>');
			video.appendTo(videoWrapper);
			video.get(0).play();
		}
	}
});

//  RATING COUNTER
$('.rator-hr').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

$("input[type='submit']").click(function(){
    var $fileUpload = $("input[type='file']");
    if (parseInt($fileUpload.get(0).files.length)>5){
     alert("You can only upload a maximum of 5 files");
     return false;
    }
});

$(document).ready(function(){


  // $(function() {
  //   $('#datetimepicker3').datetimepicker({
  //     pickDate: false
  //   });
  // });
        // $("#datetimepicker3").datepicker({
        //   pickDate: false
        // });
    
  // $(function () {
  //     $('#datetimepicker3').datetimepicker({
  //         format: 'HH:mm'
  //     });
  // });
});
</script>
<script type="text/javascript">var _jf = _jf || [];_jf.push(['p','50988']);_jf.push(['_setFont','sourcehansans-tc-extralight','css','.sourcehansans-tc-extralight']);_jf.push(['_setFont','sourcehansans-tc-extralight','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-extralight','weight',100]);_jf.push(['_setFont','sourcehansans-tc-normal','css','.sourcehansans-tc-normal']);_jf.push(['_setFont','sourcehansans-tc-normal','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-normal','weight',300]);_jf.push(['_setFont','sourcehansans-tc-medium','css','.sourcehansans-tc-medium']);_jf.push(['_setFont','sourcehansans-tc-medium','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-medium','weight',600]);(function(f,q,c,h,e,i,r,d){var k=f._jf;if(k.constructor===Object){return}var l,t=q.getElementsByTagName("html")[0],a=function(u){for(var v in k){if(k[v][0]==u){if(false===k[v][1].call(k)){break}}}},j=/\S+/g,o=/[\t\r\n\f]/g,b=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,g="".trim,s=g&&!g.call("\uFEFF\xA0")?function(u){return u==null?"":g.call(u)}:function(u){return u==null?"":(u+"").replace(b,"")},m=function(y){var w,z,v,u,x=typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):" ";if(z){u=0;while((v=w[u++])){if(z.indexOf(" "+v+" ")<0){z+=v+" "}}t[c]=s(z)}}},p=function(y){var w,z,v,u,x=arguments.length===0||typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):"";if(z){u=0;while((v=w[u++])){while(z.indexOf(" "+v+" ")>=0){z=z.replace(" "+v+" "," ")}}t[c]=y?s(z):""}}},n;k.push(["_eventActived",function(){p(h);m(e)}]);k.push(["_eventInactived",function(){p(h);m(i)}]);k.addScript=n=function(u,A,w,C,E,B){E=E||function(){};B=B||function(){};var x=q.createElement("script"),z=q.getElementsByTagName("script")[0],v,y=false,D=function(){x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;a("_eventInactived");B()};if(C){v=setTimeout(function(){D()},C)}x.type=A||"text/javascript";x.async=w;x.onload=x.onreadystatechange=function(G,F){if(!y&&(!x.readyState||/loaded|complete/.test(x.readyState))){y=true;if(C){clearTimeout(v)}x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;if(!F){setTimeout(function(){E()},200)}}};x.onerror=function(H,G,F){if(C){clearTimeout(v)}D();return true};x.src=u;z.parentNode.insertBefore(x,z)};a("_eventPreload");m(h);n(r,"text/javascript",false,3000)})(this,this.document,"className","jf-loading","jf-active","jf-inactive","//d3gc6cgx8oosp4.cloudfront.net/js/stable/v/5.0.3/id/90054322147");</script>
</body>
</html>
