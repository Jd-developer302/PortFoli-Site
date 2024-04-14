@extends('layouts.frontendmaster')
@php
use Illuminate\Support\Str;
@endphp
@section('title', 'Portfolio')
@section('meta_description', 'Portfolio')
@section('meta_keywords', 'Portfolio')
@section('content')

<section class="home" id="home">
    <div class="hero-info">
        <h3>{{ $profile->sub_title }}</h3>
        <h1>Hi I'm {{ $profile->name }}</h1>

        <div class="text-animate">
            <h2>{{ $profile->title }}</h2>
        </div>

        <p>{{ $profile->description }}</p>

        <div class="btn-box">
            <a href="mailto:ijaveed302@gmail.com" class="btn d-hire">Hire Me Now ! <i class='bx bx-right-arrow-alt'></i></a>
            <a href="{{ asset('/uploads/cvs/'. $profile->cv)}}" target="_blank" rel="noopener noreferrer" download  class="btn d-CV">Download CV <i class='bx bx-download'></i></a>
        </div>

        <div class="social-media">
            <div class="bg-icon">
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <span></span>
            </div>

            <div class="bg-icon">
                <a href="#"><i class='bx bxl-github'></i></a>
                <span></span>
            </div>

            <div class="bg-icon">
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <span></span>
            </div>

            <div class="bg-icon">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <span></span>
            </div>
        </div>
    </div>
    <div class="img-hero">
        <img src="{{asset('asset/img/hero.png')}}" alt="">
        <div class="rotate-text">
            <div class="text">
                <p>I'm Youtuber And I'm Frontend Developer And I'm Designer</p>
            </div>
            <span><i></i></span>
        </div>
    </div>
</section>
<section class="about" id="about">
    <div class="about-img">
        <img src="{{asset('asset/img/aboutMe.png')}}" alt="" class="aboutHero">
        <div class="showcase-ring">
            <img src="{{asset('asset/img/shapes/ring.png')}}" class="ring">
            <img src="{{asset('asset/img/shapes/circle.png')}}" class="circle">
        </div>
    </div>
    <div class="about-content">
        <h2 class="heading">About Me</h2>
        <h3>3 Year's Experience on Product Design</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint voluptatem autem ex in. Temporibus et maiores
            ipsum recusandae voluptas consequatur!</p>
        <div class="about-btn">
            <button class="active">Main Skills</button>
            <button>Awards</button>
            <button>Education</button>
        </div>
        <div class="content-btn">
            <div class="content">
                <div class="text-box">
                    <p>User Experience Design - UI / UX</p>
                    <span>Delight the user and make it work.</span>
                </div>
                <div class="text-box">
                    <p>Web & User Interface Design - Development</p>
                    <span>Website , Web Experience , ...</span>
                </div>
                <div class="text-box">
                    <p>Interaction Desing - Animation</p>
                    <span>I Like to move it move it</span>
                </div>
            </div>

            <div class="content">
                <div class="text-box">
                    <p>Web Design Award</p>
                    <span>Award for creativity and user experience.</span>
                </div>
                <div class="text-box">
                    <p>Code and Development Award</p>
                    <span>Exceptional coding skills and develoment techniques</span>
                </div>
                <div class="text-box">
                    <p>Hackathons and coding Competiotions</p>
                    <span>Participating in hackathons and coding.</span>
                </div>
            </div>


            <div class="content">
                <div class="text-box">
                    <p>Online Courses and Bootcamps</p>
                    <span>Delight the user and make it work.</span>
                </div>
                <div class="text-box">
                    <p>Internships and Work Experience</p>
                    <span>Website , Web Experience , ...</span>
                </div>
                <div class="text-box">
                    <p>Bachelor's Degree in Computer Science</p>
                    <span>I Like to move it move it</span>
                </div>
            </div>
        </div>
        <div class="cvContent">
            <a href="{{ asset('/uploads/cvs/'. $profile->cv)}}" target="_blank" rel="noopener noreferrer" download class="btn d-CV">Download CV <i class='bx bx-download'></i></a>
        </div>
    </div>
