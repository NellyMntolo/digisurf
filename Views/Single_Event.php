<?php
include '../Model/eventDAO.php';
include_once("header.php");
include_once("footer.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="event_text3">
    <meta name="keywords" content="tevent_text2">
    <meta name="author" content="Nelly">

    <?php echo $favs;?>
    <?php echo $css;?>
    <title><?php echo $event_text1;?></title>

    <!-- <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'GTM-PPN2XRH', 'event_callback': callback }); return false; } </script> -->

</head>

<body class="animsition">
<?php echo $google_tags_analytics;?>
<?php echo $header;?>

<main>
    <div class="main-container page-fix">
        <div class="container cf">



            <section class="about-section-header" style="background-image: url('<?php echo $single_event_image1;?>');">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <h2><?php echo $event_text4;?></h2>                 
                    </div>
                  </div>
                </div>
            </section>


            <section class="about-section">
                <div class="container">
                  <div class="row event-rows">
                    <div class="col-md-3 single_event_date">
                      <p><?php echo $event_date;?></p>
                    </div>
                      <div class="col-md-3 event_recommended">
                      <p>recommended</p>                 
                    </div>
                  </div>
                </div>
            </section>


            <section class="event-section">
                <div class="container">
                  <div class="row event-rows">
                    <div class="col-md-12 single_event_title">
                      <h1><?php echo $event_text5;?></h1>                 
                    </div>
                  </div>
                </div>
            </section>

            <section class="event-section those-addresses">
                <div class="container">
                  <div class="row event-rows">
                    <div class="col-md-9 event_addresses">
                      <i class="fa fa-home"></i><h1><?php //echo $event_text6;?>110 3F., No.2, Aly. 29, Ln. 372, Sec. 5, Zhongxiao E. Rd., Xinyi Dist., Taipei City 110</h1>             
                    </div>
                  </div>
                  <div class="row event-rows">
                    <div class="col-md-9 event_addresses">
                      <i class="fa fa-phone-alt"></i><h1><?php //echo $event_text6;?>(02) 3746-2837</h1>             
                    </div>
                  </div>
                  <div class="row event-rows">
                    <div class="col-md-9 event_addresses">
                      <i class="fa fa-calendar-week"></i><h1><?php //echo $event_text6;?>Aug. 08 - Sep. 18 2019,  Open Time 10:00 - 17:00</h1>             
                    </div>
                  </div>
                </div>
            </section>

<?php echo $event_content; ?>

<div class="row more-events">
  <div class="col-md-12">
        <h3>More Events ...</h3>
        <?php echo $more_events_all; ?>
  </div>
</div>
















            


        </div>
    </div>

<?php echo $footer;?>    
</main>


<!-- Script -->
<?php echo $scripts; ?>


<script type="text/javascript">var _jf = _jf || [];_jf.push(['p','50988']);_jf.push(['_setFont','sourcehansans-tc-extralight','css','.sourcehansans-tc-extralight']);_jf.push(['_setFont','sourcehansans-tc-extralight','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-extralight','weight',100]);_jf.push(['_setFont','sourcehansans-tc-normal','css','.sourcehansans-tc-normal']);_jf.push(['_setFont','sourcehansans-tc-normal','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-normal','weight',300]);_jf.push(['_setFont','sourcehansans-tc-medium','css','.sourcehansans-tc-medium']);_jf.push(['_setFont','sourcehansans-tc-medium','alias','sourcehansans-tc']);_jf.push(['_setFont','sourcehansans-tc-medium','weight',600]);(function(f,q,c,h,e,i,r,d){var k=f._jf;if(k.constructor===Object){return}var l,t=q.getElementsByTagName("html")[0],a=function(u){for(var v in k){if(k[v][0]==u){if(false===k[v][1].call(k)){break}}}},j=/\S+/g,o=/[\t\r\n\f]/g,b=/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,g="".trim,s=g&&!g.call("\uFEFF\xA0")?function(u){return u==null?"":g.call(u)}:function(u){return u==null?"":(u+"").replace(b,"")},m=function(y){var w,z,v,u,x=typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):" ";if(z){u=0;while((v=w[u++])){if(z.indexOf(" "+v+" ")<0){z+=v+" "}}t[c]=s(z)}}},p=function(y){var w,z,v,u,x=arguments.length===0||typeof y==="string"&&y;if(x){w=(y||"").match(j)||[];z=t[c]?(" "+t[c]+" ").replace(o," "):"";if(z){u=0;while((v=w[u++])){while(z.indexOf(" "+v+" ")>=0){z=z.replace(" "+v+" "," ")}}t[c]=y?s(z):""}}},n;k.push(["_eventActived",function(){p(h);m(e)}]);k.push(["_eventInactived",function(){p(h);m(i)}]);k.addScript=n=function(u,A,w,C,E,B){E=E||function(){};B=B||function(){};var x=q.createElement("script"),z=q.getElementsByTagName("script")[0],v,y=false,D=function(){x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;a("_eventInactived");B()};if(C){v=setTimeout(function(){D()},C)}x.type=A||"text/javascript";x.async=w;x.onload=x.onreadystatechange=function(G,F){if(!y&&(!x.readyState||/loaded|complete/.test(x.readyState))){y=true;if(C){clearTimeout(v)}x.src="";x.onerror=x.onload=x.onreadystatechange=null;x.parentNode.removeChild(x);x=null;if(!F){setTimeout(function(){E()},200)}}};x.onerror=function(H,G,F){if(C){clearTimeout(v)}D();return true};x.src=u;z.parentNode.insertBefore(x,z)};a("_eventPreload");m(h);n(r,"text/javascript",false,3000)})(this,this.document,"className","jf-loading","jf-active","jf-inactive","//d3gc6cgx8oosp4.cloudfront.net/js/stable/v/5.0.3/id/90054322147");</script>
</body>
</html>
