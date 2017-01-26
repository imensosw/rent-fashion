<footer>
<section id="footer" class="footer_main_hero" >
	<div class="container">
		<div class="row ">
			<div class="col-lg-12 footer_wrp">

          <div class="col-md-3 col-sm-3">
            <div class="fotr_column">
              <h5 class="ftr_head">COMPANY</h5>
              <ul class="list-unstyled">
								<li><a href="">about us</a></li>
                <li><a href="">careers</a></li>
                <li><a href="<?php echo $web['url'];?>faq">Help &amp; FAQ</a></li>
                <li><a href="">Investors</a></li>
                <li><a href="">Terms &amp; Privacy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="fotr_column">
              <h5 class="ftr_head">HOW IT WORKS</h5>
              <ul class="list-unstyled">
                <li><a href="">List</a></li>
                <li><a href="">Hire</a></li>
              </ul>
            </div>
          </div>
          <!-- <div class="col-md-3">
            <div class="fotr_column">
              <a href="index.php" class="logo ftr_logo">
                <img src="http://dev.imenso.co/hautehire/static/img/logo.png" alt="footer-logo">
              </a>
              <div class="addres_div">
                <span>221B, Backer Street, London, USA </span>
                <span>+6265623216565</span>
                <span>hautehire@gmail.com</span>
              </div>
              <div class="footer_input">
                <span>
                  <input type="text"  class="subscribe_input" placeholder="Email Address">
                  <a href="" class="ftr_submit_btn"><i class="fa fa-send"></i></a>
                </span>
              </div>
            </div>
          </div> -->
					<div class="col-md-3 col-sm-3">
            <div class="fotr_column">
              <h5 class="ftr_head">DISCOVER</h5>
              <ul class="list-unstyled">
                <li><a href="">Join</a></li>
								<li><a href="">Sitemap </a></li>
								<li><a href="">Invite Friends</a></li>
								<li><a href="">Media </a></li>
              </ul>
            </div>
          </div>
					<div class="col-md-3 col-sm-3">
            <div class="fotr_column">
              <h5 class="ftr_head">Customar Care</h5>
              <ul class="list-unstyled">
                <li><a href="<?php echo $web['url'];?>contact">Contact Us</a></li>
              </ul>
            </div>
          </div>
        </div>
	</div>
</section>
<section class="bottom_ftr">
  <div class="container">
      <div class="row">
        <div class="rights_social_wrp clearfix">
            <div class="col-md-6">
                <div class="rights_fotr">
                  <span><a href="javascript:;">HAUTEHIRE</a>&copy all right reserved.2016</span>
                </div>
            </div>
            <div class="col-md-6">
              <div class="social_links_fotr">
                <!--<a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
                <a href=""><i class="fa fa-instagram"></i></a>-->
<!-- facebook share -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1767917903532738";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
<!--<img src = "index.jpg" width="100px" height="30px" class = "share_button" value1="<?php //echo "$row1['post_nj_job_title']*$row1['post_nj_no_post']*$last_dates*$row1['post_nj_orga_name']" ?>">-->

<i class="fa fa-facebook share_button" value1=""></i>
<!-- facebook share -->
<!-- twitter share 
https://twitter.com/intent/tweet?text=Hello%20world
http://twitter.com/share?url=[url]&via=trucsweb&image-src=[img]&text=[title2.9k]-->
<a class="twitter-share-button1"
  href="http://twitter.com/share?text=this is very good product&url=<?php echo $web['url']; ?>"
  data-size="large"><i class="fa fa-twitter"></i></a>
  <!--<a class="twitter-share-button1"
  href="https://twitter.com/share"
  data-size="large"
  data-text="custom share text"
  data-url="https://dev.twitter.com/web/tweet-button"
  data-hashtags="example,demo"
  data-via="twitterdev"
  data-related="twitterapi,twitter">
