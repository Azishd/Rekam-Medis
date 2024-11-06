<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="img/healthconnect_logo.png">
    <link rel="stylesheet" href="css/landing.css">
    <title>Health Connect</title>
</head>

<body>
    <header class="showcase">
        <div class="showcase-top">
            <img src="img/healthconnect_logo.png" alt="" />
            <a href="login" class="login-button">Sign In</a>
        </div>
        <div class="showcase-content">
            <h1>Hidup sehat adalah Hidup yang bahagia</h1>
            <p>Mulai dari sekarang, mari  menjalani hidup yang sehat dan bahagia</p>
            <a href="login" class="start-button">Mulai Sekarang</a>
        </div>
    </header>
    <section class="tabs">
        <div class="container">
            <div id="tab-1" class="tab-item tab-border">
                <i class="fas fa-door-open fa-3x"></i>
                <p class="hide-sm">Expert Doctor on Service</p>
            </div>
            {{-- <div id="tab-2" class="tab-item">
                <i class="fas fa-tablet-alt fa-3x"></i>
                <p class="hide-sm">Anywhere Can Be</p>
            </div> --}}
            <div id="tab-3" class="tab-item">
                <i class="fas fa-tags fa-3x"></i>
                <p class="hide-sm">24/7 Service</p>
            </div>
        </div>
    </section>

    <section class="tab-content">
        <div class="container">
            <!-- Tab Content 1 -->
            <div id="tab-1-content" class="tab-content-item show">
                <div class="tab-1-content-inner">
                    <div class="img-place">
                        <img class="image-one" src="\img\treating_doctor1.png"
                            alt="" />
                        <img class="image-two" src="\img\doctors_talk.jpg"
                            alt="" />
                    </div>
                    <div>
                        <p class="text-lg">
                            Beyond treating specific ailments, our expert doctors embrace a holistic approach to
                            wellness.
                        </p>
                        <a href="login" class="try-button">Try Now</a>
                    </div>
                </div>
            </div>

            {{-- <!-- Tab Content 2 -->
            <div id="tab-2-content" class="tab-content-item">
                <div class="tab-2-content-top">
                    <p style="font-size: 20px; width: 80%;" class="text-lg">
                        Our secure and user-friendly platform ensures a seamless experience, allowing you to discuss
                        your health concerns without the need for travel.
                    </p>
                    <a href="login" class="consule-button">Consult Yourself Now</a>
                </div>
                <div class="tab-2-content-bottom">
                    <div>
                        <img src="img/ipad.png" alt="" />
                        <p class="text-md">
                            Consult Anywhere, Anytime: Your Health, Your Way!
                        </p>
                        <p class="text-dark">
                            We're thrilled to offer you the freedom to schedule consultations wherever you want, at a
                            time that suits your busy lifestyle.


                        </p>
                    </div>
                    <div>
                        <img style="margin-top: 40px;margin-bottom: 42px;" src="img/macbook.png" alt="" />
                        <p class="text-md">
                            Flexible Scheduling: Your Time, Your Terms
                        </p>
                        <p class="text-dark">
                            With our flexible scheduling options, you're in control.
                        </p>
                    </div>
                    <div>
                        <img src="img/mac.png" alt="" />
                        <p class="text-md">
                            Personalized Care, Wherever You Are
                        </p>
                        <p class="text-dark">
                            Receive personalized and compassionate care from our expert medical professionals, no matter
                            where you are.
                        </p>
                    </div>
                </div>
            </div> --}}

            <!-- Tab Content 3 -->
            <div id="tab-3-content" class="tab-content-item">
                <div class="text-center">
                    <p class="text-lg">
                        24/7 Doctor Ready: Your Health, Anytime You Need
                    </p>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Immediate Access to Care: Day or Night</td>
                        </tr>
                        <tr>
                            <td>Predictive Insights: Stay Ahead of Health Trends</td>
                        </tr>
                        <tr>
                            <td>Virtual Consultations Anywhere, Anytime</td>
                        </tr>
                        <tr>
                            <td>Your Health, Our Priority - Always</td>
                        </tr>
                        <tr>
                            <td>Prompt and Comprehensive Care</td>
                        </tr>
                        <tr>
                            <td>Patient-Centric Approach</td>
                        </tr>
                        <tr>
                            <td>Leading Specialists</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <img src="" alt="">
        </div>
    </footer>
    <script src="js/landing.js"></script>
</body>

</html>
