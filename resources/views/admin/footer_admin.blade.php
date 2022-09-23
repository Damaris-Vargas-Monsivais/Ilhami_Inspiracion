

    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <script>
    	var base_url 	= $('meta[name="base_url"]').attr('content');
		function load_logoheader()
		{
			$.ajax({
				url 		: base_url + '/admin/loadlogo',
				method 		: 'POST',
				success     : function(r){
					if(!r.status){
						alertify.alert(r.msg);
						return;
					}

		            let html = `<a class="site-logo align-self-center" href="{{ route('home') }}">
						          <img src="${base_url}/img/logo/${r.logo}" alt="Logoencode">
						        </a>`;
						        
		            $('#wrapper_logoheader').html(html);
				},
				dataType 	: 'json'
			});
		}
		load_logoheader();
    </script>	
  </body>
</html>