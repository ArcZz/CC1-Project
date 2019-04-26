@extends('system.layouts.header')
@section('content')


    <!-- Services -->
    <section class="bg-light" id="services">
        <div class="container">
            <div class="jumbotron text-center ">

                <h1 class="display-4 section-heading" style="text-transform: none;">Conversational Agent </br> for Recommender System</h1>
                <p class="lead">To integrate chatbot with underlying recommender systems on CyNeuro application, fostering Neuroscience research
                </p><hr class="my-4">
                <h5>Project Members:</h5>
                <p> Ryan Lokugamage, Nijaporn Hotrabhavananda Yilong Zhang <br>Benjavicha Hotrabhavananda, Snigdha Pasham, Komal Vekaria <br> Zhang Zhi, Song Vu Nguyen, Aaron Thomas  <p></p>
                <a class="btn btn-primary btn-lg" href="{{ route('system.recommender.recommender') }}" role="button">Learn more</a>
            </div>
            <br>

        </div>
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h3 class="section-heading">Project Info</h3>
                    <hr class="hr-line">
                </div>
            </div>
            <div class="row" style="display: block">
                <div class="col-md-12">
                    <h4>Backgroud</h4>
                    <p>A neuron is an electrically excitable cell that receives, processes, and transmits information
                        through electrical and chemical signals. These signals between neurons occur via specialized
                        connections called synapses. Neurons can connect to each other to form neural networks. Neurons
                        are major components of the brain and spinal cord of the central nervous system, and of the
                        autonomic ganglia of the peripheral nervous system.


                    </p>
                    <h4>Recommender System</h4>
                    <p>A neuron is an electrically excitable cell that receives, processes, and transmits information


                    </p>
                    <h4>Group info</h4>
                    <p>A neuron is an electrically excitable cell that receives, processes, and transmits information
                        through electrical and chemical signals. These signals between neurons occur via specialized


                    </p>
                </div>
            </div><!-- row -->



        </div> <!-- container -->
    </section>


@endsection

@section('javascript')


@endsection