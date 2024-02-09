<x-app-layout>
    <div class="container py-8">
        <div class="text-center mt-4 mb-4">
            <img class="mx-auto" style="height: 50px; width: auto;" src="{{ asset('imagenes/artspace-logo-obscuro.svg') }}"
                alt="artSpace">
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">¡Bienvenido a ArtSpace!</h5>
                <h6 class="card-subtitle mb-2 text-muted">Acerca de la página</h6>
                <p class="card-text text-justify">
                    En <strong>ArtSpace</strong>, nos emociona ofrecer a los artistas digitales un espacio único para
                    dar vida a sus creaciones y conectar con un público apasionado. Nuestra plataforma fue creada con el
                    propósito de proporcionar a los artistas una vitrina virtual donde puedan construir, exhibir y
                    comercializar sus mundos imaginativos.
                </p>
                <h6 class="card-subtitle mb-2 text-muted mt-4">Nuestro Propósito</h6>
                <p class="card-text text-justify">
                    En un mundo cada vez más digital, creemos en empoderar a los artistas para que compartan su visión
                    con el mundo. <strong>ArtSpace</strong> no es solo un espacio de exhibición; es una comunidad
                    vibrante donde la creatividad florece y donde los artistas pueden encontrar apoyo, inspiración y
                    oportunidades para crecer.
                </p>

                <h6 class="card-subtitle mb-2 text-muted mt-4">Lo que ofrecemos</h6>
                <p class="card-text text-justify">
                    <strong>Creación sin límites:</strong> Proporcionamos herramientas intuitivas para que los artistas
                    diseñen y construyan sus propios entornos virtuales de manera fácil y emocionante.
                </p>
                <p class="card-text text-justify">
                    <strong>Exhibición personalizada:</strong> Cada artista puede exhibir sus imágenes, videos y GIFs de
                    una manera que refleje su estilo único, capturando la esencia de sus obras de arte digitales.
                </p>
                <p class="card-text text-justify">
                    <strong>Oportunidades comerciales: </strong> Facilitamos la monetización de tu arte al conectar a
                    los artistas con aquellos que valoran y desean poseer piezas digitales extraordinarias.
                </p>

                <h6 class="card-subtitle mb-2 text-muted mt-4">Únete a nuestra comunidad</h6>
                <p class="card-text text-justify">
                    Te invitamos a unirte a <strong>ArtSpace</strong> y explorar un mundo donde la creatividad no tiene
                    límites. Ya seas un artista establecido o estés dando tus primeros pasos en el mundo digital, aquí
                    encontrarás un espacio acogedor y estimulante para compartir tu talento. ¡Gracias por ser parte de
                    nuestra comunidad artística digital!
                </p>
            </div>
        </div>

        <div class="card mb-3 mt-3">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Contacto</h5>
                        <p class="card-text text-justify">
                            En <strong>ArtSpace</strong>, nos encantaría escucharte. Si tienes preguntas, sugerencias o
                            simplemente deseas decir hola, estamos aquí para ayudarte. Utiliza la información de
                            <a href="{{ route('formularios.form-contacto') }}" class="card-text">contacto</a> y llena el formulario, ¡nos pondremos en
                            contacto contigo lo antes
                            posible!
                        <p class="card-text text-justify">
                            ¡Esperamos con ansias recibir tu mensaje y estamos emocionados de ayudarte en lo que
                            necesites!
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <img src="{{ asset('imagenes/acercaDe/contacto.jpg') }}" class="img-fluid rounded-start"
                        alt="imagen-contacto">
                </div>
            </div>
        </div>

        <div class="card mb-3 mt-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('imagenes/acercaDe/blogger.png') }}" class="img-fluid rounded-start"
                        alt="imagen-contacto">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Conviértete en Blogger en ArtSpace</h5>
                        <p class="card-text text-justify">
                            ¡Nos emociona que quieras formar parte de nuestra comunidad creativa en
                            <strong>ArtSpace</strong>! Para comenzar a compartir tu arte y experiencias, sigue estos
                            sencillos pasos:
                        </p>

                        <p class="card-text text-justify">
                            1. Si eres nuevo,<a href="{{ route('register') }}" class="card-link"> regístrate</a> o si ya tienes una cuenta,<a href="{{ route('login') }}" class="card-link">incia sesión</a>.
                        </p>
                        <p class="card-text text-justify">
                            2. Después de iniciar sesión, completa nuestro <a href="{{ route('formularios.form-blogger') }}"
                                class="card-link"> formulario</a> de solicitud para bloggers.
                        </p>
                        <p class="card-text text-justify">
                            3. Una vez que hayas enviado el formulario, nuestro equipo de administradores revisará tu
                            solicitud. Te notificaremos tan pronto como se haya tomado una decisión.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 mt-3">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Términos y condiciones de uso ArtSpace</h5>
                        <p class="card-text text-justify">
                            Al acceder o utilizar <strong>ArtSpace</strong>, aceptas cumplir con los siguientes
                            <a href="{{ route('terminos.condiciones') }}" class="card-text">términos y
                                condiciones de uso</a>. Por favor, lee cuidadosamente antes de continuar. Esto te
                            ayudará a comprender nuestras
                            políticas y garantizará una experiencia positiva en la plataforma.
                        </p>
                        <p class="card-text text-justify">
                            Si no estás de acuerdo con estos términos, por favor, no utilices el servicio.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <img src="{{ asset('imagenes/acercaDe/terminos.jpg') }}" class="img-fluid rounded-start"
                        alt="imagen-terminos">
                </div>
            </div>
        </div>

        <div class="card mb-3 mt-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('imagenes/acercaDe/dev.png') }}" class="img-fluid rounded-start"
                        alt="imagen-dev">
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Únete a Nuestro Equipo</h5>
                        <p class="card-text text-justify">
                            En <strong>ArtSpace</strong>, valoramos la diversidad de talentos y habilidades. Estamos
                            buscando individuos apasionados y creativos para unirse a nuestro equipo y contribuir al
                            crecimiento de esta plataforma innovadora.
                        </p>
                        <p class="card-text text-justify">
                            Si tienes habilidades excepcionales y te apasiona el mundo digital, queremos conocerte.
                            <strong>ArtSpace</strong> está en constante crecimiento, y estamos buscando colaboradores
                            comprometidos que deseen formar parte de nuestro viaje emocionante.
                        </p>
                        <p>
                            Llena el <a href="#" class="card-text">
                            formulario</a>, después de recibir tu solicitud, nuestro equipo revisará tu hoja de vida y se pondrá en
                            contacto contigo para discutir las posibles oportunidades de colaboración.

                            ¡Esperamos con ansias trabajar contigo y llevar <strong>ArtSpace</strong> a nuevos
                            horizontes!
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
