<?php 
include_once("../Model/eventDAO.php");
include_once("header.php");
include_once("footer.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $event_text3;?>">
    <meta name="keywords" content="<?php echo $event_text2;?>">
    <meta name="author" content="2h">
    <?php echo $favs;?>
    <?php echo $css; ?>
    <title><?php echo $event_text1;?></title>


    <!-- <meta property="og:url"             content="https://www.2h-fitness.com/News/Articles/<?php echo $event_url;?>" />
    <meta property="og:type"            content="article" />
    <meta property="og:title"           content="<?php echo $event_text4;?>" />
    <meta property="og:description"     content="<?php echo $event_text5;?>" />
    <meta property="og:image"           content="https://www.2h-fitness.com<?php echo $single_event_image1;?>" />
    <meta property="og:image:width"     content="1220" />
    <meta property="og:image:height"    content="600" />
    <meta property="fb:app_id"          content="122943621442790" /> -->

</head>

<body class="animsition">

<?php echo $header;?>
<main>
    <div class="main-container">
        <div class="container cf">
            <div id="article-in">
                <div class="banner">
                	<img src="<?php echo $single_event_image1;?>" alt="">
                </div>
                <div class="news-container">
                    <div class="category">
                        <p><?php echo $cat_name_text1_single;?></p>
                    </div>
                    <div class="first-title">
                        <p class="title"><?php echo $event_text4;?></p>
                        <p class="sub-title"><?php echo $event_text5;?></p>
                    </div>
                    <div class="info">
                        <p><?php echo $event_text6;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php echo $footer;?>
<!-- Script -->
<?php echo $scripts;?>

<script>
  //   var swiper = new Swiper('.ai-swiper .swiper-container', {
  //       nextButton: '.ai-swiper .swiper-button-next',
  //       prevButton: '.ai-swiper .swiper-button-prev',
  //       slidesPerView: 3,
  //       paginationClickable: true,
  //       spaceBetween: 50,
		// breakpoints: {
  //           1024: {
  //               slidesPerView: 3,
  //               spaceBetween: 40
  //           },
  //           768: {
  //               slidesPerView: 2,
  //               spaceBetween: 30
  //           },
  //           640: {
  //               slidesPerView: 1,
  //               spaceBetween: 60
  //           },
  //           320: {
  //               slidesPerView: 1,
  //               spaceBetween: 60
  //           }
  //       }
  //   });
</script>
<script>
	// $("#copy").click(function(){
	// 	$('#copy').tooltip('toggle')
	// });
</script>
<script type="text/javascript">var _jf = _jf || [];_jf.push(['p','50988']);_jf.push(['_setFont','sourcehansans-tc-extralight','css','.sourcehansans-tc-extralight']);_jf.push(['_setFont','sourcehansans-tc-extralight','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-extralight','weight',100]);_jf.push(['_setFont','sourcehansans-tc-normal','css','.sourcehansans-tc-normal']);_jf.push(['_setFont','sourcehansans-tc-normal','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-normal','weight',300]);_jf.push(['_setFont','sourcehansans-tc-medium','css','.sourcehansans-tc-medium']);_jf.push(['_setFont','sourcehansans-tc-medium','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-medium','weight',600]);(function(f,q,c,h,e,i,r,d){var k=f._jf;if(k.constructor===Object){return}var l,t=q.getElementsByTagName("html")[0],a=function(u){for(var v in k){if(k[v][0]==u){if(false===k[v][1].call(k)){break}}}},j=/\S+/g,o=/[\t\r\n\f]/g,b=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,g="".trim,s=g&&!g.call("\uFEFF\xA0")?function(u){return u==null?"":g.call(u)}:function(u){return u==null?"":(u+"").replace(b,"")},m=function(y){var w,z,v,u,x=typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):" ";if(z){u=0;while((v=w[u++])){if(z.indexOf(" "+v+" ")<0){z+=v+" "}}t[c]=s(z)}}},p=function(y){var w,z,v,u,x=arguments.length===0||typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):"";if(z){u=0;while((v=w[u++])){while(z.indexOf(" "+v+" ")>=0){z=z.replace(" "+v+" "," ")}}t[c]=y?s(z):""}}},n;k.push(["_eventActived",function(){p(h);m(e)}]);k.push(["_eventInactived",function(){p(h);m(i)}]);k.addScript=n=function(u,A,w,C,E,B){E=E||function(){};B=B||function(){};var x=q.createElement("script"),z=q.getElementsByTagName("script")[0],v,y=false,D=function(){x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;a("_eventInactived");B()};if(C){v=setTimeout(function(){D()},C)}x.type=A||"text/javascript";x.async=w;x.onload=x.onreadystatechange=function(G,F){if(!y&&(!x.readyState||/loaded|complete/.test(x.readyState))){y=true;if(C){clearTimeout(v)}x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;if(!F){setTimeout(function(){E()},200)}}};x.onerror=function(H,G,F){if(C){clearTimeout(v)}D();return true};x.src=u;z.parentNode.insertBefore(x,z)};a("_eventPreload");m(h);n(r,"text/javascript",false,3000)})(this,this.document,"className","jf-loading","jf-active","jf-inactive","//d3gc6cgx8oosp4.cloudfront.net/js/stable/v/5.0.3/id/90054322147");</script>


<script type="text/javascript">
//     var copyTextareaBtn = document.querySelector('.js-textareacopybtn');
// $('.hidden_link').val(window.location.href);
// copyTextareaBtn.addEventListener('click', function(event) {
//   var copyTextarea = document.querySelector('.hidden_link');
//   copyTextarea.select();

//   try {
//     var successful = document.execCommand('copy');
//     var msg = successful ? 'successful' : 'unsuccessful';
//     console.log('Copying text command was ' + msg);
//   } catch (err) {
//     console.log('Oops, unable to copy');
//   }
// });
</script>
</body>
</html>