</section>
<section class="services" id="services">
    <div class="main-text">
        <h2 class="heading">My Services</h2>
        <span>what i will do for you</span>
    </div>

    <div class="allServices">
        @foreach ($serviceCategories as $serviceCategory)
            <div class="servicesItem">
                <div class="icon-services">                 
                    @php
                        $categoryIcons = [
                            'Web Development' => 'bx bx-code-alt',
                            'Mobile App Development' => 'bx bx-layer',
                            'Digital Marketing' => 'bx bxs-party',
                            'UI UX Design' => 'bx bx-desktop',
                        ];
                    @endphp
                    <i class='{{ $categoryIcons[$serviceCategory->name] ?? 'bx bx-layer' }}'></i>
                    <span></span>
                </div>
                <h3>{{ $serviceCategory->name }}</h3>
                @foreach ($serviceCategory->services as $service)
                    <p>{!! Str::limit(strip_tags($service->description), 70) !!}</p>
                @endforeach
                <a href="{{ url('Service/'.$serviceCategory->slug) }}" class="readMore">Read More</a>
            </div>
        @endforeach

        {{-- <div class="servicesItem">
            <div class="icon-services">
                <i class='bx bx-code-alt' ></i>
                <span></span>
            </div>
            <h3>Web Development</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure inventore ea nemo ab recusandae modi voluptates maxime ipsam eveniet. Facilis.</p>
            <a href="#" class="readMore">Read More</a>
        </div>

        <div class="servicesItem">
            <div class="icon-services">
                <i class='bx bx-desktop' ></i>
                <span></span>
            </div>
            <h3>UI / UX Design</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure inventore ea nemo ab recusandae modi voluptates maxime ipsam eveniet. Facilis.</p>
            <a href="#" class="readMore">Read More</a>
        </div>

        <div class="servicesItem">
            <div class="icon-services">
                <i class='bx bxs-party' ></i>
                <span></span>
            </div>
            <h3>Digital Marketing</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure inventore ea nemo ab recusandae modi voluptates maxime ipsam eveniet. Facilis.</p>
            <a href="#" class="readMore">Read More</a>
        </div> --}}
    </div>

    <div class="proposal">
        <div class="text-box">
            <span>Get It Touch</span>
            <h3>Have a Project On Your Mind</h3>
            <a href="#contact" class="btn">Contact Me</a>
        </div>
        <img src="{{asset('asset/img/support.png')}}" class="first">
    </div>

    <div class="showcase">
        <img src="shapes/ring.png" class="ring">
        <img src="shapes/circle.png" class="circle">
        <img src="shapes/circle.png" class="circle2">
        <img src="shapes/circle.png" class="circle3">
        <img src="shapes/half-ring.png" class="half-ring">
    </div>
</section>

<section class="portfolio" id="portfolio">
    <div class="main-text">
        <h2 class="heading">My Services</h2>
        <span>what i will do for you</span>
    </div>
    <div class="fillter-buttons">
        <button class="button mixitup-control-active" data-filter=".all">All Work</button>
        @forelse ($categories as $item)
            <button class="button" data-filter=".{{ $item->slug }}">{{ $item->name }}</button>
        @empty
        <button class="button" data-filter=".uiux">Not Found...</button>  
        @endforelse
    </div>
    
    <div class="portfolio-gallery">
        @foreach ($images as $index => $image)
            @if ($index < 6)
                <div class="portfolio-box mix all {{ $image->PortfolioCatagory->slug }}">
                    <div class="portfolio-content">
                        <h3>{{ $image->PortfolioCatagory->name }}</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, soluta.</p>
                        <a href="{{ route('gallery.viewimage', $image->PortfolioCatagory->slug) }}" class="readMore">Explore More</a>
                    </div>
                    <div class="portfolio-img">
                        <img src="{{ asset('storage/'.$image->image)}}" alt="">
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>

