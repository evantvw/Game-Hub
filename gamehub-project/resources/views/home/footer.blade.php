<footer class="footer">
    <div class="container-footer">
        <div class="row">
            <div class="footer-col" id="kiri">
                <h4>about us</h4>
             <p>
                GameHub is a gaming website where you can find your favorite game and save it to your playlist. Especially when you don't know what game you should play after completing a game, GameHub can give you the best game recommendation for you based on your preference. This website is develop by <a href="/teams">our team</a> consisting of Kenly, Evant, and Noel .
             </p>
            </div>
            <div class="footer-col" id="tengah1">
             <h4>social media</h4>
             <div class="social-links">
                 <a href="https://www.youtube.com/channel/UCiFID9q5UDpH-4x42d_RaHA" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                 <a href="mailto: contact.gamehubid@gmail.com" target="_blank"><i class="fa-regular fa-envelope"></i></a>
                 <a href="https://www.instagram.com/connect.gamehub" target="_blank"><i class="fab fa-instagram"></i></a>
                 <a href="https://twitter.com/ConnectGameHub" target="_blank"><i class="fa-brands fa-twitter"></i></a>
             </div>
            </div>
            <div class="footer-col" id="tengah2">
                <h4>navigate</h4>
                <ul>
                    <li><a href="{{ asset('home') }}">Home</a></li>
                    <li><a href="#">Browse</a></li>
                    <li><a href="{{ asset('mygames') }}">MyGame</a></li>
                    <li><a href="{{ asset('profile') }}">Profile</a></li>
                </ul>
            </div>
            <div class="footer-col" id="kanan">
             <h4>contact us</h4>
             {{ session()->has('msgsent') ? session()->get('msgsent') : ''}}
             <form action="/sendmessage" method="POST">
                @csrf
                 <div class="text">
                     <label for="email">Email</label>
                 </div>
                 <input class="input-footer" type="email" name="email" id="email" placeholder=" email" required>
                 <div class="text">
                     <label for="message">Message</label>
                 </div>
                 <textarea class="input-footer" name="message" id="message" cols="25" rows="2" placeholder="input your message here" required></textarea>

                 <div class="btn">
                     <button type="submit">Send</button>
                 </div>

             </form>
            </div>
        </div>
    </div>
</footer>
