<?php 
include_once("../Model/allcasesDAO.php");
include_once("header.php");
include_once("footer.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $main_case_text3;?>">
    <meta name="keywords" content="<?php echo $main_case_text2;?>">
    <meta name="author" content="2h">
<?php echo $favs;?>
<?php echo $css; ?>
    <title><?php echo $main_case_text1;?></title>

<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107856863-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-107856863-1');
</script>


<style type="text/css">
.the-blogs {
    display:none;
    /*box-shadow: 0 1px 1px #ccc;*/
}
</style>
</head>

<body>
<?php echo $header;?>

<main>
   
    <div class="main-container">
        <div class="container cf">
               <div id="article">
                <div class="banner">
                    <div class="text">
                        <h1><?php echo $main_case_text4;?></h1>
                    </div>
                     <img src="<?php echo $main_case_image1;?>" alt="">
                </div> 
                
                


                <div class="articles">
                    <div class="ui-group">
                        <form id="trashForm">
                            <ul class="simplefilter button-group">
                                <!-- <li class="active" data-filter="all">All</li> -->
                                <li class="active categories"><input class="active event_filter" type="button" value="All">全部文章</li>
                                <?php echo $category; //echo $all_category_list;?>
                            </ul>
                        </form>
                    </div>
                    <ul class="grid filtr-container content-return" id="myList">
                        <?php echo $allcases;?>
                    </ul>
                    <img src="/Admin/Assets/img/ajax-loader.gif" id="loader" style="display: none;">
                    </div>
                    <div class="more-result" id="loadMore">
                        <button class="btn btn-default2" id="more_blogs">了解更多</button>
				   </div>
            </div>
        </div>
    </div>
</main>
<?php echo $footer;?>

<!-- Script -->
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/jquery.mobile.custom.min.js"></script>
<script src="/assets/js/modernizr.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/bootstrap-select.min.js"></script>
<script src="/assets/js/swiper.min.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/clipboard.min.js"></script>
<script src="/assets/js/jquery.filterizr.min.js"></script>

<!-- Zhen This is for the filter control API = http://yiotis.net/filterizr/ -->
    <script type="text/javascript">
        // $(function() {
        //     //Initialize filterizr with default options
        //     $('.filtr-container').filterizr();
        // });
    </script>
 <!-- Zhen This is for the control of the buttons active class -->
    <script>
	// 	$(function() {
	// 	//Simple filter controls
	// 	$('.simplefilter li').click(function() {
	// 		$('.simplefilter li').removeClass('active');
	// 		$(this).addClass('active');
	// 	});
	// });
	</script>
 <!-- Zhen This is for the load more function you can change it if you want -->
	<script>
		// $(document).ready(function () {
  //           size_li = $("#myList li").size();
  //           x=3;
  //           $('#myList li:lt('+x+')').show();
  //           $('#loadMore').click(function () {
  //               x= (x+5 <= size_li) ? x+5 : size_li;
  //               $('#myList li:lt('+x+')').show();
  //           });
  //           $('#showLess').click(function () {
  //               x=(x-5<0) ? 3 : x-5;
  //               $('#myList li').not(':lt('+x+')').hide();
  //           });
  //       });



$(document).ready(function(){

    if($(".the-blogs").length < 6){
        $("#more_blogs").hide();
    } else {
        $("#more_blogs").show();
    }
$(function () {
   
    $(".the-blogs").slice(0, 6).show();
    $("#more_blogs").on('click', function (e) {
        e.preventDefault();
        $(".the-blogs:hidden").slice(0, 6).slideDown();
        if ($(".the-blogs:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top //- ( $(window).height() - $(this).outerHeight(true) ) / 2
        }, 1500);
    });
});
});


$('.categories').click(function() {
    $('.categories').addClass('active').not(this).removeClass('active');
});
	</script>


    <script type="text/javascript">var _jf = _jf || [];_jf.push(['p','50988']);_jf.push(['_setFont','sourcehansans-tc-extralight','css','.sourcehansans-tc-extralight']);_jf.push(['_setFont','sourcehansans-tc-extralight','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-extralight','weight',100]);_jf.push(['_setFont','sourcehansans-tc-normal','css','.sourcehansans-tc-normal']);_jf.push(['_setFont','sourcehansans-tc-normal','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-normal','weight',300]);_jf.push(['_setFont','sourcehansans-tc-medium','css','.sourcehansans-tc-medium']);_jf.push(['_setFont','sourcehansans-tc-medium','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-medium','weight',600]);(function(f,q,c,h,e,i,r,d){var k=f._jf;if(k.constructor===Object){return}var l,t=q.getElementsByTagName("html")[0],a=function(u){for(var v in k){if(k[v][0]==u){if(false===k[v][1].call(k)){break}}}},j=/\S+/g,o=/[\t\r\n\f]/g,b=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,g="".trim,s=g&&!g.call("\uFEFF\xA0")?function(u){return u==null?"":g.call(u)}:function(u){return u==null?"":(u+"").replace(b,"")},m=function(y){var w,z,v,u,x=typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):" ";if(z){u=0;while((v=w[u++])){if(z.indexOf(" "+v+" ")<0){z+=v+" "}}t[c]=s(z)}}},p=function(y){var w,z,v,u,x=arguments.length===0||typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):"";if(z){u=0;while((v=w[u++])){while(z.indexOf(" "+v+" ")>=0){z=z.replace(" "+v+" "," ")}}t[c]=y?s(z):""}}},n;k.push(["_eventActived",function(){p(h);m(e)}]);k.push(["_eventInactived",function(){p(h);m(i)}]);k.addScript=n=function(u,A,w,C,E,B){E=E||function(){};B=B||function(){};var x=q.createElement("script"),z=q.getElementsByTagName("script")[0],v,y=false,D=function(){x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;a("_eventInactived");B()};if(C){v=setTimeout(function(){D()},C)}x.type=A||"text/javascript";x.async=w;x.onload=x.onreadystatechange=function(G,F){if(!y&&(!x.readyState||/loaded|complete/.test(x.readyState))){y=true;if(C){clearTimeout(v)}x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;if(!F){setTimeout(function(){E()},200)}}};x.onerror=function(H,G,F){if(C){clearTimeout(v)}D();return true};x.src=u;z.parentNode.insertBefore(x,z)};a("_eventPreload");m(h);n(r,"text/javascript",false,3000)})(this,this.document,"className","jf-loading","jf-active","jf-inactive","//d3gc6cgx8oosp4.cloudfront.net/js/stable/v/5.0.3/id/90054322147");</script>


<script>
$(document).ready(function(){

$(document).on('click', ".event_filter", function() {
          $('#loader').show();
          $('#trashForm').submit();
          var data = $(this).val();
          $('.content-return').html("");
          // var orig = $(this).next('input').val();
          setTimeout(function(){
                          $.ajax({
                              type: "POST",
                              url:"/getcasecategory",
                              data: "selected_category=" + data,
                              //data: data,
                              cache: false,
                              success: function (response) {
                              $('.content-return').html(response);
                              $('#loader').hide();
                              },            
                              error: function (jXHR, textStatus, errorThrown) {
                                 alert(errorThrown);  
                                 $("#LoadingImage").hide();             
                              }
                          });
                      }, 3000);

        event.preventDefault();
});

$("#trashForm").submit( function() {     
  return false;
}); 



});
</script>
</body>
</html>
