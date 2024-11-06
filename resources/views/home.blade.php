@extends('layout.base')

@section('title', 'home')

@section('content')
    <header>
        <div class="main">

            <div class="logo-card">
                <img src="{{ URL::asset('assets/Images/Logo et favicon Candidhero/Logo Candidhero.png') }}" alt=""
                    class="logo">
            </div>
            <div class="btn-section">
                <td>
                    <a href="{{ route('register')}}" class="btn-secondary">Inscription</a>
                </td>
                <td>
                    <a href="{{ route('login')}}" class="btn-primary">Connexion</a>
                </td>
            </div>

        </div>
    </header>
    <section class="banner">
        <img src="{{ URL::asset('assets/Images/Logo et favicon Candidhero/Logo-favicon.png') }}" alt="bg"
            class="logo-fav">
        <div class="search">
            <input type="search" placeholder="Cherchez un job, un poste, un stage ..." class="search-job">
            <div class="discover">
                <input type="text">
                <label for="">Explorez</label>
                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M9.5 3A6.5 6.5 0 0 1 16 9.5c0 1.61-.59 3.09-1.56 4.23l.27.27h.79l5 5l-1.5 1.5l-5-5v-.79l-.27-.27A6.52 6.52 0 0 1 9.5 16A6.5 6.5 0 0 1 3 9.5A6.5 6.5 0 0 1 9.5 3m0 2C7 5 5 7 5 9.5S7 14 9.5 14S14 12 14 9.5S12 5 9.5 5" />
                </svg>
            </div>
        </div>

        <div class="d-flex">
            <div class="card">
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" color="#fff" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5">
                        <path
                            d="M17.252 12.49c-.284 2.365-1.833 3.31-2.502 3.996c-.67.688-.55.825-.505 1.834a.916.916 0 0 1-.916.971h-2.658a.92.92 0 0 1-.917-.971c0-.99.092-1.22-.504-1.834c-.76-.76-2.548-1.833-2.548-4.784a5.307 5.307 0 1 1 10.55.788" />
                        <path
                            d="M10.46 19.236v1.512c0 .413.23.752.513.752h2.053c.285 0 .514-.34.514-.752v-1.512m-2.32-10.54a2.227 2.227 0 0 0-2.226 2.227m10.338.981h1.834m-3.68-6.012l1.301-1.301M18.486 17l1.301 1.3M12 2.377V3.86m-6.76.73l1.292 1.302M4.24 18.3L5.532 17m-.864-5.096H2.835" />
                    </g>
                </svg>
                <p>
                    Accédez en un clin d’oeil aux informations clés du poste et du recrutement
                </p>
            </div>
            <div class="card">
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" color="#fff" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5">
                        <path
                            d="M17.252 12.49c-.284 2.365-1.833 3.31-2.502 3.996c-.67.688-.55.825-.505 1.834a.916.916 0 0 1-.916.971h-2.658a.92.92 0 0 1-.917-.971c0-.99.092-1.22-.504-1.834c-.76-.76-2.548-1.833-2.548-4.784a5.307 5.307 0 1 1 10.55.788" />
                        <path
                            d="M10.46 19.236v1.512c0 .413.23.752.513.752h2.053c.285 0 .514-.34.514-.752v-1.512m-2.32-10.54a2.227 2.227 0 0 0-2.226 2.227m10.338.981h1.834m-3.68-6.012l1.301-1.301M18.486 17l1.301 1.3M12 2.377V3.86m-6.76.73l1.292 1.302M4.24 18.3L5.532 17m-.864-5.096H2.835" />
                    </g>
                </svg>
                <div class="ideas">
                    <div class="separator"></div>
                    <p>
                        Accédez en un clin d’oeil aux informations clés du poste et du recrutement
                    </p>
                </div>
            </div>
            <div class="card">
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" color="#fff" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5">
                        <path
                            d="M17.252 12.49c-.284 2.365-1.833 3.31-2.502 3.996c-.67.688-.55.825-.505 1.834a.916.916 0 0 1-.916.971h-2.658a.92.92 0 0 1-.917-.971c0-.99.092-1.22-.504-1.834c-.76-.76-2.548-1.833-2.548-4.784a5.307 5.307 0 1 1 10.55.788" />
                        <path
                            d="M10.46 19.236v1.512c0 .413.23.752.513.752h2.053c.285 0 .514-.34.514-.752v-1.512m-2.32-10.54a2.227 2.227 0 0 0-2.226 2.227m10.338.981h1.834m-3.68-6.012l1.301-1.301M18.486 17l1.301 1.3M12 2.377V3.86m-6.76.73l1.292 1.302M4.24 18.3L5.532 17m-.864-5.096H2.835" />
                    </g>
                </svg>
                <div class="ideas">
                    <div class="separator"></div>
                    <p>
                        Accédez en un clin d’oeil aux informations clés du poste et du recrutement
                    </p>
                </div>
            </div>
        </div>

    </section>
    <section class="business-card">
        <h3>Explorer les entreprises inspirantes</h3>
        <div class="d-flex">
            <div class="card">
                <img src="{{ URL::asset('assets/Images/bank.jpg') }}" alt="business" class="business">
                <p>
                <ul>
                    <li class="icon-card">
                        <img src="{{ URL::asset('assets/Images/orabank.jpeg') }}" alt="orabank" class="logo-icon">
                        <h6>Orabank</h6>
                    </li>
                    <li>
                        Poste : Data Analyst
                    </li>
                    <li>
                        Type contrat: CDI
                    </li>
                    <li>
                        Expérience: 3 ans minimum
                    </li>
                </ul>
                </p>
            </div>
            <div class="card">
                <img src="{{ URL::asset('assets/Images/togoc.jpg') }}" alt="business" class="business">
                <p>
                <ul>
                    <li class="icon-card">
                        <img src="{{ URL::asset('assets/Images/togocom.png') }}" alt="togocom" class="logo-icon">
                        <h6>Togocom</h6>
                    </li>
                    <li>
                        Poste : Data Analyst
                    </li>
                    <li>
                        Type contrat: CDI
                    </li>
                    <li>
                        Expérience: 3 ans minimum
                    </li>
                </ul>
                </p>
            </div>
            <div class="card">
                <img src="{{ URL::asset('assets/Images/pharma.jpg') }}" alt="business" class="business">
                <p>
                <ul>
                    <li class="icon-card">
                        <img src="{{ URL::asset('assets/Images/pharmacie.png') }}" alt="orabank" class="logo-icon">
                        <h6>Pharmacie la paix</h6>
                    </li>
                    <li>
                        Poste : Data Analyst
                    </li>
                    <li>
                        Type contrat: CDI
                    </li>
                    <li>
                        Expérience: 3 ans minimum
                    </li>
                </ul>
                </p>
            </div>
        </div>
    </section>
    <section>
        <div>
          <div class="para-content">
            <h4>Là où le service et l'offre se connectent</h4>
            <p>Faites partie de la communauté Candidhero, où plus
                de la moitié des professionnels togolais de la technologie,
                viennent décrocher leur prochain emploi et stage ; en tant qu'analyste,
                concepteur, développeur, médecin, banquier, pharmacien et bien plus encore,
                quel que soit votre niveau.
            </p>
          </div>
            <div class="d-flex">
                <div class="box">
                    <div class="image-container">
                        <img src="{{ URL::asset('assets/Images/jobbg2.jpg') }}" alt="job-tof">
                    </div>
                    <div class="content">
                        <div>
                            <h2>Image title</h2>
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum accusamus, dolores
                                accusantium dolore ratione eum nulla ipsa cumque officiis nesciunt impedit optio, est dicta
                                obcaecati temporibus voluptatem incidunt quidem sunt?
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="box">
                    <div class="image-container">
                        <img src="{{ URL::asset('assets/Images/jobbg2.jpg') }}" alt="job-tof">
                    </div>
                    <div class="content">
                        <div>
                            <h2>Image title</h2>
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum accusamus, dolores
                                accusantium dolore ratione eum nulla ipsa cumque officiis nesciunt impedit optio, est dicta
                                obcaecati temporibus voluptatem incidunt quidem sunt?
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