<i class="fa fa-twitter"></i>
</a>-->
<!-- twitter share -->
<a href=""><i class="fa fa-instagram"></i></a>
<a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>

          </div>
      </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="http://multidatespickr.sourceforge.net/jquery-ui.multidatespicker.js"/></script>
<script>
//twitter
window.twttr = (function(d, s, id) 
{
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) 
  {
    t._e.push(f);
  };
  return t;
}(document, "script", "twitter-wjs"));
//twitter
</script>
    <script>
  document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
         document.getElementById('interactive');
         document.getElementById('loader').style.display="none";

  }
}
    $(document).ready(function(){
      //facebook
      $('.share_button').click(function(e)
      {
        var info=$(this).attr("value1");
        arr =info.split('hirtv1');
        //alert(info);
        e.preventDefault();
        FB.ui(
        {
        method: 'feed',
        name: 'hello',
        link: 'http://dev.imenso.co/hautehire/'+arr[0],
        picture: 'http://dev.imenso.co/hautehire/'+arr[1],
        caption: 'hi',
        description: 'test1',
        message: 'test1'
        });
      });
      //facebook
      $("#signin_form").submit(function(){
        //alert();
      //alert($("#rusertype").val());

        usern= $("#usern").val(),
        email= $("#email").val(),
        password= $("#password").val(),
        cpassword=$("#cpassword").val(),
        regquota=$("#regquota").val(),
        regurl=$("#regurl").val(),
        //alert(regurl);

        $.ajax({
        type: "POST",
        url: "http://dev.imenso.co/hautehire/source/registerData.php",
        data : {usern:usern,phps_register:"yes",email:email,password:password,cpassword:cpassword,regquota:regquota,regurl:regurl},
        success : function(response)
        {
          //alert();
          if(response.VerficationStatus=="AR")
          {
              $("#message_s").html('<p class="success">Error! All fields are required.</p>');
          }
          else if(response.VerficationStatus=="VU")
          {
              $("#message_s").html('<p class="success">Error! Please enter valid username.</p>');
          }
          else if(response.VerficationStatus=="VE")
          {
              $("#message_s").html('<p class="success">Error! Please enter valid e-mail address.</p>');
          }
          else if(response.VerficationStatus=="UE")
          {
              $("#message_s").html('<p class="success">Error! Username already taken.</p>');
          }
          else if(response.VerficationStatus=="EE")
          {
              $("#message_s").html('<p class="success">Error! Email already exists.</p>');
          }
          else if(response.VerficationStatus=="PN")
          {
              $("#message_s").html('<p class="success">Your passwords does not match.</p>');
          }
          else if(response.VerficationStatus=="RQ")
          {
              $("#message_s").html('<p class="success">Your Registration quots are not available</p>');
          }
          else if(response.VerficationStatus=="RS")
          {
            $("#signin_form").slideUp('slow', function(){
            $("#message_s").html('<p class="success">Your Registration is successfully.</p>');
            $(location).attr('href',regurl);
            });
          }
        },dataType: "json"
    });
    return false;
      });
          new WOW().init();
      $("#datepicker1,#datepicker2,#datepicker3,#datepicker4").multiDatesPicker({
minDate: 0,
maxDate: 30,
mode: 'daysRange',
autoselectRange: [0,4],


        onSelect: function(){
          str=$(this).val();
          var res = str.split(",");
          var res1 = res[0].split("/");
          var res2 = res[3].split("/");
          var res3 = res2[0].split(" ");
          $(this).val(res1[1]+"/"+res1[0]+" to "+res2[1]+"/"+res3[1]);
          hidedatepiker();
        },
    });

function hidedatepiker()
{
  setTimeout(function(){
    $('#ui-datepicker-div').removeAttr('style');
    $('.datepicker').trigger('blur'); });
//setTimeout(function(){  $('#ui-datepicker-div').removeAttr('style'); $('#datepicker1').trigger('blur'); }, 100);
}
$(document).mouseup(function (e) {
        $('#datepicker1').Close();
        alert();
});
      });
    </script>
