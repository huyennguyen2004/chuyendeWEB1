@extends('layouts.site')

@section('title', 'Câu Hỏi Thường Gặp')

@section('content')
    <div class="row" style="background-color:aqua; padding: 15px 0;">
        <x-main-menu class="menu-large" />
    </div>
    <section id="faq" class="py-5">
        <div class="container">
            <h1>Câu Hỏi Thường Gặp</h1>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Câu hỏi 1: Lorem ipsum dolor sit amet?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum
                            vestibulum. Cras venenatis euismod malesuada.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Câu hỏi 2: Curabitur pretium tincidunt lacus?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo
                            pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Câu hỏi 3: Integer vitae libero ac risus egestas placerat?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Integer vitae libero ac risus egestas placerat. In nec diam ac diam pretium elementum. Proin
                            euismod libero ac libero fermentum, id sagittis nunc interdum.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
