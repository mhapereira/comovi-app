<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Comovi</title>
		<meta name="description" content="Descubra como é viver com plenitude e alegria na melhor fase da vida. 
								Junte-se a nós em atividades enriquecedoras, eventos sociais, 
								e momentos de aprendizado que promovem saúde, bem-estar e amizade.">
		<meta name="keywords" content="terceira idade, melhor idade, guariba">
		<meta name="robots" content="index, follow">
		
		<!-- Open Graph -->
		<meta property="og:title" content="Comovi">
		<meta property="og:description" content="Descubra como é viver com plenitude e alegria na melhor fase da vida. 
								Junte-se a nós em atividades enriquecedoras, eventos sociais, 
								e momentos de aprendizado que promovem saúde, bem-estar e amizade.">
		<meta property="og:image" content="{{ asset('storage/image_ia/kv_inicial.png') }}">
		<meta property="og:url" content="URL da Página">
		<meta property="og:type" content="website">
	
		<!-- Twitter Cards -->
		<meta name="twitter:card" content="{{ asset('storage/image_ia/kv_inicial.png') }}">
		<meta name="twitter:title" content="Comovi">
		<meta name="twitter:description" content="Descubra como é viver com plenitude e alegria na melhor fase da vida. 
								Junte-se a nós em atividades enriquecedoras, eventos sociais, 
								e momentos de aprendizado que promovem saúde, bem-estar e amizade.">
		<meta name="twitter:image" content="{{ asset('storage/image_ia/kv_inicial.png') }}">
	
		<!-- Structured Data -->
		<script type="application/ld+json">
		{
		  "@context": "https://comovimelhoridade.org",
		  "@type": "WebPage",
		  "name": "Nome da Página",
		  "description": "Descrição da Página",
		  "url": "URL da Página"
		}
		</script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <!-- Styles -->
		@vite(['resources/css/app.css', 'resources/js/app.js'])

		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

		<!-- Link para Lightbox2 CSS -->
		<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">

    </head>
    <body class="montserrat">

			{{-- Navbar --}}
			<nav class="navbar navbar-expand-lg fixed-top bg-blur">
				<div class="container">
					<a class="navbar-brand montserrat-bold" href="#">COMOVI</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<div class="d-lg-flex d-block w-100 justify-content-end">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" aria-current="page" href="#sobre">Sobre nós</a>
								</li>
								<li class="nav-item @if($galeria->isEmpty()) d-none @endif">
									<a class="nav-link" href="#galeria">Galeria</a>
								</li>
								<li class="nav-item @if($eventos->isEmpty()) d-none @endif">
									<a class="nav-link" href="#eventos">Eventos</a>
								</li>
								<li class="nav-item @if($comunicados->isEmpty()) d-none @endif">
									<a class="nav-link" href="#comunicado">Comunicado</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#contatos">Contato</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>

			{{-- Inicio --}}
			<section id="inicio" class="pb-5">
				<main class="container pt-5 mt-5">
					<div class="row">
						<!-- Imagem -->
						<div class="col-12 col-lg-6 d-flex align-items-center">
							<img  src="{{ asset('storage/image_ia/kv_inicial.png') }}" style="max-height: 500px" alt="Imagem Exemplo" class="img-fluid mx-auto">
						</div>
						<!-- Texto -->
						<div class="col-12 col-lg-6 d-flex flex-column justify-content-center p-4">
							<h1 class="display-5 mb-4 montserrat-bold">Bem-vindo a Melhor Idade de Guariba!</h1>
							<p class="">
								Descubra como é viver com plenitude e alegria na melhor fase da vida. 
								Junte-se a nós em atividades enriquecedoras, eventos sociais, 
								e momentos de aprendizado que promovem saúde, bem-estar e amizade. 
								<br>
								Porque cada dia é uma nova oportunidade para celebrar a vida!
							</p>
						</div>
					</div>
				</main>
			</section>

			{{-- Comunicados --}}
			<section id="comunicado">
				<div class="container py-5 @if($comunicados->isEmpty()) d-none @endif">
					<div class="swiper">
						<div class="swiper-wrapper">

							@foreach ($comunicados as $comunicado)
								<div class="swiper-slide my-auto">
									<div class="card text-small text-warning-emphasis bg-warning-subtle border border-warning-subtle" data-bs-toggle="modal" data-bs-target="#comunicadoModal{{ $comunicado->id }}">
										<div class="card-body text-center">
											<h5 class="card-title montserrat-bold">{{ $comunicado->titulo }}</h5>
											<p class="card-text mb-0">{{ Str::limit($comunicado->descricao, 30) }}</p>
										</div>
									</div>
								</div>
							@endforeach

						</div>
					</div>
				</div>

				<!-- Modals -->
				@foreach ($comunicados as $comunicado)
				<div class="modal fade" id="comunicadoModal{{ $comunicado->id }}" tabindex="-1" aria-labelledby="comunicadoModalLabel{{ $comunicado->id }}" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered"> <!-- Centraliza o modal na tela -->
						<div class="modal-content text-small text-warning-emphasis bg-warning-subtle border border-warning-subtle"> <!-- Aplica o mesmo design do card -->
							<div class="modal-header">
								<h5 class="modal-title montserrat-bold" id="comunicadoModalLabel{{ $comunicado->id }}">{{ $comunicado->titulo }}</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body text-center">
								{{ $comunicado->descricao }}
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</section>
			
			{{-- Sobre nós --}}
			<div class="container text-center my-5 pb-5" id="sobre">
				<div class="w-lg-75 w-100 mx-auto">
					<h2 class="display-5 montserrat-bold py-5 my-5">Sobre Nós</h2>
					<p>
						Bem-vindo ao Centro de Convivência da Melhor Idade Alegria de Viver — carinhosamente chamada COMOVI.
						Somos uma comunidade em Guariba dedicada a promover a qualidade de vida e a socialização na terceira 
						idade. No COMOVI, a convivência é valorizada, a Melhor Idade é celebrada, e a Alegria de Viver está 
						presente em cada atividade, evento e interação.
					</p>
					<p class="mb-5">
						Nosso objetivo é oferecer um ambiente acolhedor onde os membros possam participar de atividades 
						físicas, educativas e culturais, criando novas memórias e amizades. Venha conhecer o COMOVI e 
						aproveite cada momento ao máximo!
					</p>
				</div>
			</div>

			{{-- Eventos --}}
			<section id="eventos">
				<div class="container py-5 @if($eventos->isEmpty()) d-none @endif" id="eventos">
					<h2 class="text-center display-5 montserrat-bold ">Eventos</h2>

					<div class="swiper py-5">
						<div class="swiper-wrapper">

							@foreach ($eventos as $evento)
							<div class="swiper-slide">
								<div class="card" data-bs-toggle="modal" data-bs-target="#eventoModal{{ $evento->id }}">
									<img src="{{ asset('storage/' . $evento->path ) }}" class="card-img-top" alt="Evento 1">
									<div class="card-body">
										<h5 class="card-title">{{ $evento->titulo }}</h5>
										<p class="card-text">{{ Str::limit($evento->descricao, 45) }}</p>
										<p class="card-text"><small class="text-muted">Data: {{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y H:i') }}</small></p>
										<p class="card-text @if($evento->valor == 0) d-none @endif"><strong>R$ {{ number_format($evento->valor, 2, ',', '.') }}</strong></p>
									</div>
								</div>
							</div>
							@endforeach

						</div>
					</div>
				</div>

				<!-- Modal -->
				@foreach ($eventos as $evento)
				<div class="modal fade" id="eventoModal{{ $evento->id }}" tabindex="-1" aria-labelledby="eventoModalLabel{{ $evento->id }}" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title montserrat-bold" id="eventoModalLabel{{ $evento->id }}">{{ $evento->titulo }}</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<img src="{{ asset('storage/' . $evento->path ) }}" class="img-fluid mb-3" alt="Evento {{ $evento->titulo }}">
								<p>{{ $evento->descricao }}</p>
								<p><small class="text-muted">Data: {{ \Carbon\Carbon::parse($evento->data)->format('d/m/Y H:i') }}</small></p>
								<p><strong>R$ {{ number_format($evento->valor, 2, ',', '.') }}</strong></p>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</section>

			{{-- Galeria --}}
			<div class="container my-5 @if($galeria->isEmpty()) d-none @endif" id="galeria">
				<h2 class="display-5 text-center mb-4 montserrat-bold py-5 my-5">Galeria</h2>
				<div class="row g-2">

					@foreach ($galeria as $galeri)
					@foreach ($galeri->path as $path)
					<div class="col-lg-3 col-sm-6">
						<a href="{{ asset('storage/' . $path ) }}" data-lightbox="gallery">
							<img src="{{ asset('storage/' . $path ) }}" alt="Imagem 1" 
							style="width: 100%; height: auto; object-fit: cover; aspect-ratio: 4 / 3;"
							class="img-fluid rounded">
						</a>
					</div>
					@endforeach
					@endforeach
							
				</div>
			</div>
			
			{{-- Seção com Mapa --}}
			<section class="mt-5" id="contatos">
				<div class="embed-responsive" style="position: relative; height: 500px;">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3589.908975527476!2d-48.2192636!3d-21.3622885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b90e47f9c85f73%3A0x47e0a3772046ccda!2sAv.%20Luiz%20Barichello%2C%20644%20-%20Jardim%20Progresso%2C%20Guariba%20-%20SP%2C%2014840-000!5e1!3m2!1sen!2sbr!4v1724693088543!5m2!1sen!2sbr&maptype=roadmap"
									style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
									allowfullscreen=""
									loading="lazy"
									referrerpolicy="no-referrer-when-downgrade">
					</iframe>
				</div>
			</section>

			{{-- Rodape --}}
			<footer id="footer" class="bg-dark text-white pt-4">
				<div class="container">
					<div class="row montserrat">
						<!-- Coluna 1: Título -->
						<div class="col-md-4 col-lg-6">
							<h5 class="montserrat-bold">
								Obrigado por seu apoio e
								confiança na Comovi!
							</h5>
						</div>
						<!-- Coluna 2: Endereço -->
						<div class="col-md-4 col-lg-3">
							<p class="montserrat-bold">Endereço</p>
							<p class="small">
								Avenida Luiz Barichello, 644<br>
								Jardim Progresso<br>
								Guariba - SP <br>
								<strong>CNPJ</strong>
								03.674.621/0001-49
							</p>
						</div>
						<!-- Coluna 3: Contatos -->
						<div class="col-md-4 col-lg-3">
							<p class="montserrat-bold">Contatos</p>
							@foreach ($contatos as $contato)
							<p  class="small">
								{{ $contato->email }} <br>
								{{ $contato->telefone }}								
							</p>
							@endforeach
						</div>
					</div>
					<div class="row mt-4">
						<div class="col">
							<p class="text-center small">© 2024 Todos os direitos reservados | Desenvolvido por Mateus Pereira.</p>
						</div>
					</div>
				</div>
			</footer>

	<!-- Link para Lightbox2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox-plus-jquery.min.js"></script>
	<!-- Link para Swiper JS -->
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script>
		var swiper = new Swiper('.swiper', {
			slidesPerView: 1,
			spaceBetween: 10,
			loop: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			autoplay: {
				delay: 5000,
			},
			breakpoints: {
				768: {
					slidesPerView: 3,
				},
			},
		});
	</script>
    </body>
</html>
