	<!-- javascript
	======================================================== -->
	<!-- jquery jquery.com -->
	<script src="assets/min/jquery.min.js?v=1.11.0"></script>
	<!-- suiting -->
	<script src="assets/min/jquery.suiting.min.js"></script><!-- GRUNT http://blog.henriquesilverio.com/javascript-e-jquery/grunt-js-automatize-tarefas-e-otimize-o-seu-workflow/ -->
	<!-- mobile -->
	<script src="assets/min/jquery.mobile.min.js"></script><!-- GRUNT http://blog.henriquesilverio.com/javascript-e-jquery/grunt-js-automatize-tarefas-e-otimize-o-seu-workflow/ -->
	<!-- main -->
	<script src="assets/min/jquery.main.min.js"></script><!-- GRUNT http://blog.henriquesilverio.com/javascript-e-jquery/grunt-js-automatize-tarefas-e-otimize-o-seu-workflow/ -->
	<!-- jquery validate -->
	<script src="assets/min/jquery.validate.min.js"></script>
	<script src="assets/min/jquery.placeholder.min.js"></script><!-- depois de todos os códigos javascript -->
	<script src="assets/min/jquery.validate.messages.min.js"></script>
	<!-- fancy box http://fancybox.net/ -->
	<script type="text/javascript" src="assets/min/jquery.fancybox.min.js?v=2.1.5"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		  $('.modal').fancybox();
		  $(".modal-img").click(function() {
		    $.fancybox.open($(this).data('modalimg'));
		  });
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
	<!-- analytics -->
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>