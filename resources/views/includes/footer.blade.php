<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Get in Touch</h3>
                    <div class="contact-info">
{{--                        <p><i class="fa fa-map-marker"></i>123 News Street, NY, USA</p>--}}
                        <p><i class="fa fa-envelope"></i>info@hype-news.eu</p>
                        <p><i class="fa fa-phone"></i>+123-456-7890</p>
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Useful Links</h3>
                    <ul>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                        <li><a href="{{route('terms')}}">Terms</a></li>
                        <li><a href="{{route('privacy')}}">Privacy</a></li>
                        <li><a href="{{route('about')}}">About</a></li>
{{--                        <li><a href="#"></a></li>--}}
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Categories</h3>
                    <ul>
                        @foreach(App\Models\Category::all()->take(4) as $category)
                        <li><a href="{{route('byCategory', $category->id)}}">{{$category->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h3 class="title">Newsletter</h3>
                    <div class="newsletter">
                        <p>
                            Daca ai știri care crezi că ar putea avea impact social lasăne un email aici sau contacteaza-ne pe pagina Contacts
                        </p>
                        <form>
                            <input class="form-control" type="email" placeholder="Your email here">
                            <button class="btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Footer Menu Start -->
<div class="footer-menu">
    <div class="container">
        <div class="f-menu">
            <a href="{{route('terms')}}">Terms of use</a>
            <a href="{{route('privacy')}}">Privacy policy</a>
            <a href="{{route('cookies')}}">Cookies</a>
            <a href="{{route('adv')}}">Advertise with us</a>
            <a href="{{route('contact')}}">Contact us</a>
        </div>
    </div>
</div>
<!-- Footer Menu End -->

<!-- Footer Bottom Start -->
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>Copyright &copy; <a href="#">AndrewCoder</a>. All Rights Reserved</p>
            </div>

            <div class="col-md-6 template-by">
                <p>Template By <a href="#">AndrewCoder</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Footer Bottom End -->

<!-- Back to Top -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
