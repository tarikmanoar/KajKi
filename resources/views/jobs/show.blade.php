@extends('layouts.main')
@section('content')
<div class="unit-5 overlay" style="background: url({{asset('external/images/hero_2.jpg')}}) #22aadd;">
    <div class="container text-center">
        <h2 class="mb-0">Full Stack Developer</h2>
        <p class="mb-0 unit-6"><a href="index.html">Home</a> <span class="sep">></span> <span>Job Item</span></p>
    </div>
</div>
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <div class="p-5 bg-white">
                    <div class="mb-4 mb-md-5 mr-5">
                        <div class="job-post-item-header d-flex align-items-center">
                            <h2 class="mr-3 text-black h4">Full Stack Developer</h2>
                            <div class="badge-wrap">
                                <span class="border border-warning text-warning py-2 px-4 rounded">Freelance</span>
                            </div>
                        </div>
                        <div class="job-post-item-body d-block d-md-flex">
                            <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">New York Times</a></div>
                            <div><span class="fl-bigmug-line-big104"></span> <span>New York City, USA</span></div>
                        </div>
                    </div>



                    <div class="img-border mb-5">
                        <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                            <img src="{{asset('external/images/hero_2.jpg')}}" alt="Image" class="img-fluid rounded">
                        </a>
                    </div>



                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, iure beatae! Voluptas tempora doloremque atque repudiandae maiores odio magni. Illo ut nihil officia numquam in. Deleniti pariatur at minima quaerat!</p>
                    <p>Qui corrupti animi, dignissimos veritatis, necessitatibus consequuntur nobis, placeat beatae dolorum ullam harum at atque dolor! Accusantium cupiditate ipsum placeat, vel voluptatibus non eaque, animi neque minima facere provident aspernatur!</p>
                    <p>Porro magni numquam ex natus repellat accusamus laborum blanditiis odit consequatur at veritatis nostrum provident recusandae dolores incidunt distinctio facere, nulla odio quo tempore libero! Voluptatum porro velit, qui optio.</p>
                    <p>Ducimus odio, fugiat pariatur. Corporis nobis perferendis voluptatum nostrum nesciunt, voluptates pariatur architecto consequatur! Praesentium dicta enim, laboriosam natus doloribus corrupti in sequi perferendis, cupiditate perspiciatis, porro animi sed impedit.</p>
                    <p>Illum possimus, enim eaque recusandae earum omnis tempore suscipit sapiente voluptas nam quia dicta, repellendus incidunt dolor dolores nemo laboriosam, quasi nulla deserunt neque est ipsam velit cumque. Quos, ipsum!</p>
                    <p>Dignissimos ipsa quibusdam id qui maiores magnam, nesciunt? Voluptatibus nulla quas itaque nostrum necessitatibus repudiandae quaerat facere, amet aperiam iste aspernatur ratione cupiditate est voluptates non. Suscipit corporis, soluta neque.</p>
                    <p>Pariatur itaque reiciendis consectetur, deserunt quam adipisci odio doloribus voluptatem laboriosam magni ut repellat tempore? Minus sit officia impedit veritatis reiciendis debitis iure, porro in quaerat inventore nisi sequi quos!</p>

                    <p class="mt-5"><a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p>
                </div>
            </div>

            <div class="col-lg-4">


                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">More Info</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
                    <p><a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
{{--
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-6" data-aos="fade" >
                <h2>Frequently Ask Questions</h2>
            </div>
        </div>


        <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
            <div class="col-md-8">
                <div class="accordion unit-8" id="accordion">
                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">What is the name of your company<span class="icon"></span></a>
                        </h3>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis dolorum, est eum eligendi vero aut ad necessitatibus nulla sit labore doloremque magnam! Ex molestiae, dolor tempora, ad fuga minima enim mollitia consequuntur, necessitatibus praesentium eligendi officia recusandae culpa tempore eaque quasi ullam magnam modi quidem in amet. Quod debitis error placeat, tempore quasi aliquid eaque vel facilis culpa voluptate.</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->

                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">How much pay for 3  months?<span class="icon"></span></a>
                        </h3>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->

                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">Do I need to register?  <span class="icon"></span></a>
                        </h3>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->

                    <div class="accordion-item">
                        <h3 class="mb-0 heading">
                            <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of support.<span class="icon"></span></a>
                        </h3>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="body-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
                            </div>
                        </div>
                    </div> <!-- .accordion-item -->

                </div>
            </div>
        </div>

    </div>
</div>
--}}
@endsection
