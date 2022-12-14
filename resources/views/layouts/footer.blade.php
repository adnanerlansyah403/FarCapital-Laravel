<footer class="footer">
    <div class="container">

        <div class="footer__brand">
            <div class="logo">
                <h1><a href="#home">Rondovision</a></h1>
            </div>
            <address class="address">
                128 Market St. <br>
                20193 San Francisco <br>
                California Suite #201
            </address>
        </div>

        <div class="footer__lists">

            <ul class="footer__links">
                <li>
                    <span class="footer__title">Company</span>
                </li>
                <li>
                    <a href="#home" class="footer__link">Home</a>
                </li>
                <li>
                    <a href="#about" class="footer__link">About Us</a>
                </li>
                <li>
                    <a href="#support" class="footer__link">Support</a>
                </li>
                <li>
                    <a href="#carrers" class="footer__link">Carrers</a>
                </li>
            </ul>

            <ul class="footer__links">
                <li>
                    <span class="footer__title">Quick Link</span>
                </li>
                <li>
                    <a href="#sharelocation" class="footer__link">Share Location</a>
                </li>
                <li>
                    <a href="#orders" class="footer__link">Orders Tracking</a>
                </li>
                <li>
                    <a href="#support" class="footer__link">Size Guide</a>
                </li>
                <li>
                    <a href="#faqs" class="footer__link">FAQs</a>
                </li>
            </ul>

            <ul class="footer__links">
                <li>
                    <span class="footer__title">Legal</span>
                </li>
                <li>
                    <a href="#home" class="footer__link">Terms & conditions</a>
                </li>
                <li>
                    <a href="#privacy" class="footer__link">Privacy Policy</a>
                </li>
                <li>
                    <ul class="social__links">
                        <li>
                            <a href="#" class="social__link">
                                <i class="uil uil-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social__link">
                                <i class="uil uil-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social__link">
                                <i class="uil uil-twitter-alt"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="social__link">
                                <i class="uil uil-linkedin-alt"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>

    </div>
</footer>

@push('scripts')
<script>

    const header = document.querySelector('.header');
    const btnNavOpen = document.querySelector('[data-nav-open]');
    const navMobile = document.querySelector('.nav__menu__list');
    const btnNavAction = document.getElementById('nav__action');

    btnNavOpen.addEventListener('click', () => {
        navMobile.classList.toggle('active');
        if(navMobile.classList.contains('active')) {
            btnNavAction.classList.remove('uil-bars')
            btnNavAction.classList.add('uil-times')
        } else {
            btnNavAction.classList.remove('uil-times')
            btnNavAction.classList.add('uil-bars')
        }
    })
    
    window.addEventListener('scroll', () => {
        if(window.scrollY > 300) {
            header.classList.add('active');
            navMobile.classList.remove('active');
            btnNavAction.classList.remove('uil-times')
            btnNavAction.classList.add('uil-bars')
        } else {
            header.classList.remove('active');
        }

    });

</script>
@endpush