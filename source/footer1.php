<footer>
<section id="footer">
	<div class="container">
		<div class="row mar_0">
			<div class="col-lg-12 footer_wrp">	
				<div class="col-md-4">
				<div class="about">
					<a href="" class="footer_logo"><img src="img-responsive" alt="">hautehire</a>
					<div class="addres_detail">
						<strong>office</strong>
						<p>Kecamatan Coblong<br>
							Bandung.<br>
							Indonesia - 12345<br>
							Ph. +6212345678<br>
							Email. hautehire@mymail.com
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="footer_menu">
					<ul class="list-unstyled">
						<li><a href="">trands</a></li>
						<li><a href="">new collection</a></li>
						<li><a href="">fency</a></li>
						<li><a href="">all categorey</a></li>
						<li><a href="">cloths</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<div class="footer_input">
					<span>
						<label for="Email">Email</label>	
						<input type="text"  class="subscribe_input"></span>
						<p>
							<input type="submit" value="subscribe" class="submit_input">
						</p>
					</div>			
				</div>
			</div>		
		</div>
	</div>
</section>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
  		/*  ------------ select start-------------*/
  		$("select").on("click" , function() {

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
  		  $("#datepicker1,#datepicker2,#datepicker3,#datepicker4").datepicker({dateFormat : 'yy-mm-dd'});
  		  $('#datepicker1,#datepicker2').live('click',function(){
            $('.ui-state-active').parent('td').css('background-color','#eee');
          });
  		/*----------datepicker end---*/	
  		var s = $("#sidebar");
	var pos = s.position();					   
	$(window).scroll(function() {
		var windowpos = $(window).scrollTop();
		if (windowpos >= pos.top & windowpos <=600) {
			s.addClass("fixed");
		} else {
			s.removeClass("fixed");	
		}
	});
    });
      new WOW().init();
    </script>
<script type="text/javascript">
  $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1000,
      values: [ 10, 2000 ],
      slide: function( event, ui ) {
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

<style>

</style>
</footer>