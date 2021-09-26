@extends('v2.preview.layouts.app')

@section('tab-title')
    SWOT
@endsection

@section('content')
    <x-layouts.header title="SWOT"></x-layouts.header>
    <!-- Basic -->
    <div class="ex-basic-1 pt-3 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <p class="mb-5">SWOT is a business strategy building tool that is divided into 4 parts, consists of strengths, weaknesses that come from within your business and opportunities, threats that come from outside of your business.</p>
{{--                    @foreach ($dataProject as $data)--}}
{{--                    <form id="createSwot" method="POST" action="{{ url('/detail-project/swot/create', $data->id) }}">--}}
{{--                        <a class="btn-solid-reg mb-5" value="submit" for="createSwot">Use Template</a>--}}
{{--                    </form>--}}
{{--                    @endforeach--}}
                    <a class="btn-solid-reg mb-5" value="submit" for="createSwot">Use Template</a>
                    <h2 class="mb-4">SWOT Template</h2>
                    <img class="img-fluid mb-5" src="{{asset('preview/images/SWOT.svg')}}" alt="alternative">
                    <!-- Basic -->
                    <div class="ex-basic-1 pt-4">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1">
                                    <h2 class="mb-3">What is SWOT?</h2>
                                    <p>When you’re developing a business strategy, it can be hard to figure out what to focus on. A SWOT analysis template helps you hone in on key factors.</p>
                                    <p class="mb-5">SWOT stands for Strengths, Weaknesses, Opportunities, and Threats. Strengths and weaknesses are internal factors, like your employees, intellectual property, marketing strategy, and location. Opportunities and threats, by contrast, are usually external factors, like market fluctuations, competition, prices of raw materials, and consumer trends. </p>

                                    <h2 class="mb-3">What is an example of a SWOT analysis template in Shera?</h2>
                                    <p class="mb-5">The SWOT analysis template in Miro has an easy-to-use format, and it can be customizable according to your needs. You can keep it simple by adding the key four areas of the SWOT analysis, or you can add more blocks and deep dive into your organization’s weaknesses and strengths.</p>

                                    <h2 class="mb-3">How do I write a SWOT Analysis?</h2>
                                    <p class="mb-5">Determine the objectives of your SWOT analysis: what do you want to get out of it? What problem are you trying to solve? Who are the stakeholders, and how can you address the issues that might come to the surface? After you defined your overall objective, you can go into detail and perform the SWOT analysis focusing on the four key areas: Strengths, Weaknesses, Opportunities, and Threats.</p>
                                </div> <!-- end of col -->
                            </div> <!-- end of row -->
                        </div> <!-- end of container -->
                    </div> <!-- end of ex-basic-1 -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-1 -->
    <!-- end of basic -->
@endsection