<script type="text/javascript">
$(document).ready(function()
{
  $("#signup").click(function()
  {
    //alert();
  	var usern = $("#usern").val();
	  var password = $("#password").val();
	  var cpassword = $("#cpassword").val();
	  var email = $("#email").val();

	 var xhttp = new XMLHttpRequest();
	 var a = "";
	 xhttp.onreadystatechange = function()
	 {
	     if (this.readyState == 4 && this.status == 200)
	     {
	       a = this.responseText;
	       $(".dropdown-menu").children("ul").html(rtext);
	       //alert(a);
	     }
	 };
	 xhttp.open("GET", "http://dev.imenso.co/hautehire/source/register_user.php?usern="+usern+"&password="+password+"&cpassword="+cpassword+"&email="+email,false);
	 xhttp.send();
    });
  		/*  ------------ select start-------------*/
  		/*$("select").on("click" , function() {

  			$(this).parent(".select-box").toggleClass("open");

  		});

  		$(document).mouseup(function (e)
  		{
  			var container = $(".select-box");

  			if (container.has(e.target).length === 0)
  			{
  				container.removeClass("open");
  			}
  		});
  		$("select").on("change" , function() {

  			var selection = $(this).find("option:selected").text(),
  			labelFor = $(this).attr("id"),
  			label = $("[for='" + labelFor + "']");

  			label.find(".lebel-desc").html(selection);

  		});
  		/*  ------------ select end-------------*/

  		/*----------datepicker start---*/
        /*$(".ui-state-default").click(function(){
          //alert("2")
          $("#ui-datepicker-div").hide();
      }); */
      //$("#ui-datepicker-div").show();



    		  /*$('#datepicker1,#datepicker2').live('click',function(){
            $('.ui-state-active').parent('td').css('background-color','#eee');
          });*/
  		/*----------datepicker end---*/
});
</script>
<script type="text/javascript">
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1000,
      values: [ 10, 2000 ],
      slide: function( event, ui )
      {
        var currency_symbal = '$';
        $( "#min_amount" ).val( currency_symbal + ui.values[ 0 ] );
        $( "#slider_range_price_min" ).html( currency_symbal + ui.values[ 0 ] );
        $( "#max_amount" ).val( currency_symbal + ui.values[ 1 ] );
        $( "#slider_range_price_max" ).html( currency_symbal + ui.values[ 1 ] );
      }
    });
    $( "#min_amount" ).val( currency_symbal + $( "#slider-range" ).slider( "values", 0 ) );
    $( "#slider_range_price_min" ).html( currency_symbal + $( "#slider-range" ).slider( "values", 0 ) );
    $( "#max_amount" ).val( currency_symbal + $( "#slider-range" ).slider( "values", 1 ) );
    $( "#slider_range_price_max" ).html( currency_symbal + $( "#slider-range" ).slider( "values", 1 ) );
  });
</script>

<script>
	$stick = $('.sidebar');
$foot = $('footer');
margin = 20;
offtop = $stick.offset().top + margin;
offbtm = $foot.offset().top + ( margin*2 + $stick.height() );

$(window).scroll(function () {
	scrtop = $(window).scrollTop();
  if (scrtop > offtop && $stick.hasClass('natural')) {
    $stick.removeClass('natural').addClass('fixed').css('top', margin);
  }
  if (offtop > scrtop && $stick.hasClass('fixed')) {
    $stick.removeClass('fixed').addClass('natural').css('top', 'auto');
  }
  if (scrtop > offbtm && $stick.hasClass('fixed')) {
    $stick.removeClass('fixed').addClass('bottom').css('top', offbtm+margin);
  }
  if (offbtm > scrtop && $stick.hasClass('bottom')) {
    $stick.removeClass('bottom').addClass('fixed').css('top', margin);
  }
});
      $(function(){
  new WOW().init();
});
</script>
<?php
include($_SERVER['DOCUMENT_ROOT']."/hautehire/source/login-model.php");
?>
</footer>
