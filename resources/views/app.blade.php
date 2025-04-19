<!DOCTYPE html>
<html lang="en">
	@include('partials.head')
<body>
	
	<!-- START PRELOADER -->
	<div class="preloader">
		<div class="status">
			<div class="status-mes"></div>
		</div>
	</div>
	<!-- END PRELOADER -->
	
	@include('partials.navbar')

	@include('partials.home')

	@include('partials.tentangkami')

	@include('partials.layanan')

	@include('partials.kategori')

	<!--- Ads Section -->
	<section>
		<div class="container">
			<div class="section-title-two">
				<h2>Ingin buang limbah atau rongsok? <a href="https://api.whatsapp.com/send?phone=62895351493927&text=Halo%20...Pak Arif%20Saya melihat website dan ingin%20buang%20limbah%20bisa%20dibantu%3F" target="_blank" style="color: blue; text-decoration: none;" onmouseover="this.style.color='blue'" onmouseout="this.style.color='blue'">Hubungi Kami</a></h2>
			</div>
			
		</div>
	</section>
	<!--- Ads Section -->

	@include('partials.gallery')

	
	
	@include('partials.kontak-kami')
	
	@include('partials.footer')
		
	@include('partials.script')
</body>
</html>