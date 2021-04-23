@auth

<footer class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="footer-info">
                    <h2>Q & A</h2>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-md-4">
                    <div class="footer-box footer-settings">
                        <h3>Our Address</h3>
                        <ul class="list-unstyled">
                            <li class="link-list">
                                <a class="link-item" href="">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>60 Link Road Lhr. Pakistan 54770</span>
                                </a>
                            </li>
                            <li class="link-list">
                                <a class="link-item" href="">
                                    <i class="fas fa-phone-alt"></i>
                                    <span>(042) 1234567890</span>
                                </a>
                            </li>
                            <li class="link-list">
                                <a class="link-item" href="">
                                    <i class="fas fa-envelope"></i>
                                    <span>contant@scriptsbundle.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-box footer-news">
                        <h3>Latest news</h3>
                        <ul class="list-unstyled">
                            <li>
                                <div class="card mb-3" >
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="..." alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="card mb-3" >
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="..." alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-box footer-links">
                        <h3>Links Site</h3>
                        <ul class="list-unstyled">
                            @guest
                                <li class="link-list">
                                    <a class="link-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="link-list">
                                    <a class="link-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endguest
                            <li class="link-list">
                                <a class="link-item" href="">Home</a>
                            </li>
                            <li class="link-list">
                                <a class="link-item" href="">Browse Questions</a>
                            </li>
                            <li class="link-list">
                                <a class="link-item" href="">Blog</a>
                            </li>
                            <li class="link-list">
                                <a class="link-item" href="">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-12 text-center">
                <div class="copyright">
                    <p class="copyright-note">&copy; All Rights Reserved | Created by <a href="#">Islam Diab</a> </p>
                </div>
            </div>
        </div>


    </div>
</footer>
@endauth
