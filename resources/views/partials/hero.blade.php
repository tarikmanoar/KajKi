

<div class="site-blocks-cover overlay" style="background: url({{asset('external/images/hero_1.jpg')}}) , #11a8dc;"
     data-aos="fade"
     data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12" data-aos="fade">
                <h1>Find Job</h1>
                <form action="{{route('jobs.allJobs')}}">
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <input type="text" class="mr-3 form-control border-0 px-4"
                                           placeholder="job title, keywords or Position " required name="search">
                                </div>
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="input-wrap">
                                        <span class="icon icon-room"></span>
                                        <input type="text" class="form-control form-control-block search-input
                                        border-0 px-4" id="autocomplete" placeholder="city, province or region"
                                               onFocus="geolocate()" required name="s_address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