<section class="blog" id="blog">
    <div class="main-text">
        <h2 class="heading">Blog</h2>
        <span>Latest News & Post</span>
    </div>

    <div class="blog-box swiper mySwiper">
        <div class="cards swiper-wrapper">
            @foreach ($all_posts as $all_post_item)


            <div class="card swiper-slide" style=" height: 400px; ">
                <div class="card-top">
                    <img src="{{ asset('storage/'.$all_post_item->image) }}" style="height: 100%;width:auto;" alt="">
                </div>
                <div class="card-info">
                    <a class="text-decoration-none"
                        href="{{ route('tutorial.view', ['category_slug' => $all_post_item->category->slug, 'post_slug' => $all_post_item->slug]) }}">
                        <h2>{{ $all_post_item->name }}</h2>
                    </a>

                    <span class="date">{{$all_post_item->created_at->format('d-m-Y')}}</span>
                    <span style="margin-left: 10px">Posted By:{{$all_post_item->user->name}}
                        <p class="excerpt" style="max-height: 10vh; overflow: hidden;">
                            {{$all_post_item->description}}
                        </p>
                        <a href="{{ route('tutorial.view', ['category_slug' => $all_post_item->category->slug, 'post_slug' => $all_post_item->slug]) }}"
                            class="readMore">Explore More</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="swiper-pagination"></div>

    <div class="showcase">
        <img src="{{asset('asset/img/shapes/ring.png')}}" class="ring">
        <img src="{{asset('asset/img/shapes/second-circle.png')}}" class="second-circle">
        <img src="{{asset('asset/img/shapes/circle.png')}}" class="circle">
        <img src="{{asset('asset/img/shapes/half-ring.png')}}" class="half-ring">
    </div>

</section>
<section class="down-box" id="contact">
    <div class="contactSkills">
        <div class="contact-info">
            <div class="main-text">
                <h2 class="heading">Contact Me</h2>
                <span>get in touch with me</span>
            </div>
            <form action="{{route('contact.store')}}" method="POST">
                @csrf
                <input type="text" placeholder="Name" name="name" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="text" placeholder="Subject" name="subject">
                <textarea name="message" required id="" cols="30" rows="10">
                </textarea>
                <div class="formBtn">
                    <button type="submit" class="btn">Send Message</button>
                </div>
            </form>
        </div>
        <div class="skills">
            <div class="container">
                <div class="skillBox">
                    <div class="main-text">
                        <h2 class="heading">My Skills</h2>
                        <span>Let Me Help you</span>
                    </div>
                    <div class="skill-wrap">
                        <div class="skill">
                            <div class="outer-circle">
                                <div class="inner-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="180px" height="180px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#e91e63" />
                                                <stop offset="100%" stop-color="#673ab7" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="85" cy="85" r="75" stroke-linecap="round" />
                                    </svg>
                                    <h2 class="counter">
                                        <span data-target="89">0</span>%
                                    </h2>
                                </div>
                            </div>
                            <div class="sk-title">
                                HTML
                            </div>
                        </div>

                        <div class="skill">
                            <div class="outer-circle">
                                <div class="inner-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="180px" height="180px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#e91e63" />
                                                <stop offset="100%" stop-color="#673ab7" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="85" cy="85" r="75" stroke-linecap="round" />
                                    </svg>
                                    <h2 class="counter">
                                        <span data-target="47">0</span>%
                                    </h2>
                                </div>
                            </div>
                            <div class="sk-title">
                                CSS
                            </div>
                        </div>


                        <div class="skill">
                            <div class="outer-circle">
                                <div class="inner-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="180px" height="180px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#e91e63" />
                                                <stop offset="100%" stop-color="#673ab7" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="85" cy="85" r="75" stroke-linecap="round" />
                                    </svg>
                                    <h2 class="counter">
                                        <span data-target="56">0</span>%
                                    </h2>
                                </div>
                            </div>
                            <div class="sk-title">
                                JavaScript
                            </div>
                        </div>


                        <div class="skill">
                            <div class="outer-circle">
                                <div class="inner-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="180px" height="180px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#e91e63" />
                                                <stop offset="100%" stop-color="#673ab7" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="85" cy="85" r="75" stroke-linecap="round" />
                                    </svg>
                                    <h2 class="counter">
                                        <span data-target="19">0</span>%
                                    </h2>
                                </div>
                            </div>
                            <div class="sk-title">
                                UI/UX Design
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection