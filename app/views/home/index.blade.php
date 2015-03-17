@extends('layout')

@section('main')

<!-- Header -->
<header id="top" class="header">
    <div class="text-vertical">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <h1>OSS Secrets</h1>
                    <h2><i class="fa fa-lock"></i> Corporate Source vs. Open Source</h2>
                    <p>We created open source because corporations shouldn't dictate innovation, mostly because they aren't very good at it.</p>
                    <p>Over 20 years later, OSS is too often a smokescreen for those same corporations today. Corporations releasing source code while maintaining absolute control is not open source.</p>
                    <h2><i class="fa fa-comments"></i> Tell us your stories</h2>
                        <ul>
                            <li>Does your company limit your OSS involvement?</li>
                            <li>How easily can outsiders contribute to your "open" projects?</li>
                            <li>Does your company violate the license of open source projects?</li>
                            <li>Are features driven by your company's roadmap or by the community?</li>
                        </ul>
                    <h3>Share with us <i>anonymously</i> your stories of corporate source masquerating as open source.</h3>
                </div>

                <div class="col-md-4 col-md-offset-1">
                    <!-- Contact Form - Enter your email address on line 17 of the mail/contact_me.php file to make this form work. -->
                    <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                    <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                    <form name="sentMessage" id="contactForm" novalidate>

                        <h2>Tell us your stories</h2>
                        <p>All submissions are totally <u>anonymous</u>.</p>

                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="companyName" class="sr-only control-label">Who do you work for?</label>
                                <input type="text" class="form-control input-lg" placeholder="Who do you work for?" id="companyName" required data-validation-required-message="Please enter who you work for.">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email" class="sr-only control-label">Email</label>
                                <input type="email" class="form-control input-lg" placeholder="Email (optional)" id="email" required data-validation-message="Please enter your email address.">
                                <span class="help-block text-danger"></span>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="story" class="sr-only control-label">Your Story</label>
                                <textarea name="story" id="story" class="form-control" placeholder="Tell us your secrets." rows="10"></textarea>
                            </div>
                        </div>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Share Anonymously</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- mouse -->
               <span class="scroll-btn hidden-xs wow fadeInDownBig">
                   <a href="#about"><span class="mouse"><span></span></span></a>
               </span>
            <!-- mouse -->
        </div>
    </div>
</header>

<!-- about -->
<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center wow fadeIn">
                <i class="fa fa-5x fa-question"></i><br>
                <h2 class="heading">What is this all about? Why do this?</h2>
                <p class="lead">We fear the philsophies of the open source movement may have been co-opt'd by corporate interests</p>
                <p>20 years ago, Open Source was more than just sharing source code. It was an idea that communities of free-thinking programmers could write better software than corporations looking to make a buck -- <i>and we were right</i>.</p>
                <p>Today, we fear open source has been largely taken over by corporations. Every project has a "corporate entity" behind it calling the shots, some require <i>hundreds of thousands</i> of dollars to even influence.</p>
                <p><u>Code that is released publically is not open source.</u> We are looking to bring this issue to focus in our communities.</p>
            </div>
        </div>
    </div>
</section>

<!-- about -->
<section id="about2" class="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center wow fadeIn">
                <h2 class="heading">What are you doing with our stories?</h2>
                <p>The stories we collect from this site will be compiled and used as part of a number of presentations being given across the country this year at various open source conferences.</p>
                <p>Our goal is to place a spotlight on what we consider to be "Open Source Only In Name" practices. <u>Free as in Beer</u> was not the point of Open source movement</p>
                <p>It was the philsophy that OSS is about <u>liberty, not price</u> that lead to the amazing technologies we have today.</p>
                <p>If the community at large continues to allow corporations to claim they are "Open Source" while removing all effective means of liberty in their use, we will lose the greatest asset of OSS.</p> 
            </div>
        </div>
    </div>
</section>

<!-- about -->
<section id="about3" class="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center wow fadeIn">
                <h2 class="heading">Who is behind this?</h2>
                <p>Two long-time members of the Open Source Community:<br/> <a href="http://www.coggeshall.org/">John Coggeshall</a> (core PHP contributor) and <a href="http://www.rcbowen.com/">Rich Bowen</a> (Exec. VP, Apache Software Foundation)</p>
            </div>
        </div>
    </div>
</section>

<!-- contacts -->
<div id="contact">
    <div class="container-fluid overlay text-center">
        <div class="col-md-6 col-md-offset-3 wow fadeIn">
            <h2 class="heading">Contact Us</h2>
            <h2><a href="mailto:hello@oss-secrets.com"><i class="fa fa-envelope fa-fw"></i>hello@oss-secrets.com</a></h2>
            <p>We welcome all feedback, stories, ideas, or anything else you might have to say even if it is just saying "Hello!"</p>
        </div>
    </div>
</div>
@stop
