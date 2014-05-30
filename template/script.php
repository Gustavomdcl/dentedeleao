	<!-- javascript
	======================================================== -->
	<!-- jquery jquery.com -->
	<script src="assets/min/jquery.min.js?v=1.11.0"></script>
	<!-- jquery Cookies -->
	<script src="assets/js/jquery.cookies.js"></script>
	<!-- jquery Weather -->
	<script src="assets/js/jquery.weather.js"></script>
	<!-- jquery Logout -->
	<script>
	$('.logout').click(function(e){
		e.preventDefault();
		createCookie('ddlweather', '',0);
		window.location.assign("sair.php");
	});
	</script>
	<!-- ckeditor http://ckeditor.com/license -->
	<script src="assets/ckeditor/ckeditor.js"></script>
	<script>
	//http://www.aliaspooryorik.com/blog/index.cfm/e/posts.details/post/using-jquery-validate-plugin-with-ckeditor-396
		CKEDITOR.replace( 'ckeditor', {
			allowedContent: true,
			language: 'pt-br'
		});

	</script>
	<!-- waypoints -->
	<!-- waypoints -->
	<script src="assets/min/jquery.waypoints.min.js" type="text/javascript"></script>
	<script src="assets/min/jquery.waypoints-sticky.min.js" type="text/javascript"></script>
	<script>
		$('.l-sidebar').waypoint('sticky', {offset: '70'});
	</script>
	<!-- suiting -->
	<script src="assets/min/jquery.suiting.min.js"></script><!-- GRUNT http://blog.henriquesilverio.com/javascript-e-jquery/grunt-js-automatize-tarefas-e-otimize-o-seu-workflow/ -->
	<!-- mobile -->
	<script src="assets/min/jquery.mobile.min.js"></script><!-- GRUNT http://blog.henriquesilverio.com/javascript-e-jquery/grunt-js-automatize-tarefas-e-otimize-o-seu-workflow/ -->
	<!-- main -->
	<script src="assets/min/jquery.main.min.js"></script><!-- GRUNT http://blog.henriquesilverio.com/javascript-e-jquery/grunt-js-automatize-tarefas-e-otimize-o-seu-workflow/ -->
	<!-- analytics -->
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<!-- jquery validate -->
	<script src="assets/min/jquery.validate.min.js"></script>
	<script src="assets/js/jquery.validate.messages.js"></script>
	<script src="assets/min/jquery.placeholder.min.js"></script><!-- depois de todos os códigos javascript -->
	<script src="assets/min/jquery.validate.messages.min.js"></script><!-- não existe, precisa ser criado -->
	<script src="assets/min/jquery.maskedinput.min.js"></script>
	<script src="assets/min/jquery.jscroll.min.js"></script>