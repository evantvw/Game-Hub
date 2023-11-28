@section('title','Our Teams')

<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/stylewithfooter.css') }}">
    @include('nav.navigation')

    <section>
        <div class="page_title color-white">
            <h1>Our Team</h1>
        </div>
        <div class="container">
            <div class="team-column" id="team1">
                <div class="card">
                    <div class="img-container">
                        <img id="team-img1" class="duotoned" src="<?= asset('img/teams/kenly.jpg') ?>" alt="">
                    </div>
                    <div class="text-container">
                        <h3>Kenly Krisaguino Santoso</h3>
                        <br>
                        <h4>Fullstack Developer</h4>
                        <br>
                        <h4>21.K1.0017</h4>
                    </div>
                    <div class="sosmed-container">
                        <a href="https://youtube.com/KenlyKrisaguino" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://www.tiktok.com/@keeeenly" target="_blank"><i class="fa-brands fa-tiktok"></i></i></a>
                        <a href="https://www.instagram.com/mkks_1710" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com/astrurilixval" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="team-column" id="team2">
                <div class="card">
                    <div class="img-container">
                        <img id="team-img2" class="duotoned" src="<?= asset('img/teams/evant.jpg') ?>" alt="">
                    </div>
                    <div class="text-container">
                        <h3>Evant Valery Wijaya</h3>
                        <br>
                        <h4>Front-end Developer</h4>
                        <br>
                        <h4>21.K1.0010</h4>
                    </div>
                    <div class="sosmed-container">
                        <a href="https://youtube.com/@evantvaleryw.6094" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://www.tiktok.com/@evantvalery" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="https://www.instagram.com/evantvalery" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com/Barbari04817130" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="team-column" id="team3">
                <div class="card">
                    <div class="img-container">
                        <img id="team-img3" class="duotoned" src="<?= asset('img/teams/noel.jpg') ?>" alt="">
                    </div>
                    <div class="text-container">
                        <h3>Immanuel Bimoputero</h3>
                        <br>
                        <h4>Front-end Developer</h4>
                        <br>
                        <h4>21.K1.0003</h4>
                    </div>
                    <div class="sosmed-container">
                        <a href="https://youtube.com/@immanuelbimoputero6493" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://www.instagram.com/immanoel_cah" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com/lenuca20" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="mailto: 21.k1.0003@student.unika.ac.id" target="_blank"><i class="fa-regular fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>

    @include('footer.footer')

</x-app-layout>
